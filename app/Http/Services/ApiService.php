<?php 

namespace App\Http\Services;

use App\Http\Repositories\ApiRepository;

class ApiService
{
	public function insertOrUpdate($req,$id=null)
	{
		$success=app(ApiRepository::class)->insertOrUpdate($req,$id);
		return $success;
	}

	public function allData()
	{
		$data=app(ApiRepository::class)->allData();
		return $data;
	}

	public function oneData($id)
	{
		$data=app(ApiRepository::class)->oneData($id);
		return $data;
	}

	public function delete($id)
	{
		$success=app(ApiRepository::class)->delete($id);
		return $success;
	}
}