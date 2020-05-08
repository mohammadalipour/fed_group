<?php
	
	use App\User;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\Hash;
	
	class UsersTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			User::create([
				'email'         => 'md.alipour91@gmail.com',
				'password'      => Hash::make('123456'),
				'mobile_number' => '09120709457',
				'name'          => 'Administrator'
			]);
		}
	}
