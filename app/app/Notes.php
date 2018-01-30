<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_lapse_note', 'first_second_note', 'first_third_note', 'inscription_id',
    ];
}
