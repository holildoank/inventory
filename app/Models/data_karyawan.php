<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_karyawan extends Model
{
    protected $table = 'data_karyawan';
	protected $primaryKey = 'id_karyawan';
	protected $fillable = [
		'nm_depan',
		'nm_belakang',
		'telp',
		'email',
		'sex',
		'hp',
		'tempat_lahir',
		'tgl_lahir',
		'jabatan',
		'alamat',
		'agama',
		'pendidikan',
		'id_status',
		'NIK',
		'foto',
		'tgl_bergabung',
	];
}
