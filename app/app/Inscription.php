<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'academic_period_id', 'grade_id', 'section_id',
    ];

    public function student()
	{
		return $this->belongsTo(Student::class);
	}

    public function academic_period()
    {
        return $this->belongsTo(AcademicPeriod::class);
    }

}
