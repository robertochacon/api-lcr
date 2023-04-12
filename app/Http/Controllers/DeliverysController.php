<?php

namespace App\Http\Controllers;

use App\User;
use App\Deliverys;
use Illuminate\Http\Request;

class DeliverysController extends Controller
{
    public function index()
    {
        $deliverys = Deliverys::all();
        return response()->json(["data"=>$deliverys],200);
    }

    public function all($entity)
    {
        $deliverys = Deliverys::where("entity_id", $entity)->get();
        return response()->json(["data"=>$deliverys],200);
    }

    public function watch($identification){
        try{
            $delivery = Deliverys::where('identification','=',$identification)->get();
            return response()->json(["data"=>$delivery],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        try{
            $user = new User(request()->all());
            $user->password = bcrypt("12345");
            $user->role = "delivery";
            $user->save();

            $deliverys = new Deliverys(request()->all());
            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('/public/deliverys');
                $deliverys->image = $path;
            }
            $deliverys->save();
            return response()->json(["data"=>$deliverys],200);            
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function update(Request $request, $id){
        try{
            $orders = Deliverys::find($id);
            $orders->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Deliverys::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
