<?php

namespace App\Repositories;

use App\Repositories\Core\Repository;
use App\Language;

class LanguageRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Language::class;
    }

    public function getNotInIds(array $ids)
    {
        return $this->model->whereNotIn('id', $ids)->get();
    }
}