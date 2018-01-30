<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'profession', 'work_place', 'people_id',
    ];

    public function people()
	{
		return $this->belongsTo(People::class);
	}

    public function motherstudent() {
        return $this->hasMany(Student::class, 'mother_id');
    }

    public function fatherstudent() {
        return $this->hasMany(Student::class, 'father_id');
    }

    public function auxilistudentary() {
        return $this->hasMany(Student::class, 'auxiliary_id');
    }



}
