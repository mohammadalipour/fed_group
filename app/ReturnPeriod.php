<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturnPeriod extends Model
{
	public function detail($ventureId)
	{
		return DB::table('key_facts')
			->select(['title','type','description','periods'])
			->join('return_periods','usage_id','=','return_periods.id')
			->where('usage_type','App\\ReturnPeriod')
			->where('venture_id','=',$ventureId)
			->get();
	}
}
