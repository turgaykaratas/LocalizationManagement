<?php

namespace App\Repositories;

use App\Repositories\Core\Repository;
use App\LanguageVersion;
use DB;
use Cache;

class LanguageVersionRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return LanguageVersion::class;
    }

    public function getByVersionAndProIdAndLangId(int $version, int $proId, int $langId)
    {
        return $this->model->where('language_id', $langId)
            ->where('project_id', $proId)
            ->where('version', $version)
            ->first();
    }


    public function getByVersionAndProjectAndLangCode(int $version, string $projectName, string $langCode)
    {
        $languageVersions = Cache::remember(('versionlang' . $projectName . $langCode . $version), 5, function () use ($version, $projectName, $langCode) {
            return DB::table('language_version')
                ->join('vocabularies', 'language_version.id', '=', 'vocabularies.lang_vers_id')
                ->join('languages', 'language_version.language_id', '=', 'languages.id')
                ->join('projects', 'language_version.project_id', '=', 'projects.id')

                ->select('projects.name as pname', 'languages.name as lname', 'language_version.version', 'vocabularies.key', 'vocabularies.value')

                ->where('projects.name', $projectName)
                ->where('languages.code', $langCode)
                ->where('language_version.version', $version)
                ->get();
        });

        return $languageVersions;
    }

}