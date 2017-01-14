<?php

	namespace App\Classes\Karyawan;

	use App\User;
	use App\Models\data_karyawan;
	use App\Models\data_level;


	class Karyawan {

		/*Menampilkan data karyawan Me::data()*/
		public function data(){
			return data_karyawan::find(\Auth::user()->id_karyawan);
		}

		public function fullName(){
			$user = data_karyawan::find(\Auth::user()->id_karyawan);
			return $user->nm_depan . ' ' . $user->nm_belakang;
		}

		/*Mengambil data level user Me::level()*/
		public function level(){
			$levels = data_level::whereId_user(\Auth::user()->id_user)
				->select('id_level_user AS level')
				->get();
			$_level = [];
			foreach($levels as $level){
				$_level[] = $level->level;
			}
			return $_level;
		}


	}
