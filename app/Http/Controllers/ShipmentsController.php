<?php

namespace App\Http\Controllers;

use App\Shipments;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    public function index()
    {
        $shipments = Shipments::orderBy('id','desc')->get();
        return response()->json(["data"=>$shipments],200);
    }

    public function all($entity)
    {
        $shipments = Shipments::where("entity_id", $entity)->get();
        return response()->json(["data"=>$shipments],200);
    }

    public function watch($identification){
        try{
            $shipment = Shipments::where('identification','=',$identification)->get();
            return response()->json(["data"=>$shipment],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function assignMessenger($id, $delivery){
        try{
            $shipment = Shipments::find($id);
            $shipment->delivery = $delivery;
            $shipment->update();
            return response()->json(["data"=>$shipment],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function statusShipment($id, $status){
        try{
            $shipment = Shipments::find($id);
            $shipment->status = $status;
            $shipment->update();
            return response()->json(["data"=>$shipment],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }


    public function register(Request $request)
    {
        try{
            $shipments = new Shipments(request()->all());
            $shipments->save();
            return response()->json(["data"=>$shipments],200);            
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function update(Request $request, $id){
        try{
            $shipments = Shipments::find($id);
            $shipments->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $shipments = Shipments::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }
}
