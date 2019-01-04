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

		if($req->first_name){
			$user->fname=$req->first_name;
		}
		if($req->last_name){
			$user->lname=$req->last_name;
		}
		if($req->email){	
			$user->email=$req->email;
		}
		if($req->address){
			$user->address=$req->address;
		}
		if($req->age){
			$user->age=$req->age;
		}
		if($req->password){
			$user->password=Hash::make($req->password);
		}

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