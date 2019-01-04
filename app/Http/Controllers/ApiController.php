<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use App\Http\Services\ApiService;

class ApiController extends Controller
{
    public function insertOrUpdate(DataRequest $req,$id=null)
    {
    	$success=app(ApiService::class)->insertOrUpdate($req,$id);
    	if($success){
    		if($id){
    			return response()->json([
    					'message'=>'Successfully updated',
    					'success'=>$success,
    					'status_code'=>200
    				]);
    		}else{
    			return response()->json([
    					'message'=>'Successfully inserted',
    					'success'=>$success,
    					'status_code'=>200
    				]);
    		}
    	}else{
    		return response()->json([
    				'message'=>'Some error has occured. Please try again',
    				'success'=>false
    			]);
    	}
    }


    public function allData()
    {
    	$data=app(ApiService::class)->allData();
    	if($data){
    		return response()->json([
    				'success'=>true,
    				'status_code'=>200,
    				'data'=> $data
    			]);
    	}else{
    		return response()->json([
    				'message'=>'Some error has occured. Please try again',
    				'success'=>false
    			]);
    	}
    }

    public function oneData($id)
    {
    	$data=app(ApiService::class)->oneData($id);
    	if($data){
    		return response()->json([
    				'success'=>true,
    				'status_code'=>200,
    				'data'=> $data
    			]);
    	}else{
    		return response()->json([
    				'message'=>'Some error has occured or Data not found. Please try again',
    				'success'=>false
    			]);
    	}
    }

    public function delete($id)
    {
    	$success=app(ApiService::class)->delete($id);
    	if($success){
    		return response()->json([
    				'message'=>'Successfully deleted.',
    				'success'=>$success,
    				'status_code'=>200
    			]);
    	}else{
    		return response()->json([
    				'message'=>'Some error has occured or Data not found. Please try again',
    				'success'=>false
    			]);
    	}
    }
}
