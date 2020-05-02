<?php
	
	use App\Page;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Str;
	
	class PagesTableSeeder extends Seeder
	{
		/**
		 * @throws Exception
		 */
		public function run()
		{
			Page::insert(
				[
					[
						'type' => 'about_us',
						'content' => Str::random(200),
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now(),
					],
					[
						'type' => 'contact_us',
						'content' => Str::random(200),
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now(),
					],
					[
						'type' => 'term_and_condition',
						'content' => Str::random(200),
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now(),
					],
					[
						'type' => 'static_page',
						'content' => Str::random(200),
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
					]
				]
			);
		}
	}
