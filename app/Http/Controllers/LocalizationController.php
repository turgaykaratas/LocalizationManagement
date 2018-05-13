<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\IProjectService;
use App\Http\Requests\CreateLocalizationRequest;
use App\Repositories\LanguageRepository;
use Auth;
use App\Repositories\LanguageVersionRepository;
use App\Repositories\VocabularyRepository;
use Validator;
use Illuminate\Support\Facades\Log;

class LocalizationController extends Controller
{
    private $projectService;
    private $languages;
    private $languageVersions;
    private $vocabularies;

    public function __construct(
        IProjectService $projectService,
        LanguageRepository $languages,
        LanguageVersionRepository $languageVersions,
        VocabularyRepository $vocabularies
    ) {
        $this->projectService = $projectService;
        $this->languages = $languages;
        $this->languageVersions = $languageVersions;
        $this->vocabularies = $vocabularies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $projectId, int $langId = 0, int $versionId = 0)
    {
        $project = $this->projectService->getProjectById($projectId);

        $langIds = [];

        if ($langId === 0) {
            foreach ($project->languages as $language) {
                $langIds[] = $language->id;
            }
        }
        $languages = $this->languages->getNotInIds($langIds);

        $vocabularies = null;
        if ($versionId > 0) {
            $vocabularies = $this->vocabularies->getKeysByversionId($versionId);
        }

        return view('localization.create', compact(['project', 'languages', 'langId', 'vocabularies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateLocalizationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocalizationRequest $request)
    {
        $inputs = $request->all();
        $langid = intval($inputs['langid']);

        if (!$request->has('keys')) {
            return redirect()->back()->withErrors(['Lütfen çeviri için kelime ekleyin!']);
        }

        if (!$request->has('values')) {
            return redirect()->back()->withErrors(['Lütfen çeviri için kelime ekleyin!']);
        }

        $project = $this->projectService->getProjectById($inputs['projectid']);

        if ((!Auth::user()->hasRole('admin')) && ($project->user->id != Auth::user()->id))
            return redirect()->back()->withErrors(['Bu proje üzerinde değişiklik yapma yerkiniz bulunmamaktadır!']);

        $language = $this->languages->findBy('id', $inputs['language']);

        if ($langid === 0) { // Dil ve proje arasında ilişki kurulmamışsa
            $project->languages()->attach($language);
        } else {
            $lVersion = $this->languageVersions->getByVersionAndProIdAndLangId($inputs['version'], $project->id, $language->id);
            if ($lVersion)
                return redirect()->back()->withErrors(['Bu dil için bu versiyon bulunmaktadır! Lütfen versioyunu değiştiriniz.']);
        }

        $languageVersion = $this->languageVersions->create([
            'language_id' => $language->id,
            'project_id' => $project->id,
            'version' => $inputs['version']
        ]);

        foreach ($inputs['keys'] as $key => $value) {
            $this->vocabularies->create([
                'lang_vers_id' => $languageVersion->id,
                'key' => $inputs['keys'][$key],
                'value' => $inputs['values'][$key]
            ]);
        }

        return redirect()->route('project.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versionId
     * @return \Illuminate\Http\Response
     */
    public function showVocabulary(int $versionId)
    {
        $vocabularies = $this->vocabularies->getKeysByversionId($versionId);

        return view('vocabulary.list', compact('vocabularies'));
    }

    public function localizationWords(Request $request)
    {
        $query = $request->query();

        $validator = Validator::make($query, [
            'project' => 'required',
            'lang' => 'required',
            'version' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }

        $languages = $this->languageVersions->getByVersionAndProjectAndLangCode($query['version'], $query['project'], $query['lang']);

        $datas = [];

        if (count($languages)) {
            $datas['project_name'] = $languages->get(0)->pname;
            $datas['project_language'] = $languages->get(0)->lname;
            $datas['project_version'] = $languages->get(0)->version;

            foreach ($languages as $language) {
                $datas['project_words'][$language->key] = $language->value;
            }
        }

        return response()->json($datas, 200);
    }
}
