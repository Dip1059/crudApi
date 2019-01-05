<?php

namespace App\Http\Repositories;

use App\User;
use Hash;

class ApiRepository
{
	public function insertOrUpdate($req,$id=null)
	{
		
		$user= new User();
		if($req->id){
			$user=$user->find($req->id);
		}
		$user->fname=$req->first_name;
		$user->lname=$req->last_name;
		$user->country=$req->country;
		$user->phone=$req->phone;
		$success=$user->save();
		return $success;
	}

	public function allData()
	{
		$data=User::all();
		return $data;
	}

	public function oneData($id)
	{
		$data=User::where(['id'=>$id])->first();
		return $data;
	}

	public function delete($id)
	{
		$success=User::where(['id'=>$id])->delete();
		return $success;
	}
}