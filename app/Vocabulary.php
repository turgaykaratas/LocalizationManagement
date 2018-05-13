<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lang_vers_id', 'key', 'value',
    ];

    public function languageVersion()
    {
        return $this->belongsTo(LanguageVersion::class, 'lang_vers_id');
    }
}
