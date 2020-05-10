<?php
	use App\UserRole;
	use Illuminate\Database\Seeder;
	
	class UserRoleSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			UserRole::create([
				'user_id' => 1,
				'role_id' => 1
			]);
		}
	}
