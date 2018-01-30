<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grade'
    ];

    public function inscription()
    {
        return $this->hasOne(Inscription::class);
	}

}
