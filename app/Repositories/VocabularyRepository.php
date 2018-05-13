<?php

namespace App\Repositories;

use App\Repositories\Core\Repository;
use App\Vocabulary;

class VocabularyRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Vocabulary::class;
    }

    public function getKeysByversionId(int $version)
    {
        return $this->model->where('lang_vers_id', $version)->get();
    }
}