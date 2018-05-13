<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageVersion extends Model
{
    protected $table = 'language_version';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id', 'project_id', 'version',
    ];

    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
