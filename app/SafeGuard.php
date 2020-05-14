<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SafeGuard extends Model
{
	public function detail($ventureId)
	{
		return DB::table('key_facts')
			->select(['title','icon'])
			->join('safe_guards','usage_id','=','safe_guards.id')
			->where('usage_type','App\\SafeGuard')
			->where('venture_id','=',$ventureId)
			->get();
	}
}
