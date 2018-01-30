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
}
