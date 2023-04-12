<?php

namespace App\Http\Controllers;

use App\Entitys;
use Illuminate\Http\Request;

class EntitysController extends Controller
{
    public function index()
    {
        $entitys = Entitys::orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$entitys],200);
    }

    public function watch($id){
        try{
            $entity = Entitys::find($id);
            return response()->json(["data"=>entity],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        $entitys = new Entitys(request()->all());
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('/public/entities');
            $entitys->logo = $path;
         }
        $entitys->save();
        return response()->json(["data"=>$entitys],200);
    }

    public function update(Request $request, $id){
        try{
            $orders = Entitys::find($id);
            $orders->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Entitys::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
