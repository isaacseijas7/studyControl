<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'academic_period', 'status', 'min_section', 'max_section',
    ];

    public function inscription()
    {
        return $this->hasOne(Inscription::class);
	}

}
