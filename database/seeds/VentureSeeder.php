<?php
	
	use App\Venture;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Str;
	
	class VentureSeeder extends Seeder
	{
		/**
		 * @throws Exception
		 */
		public function run()
		{
			Venture::create(
				[
					'title'          => Str::random(10),
					'description'    => Str::random(60),
					'color'          => '#F1C40F',
					'cover'          => Str::random(5).'.jpg',
					'capacity'       => random_int(200,500),
					'unit_price'     => random_int(30,200),
					'project_return' => random_int(5,15),
					'duration'       => random_int(6,24),
					'free'           => 0,
				]
			);
		}
	}
