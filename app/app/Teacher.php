<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'people_id', 'user_id',
    ];

    public function people()
	{
		return $this->belongsTo(People::class);
	}

    public function materias(){
        return $this->belongsToMany(Materia::class,'teacher_materias');
    }

    public function pluckMaterias()
    {
        
        foreach ($this->materias as $key => $materia) {

        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
