<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'materia', 'grade_id',
    ];

    /**
     * 
     *
     * @return string
     */
    public function getLavelSelectAttribute()
    {
        return $this->materia . ', ' . $this->grade->grade . ' grado';
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teacher_materias');
    }

}
