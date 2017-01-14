<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_level extends Model
{
    protected $table 		= 'data_level';
	protected $primaryKey 	= 'id_level';
	protected $fillable 		= [
		'id_user',
		'id_level_user'
	];
}
