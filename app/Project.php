<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id',
    ];

    /**
     * Get the user that owns the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The languages that belong to the project.
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function verions()
    {
        return $this->hasMany(LanguageVersion::class);
    }
}
