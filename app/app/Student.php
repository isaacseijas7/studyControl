<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diseases', 'people_id', 'mother_id', 'father_id', 'auxiliary_id',
    ];

    public function people() {
		return $this->belongsTo(People::class);
	}

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    

    /*public function mother() {
        return $this->belongsTo(People::class)->select(['id', 'mother_id']);
    }*/

    public function mother() {
        return $this->belongsTo(Representative::class);
    }

    public function father() {
        return $this->belongsTo(Representative::class);
    }

    public function auxiliary() {
        return $this->belongsTo(Representative::class);
    }

}
