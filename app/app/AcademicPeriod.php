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
        'academic_period', 'status', 'min_section', 'max_section', 'date_int', 'date_fin',
    ];

    public function inscription()
    {
        return $this->hasOne(Inscription::class);
	}

}
