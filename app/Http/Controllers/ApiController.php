<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InsertRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Services\ApiService;

class ApiController extends Controller
{
    public function insert(InsertRequest $req,$id=null)
    {
        $success=app(ApiService::class)->insertOrUpdate($req,$id);

        if($success){
           return response()->json([
             'message'=>'Successfully inserted',
             'success'=>$success,
             'status_code'=>200
         ]);
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
       if(count($data)>0){
          return response()->json([
            'success'=>true,
            'status_code'=>200,
            'data'=> $data
        ]);
        }else{
            return response()->json([
                'message'=>'Some error has occured or no data exists yet. Please try again',
                'success'=>false
            ]);
        }
    }

    public function update(UpdateRequest $req,$id)
    {
        try{
            $success=app(ApiService::class)->insertOrUpdate($req,$id);
        }
        catch(\Exception $e){
            if($e->errorInfo[0]=="23000"){
                return response()->json([
                    'message'=> 'The given data was invalid.',
                    'errors'=> [
                        'phone'=> [
                            'The phone has already been taken.'
                        ]
                    ]
                ]);
            }else{
                return response()->json([
                    'message'=>'Some error has occured. Please try again',
                    'success'=>false
                ]);
            }
        }

        if($success){
            return response()->json([
                'message'=>'Successfully updated',
                'success'=>$success,
                'status_code'=>200
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

