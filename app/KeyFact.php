<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeyFact extends Model
{
	public function detail($ventureId)
	{
		return DB::table('key_facts')
			->select(['title','description'])
			->join('key_fact_details','usage_id','=','key_fact_details.id')
			->where('usage_type','App\\KeyFactDetail')
			->where('venture_id','=',$ventureId)
			->get();
	}
}
