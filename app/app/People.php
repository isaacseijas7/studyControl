<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class People extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'identification', 'gender', 'birthdate', 'location', 'domicile', 'phone_local', 'phone_movil',
    ];


    /**
     * Obtener el nombre y tipo de curso.
     *
     * @return string
     */
    public function getLavelSelectAttribute()
    {
        return $this->name . ' ' . $this->last_name . ' | C.I: ' . $this->identification;
    }

    public function fullName()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function gender()
    {
        return ($this->gender == 'Female'? 'Femenino': 'Masculino');
    }

    public function age()
    {
        $birthdate = new Carbon($this->birthdate);
        $age =  $birthdate->age;
        return $age;
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
	}

	public function teacher()
    {
        return $this->hasOne(Teacher::class);
	}

	public function student()
    {
        return $this->hasOne(Student::class);
	}

	public function worker()
    {
        return $this->hasOne(Worker::class);
	}

}
