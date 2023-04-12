<?php

namespace App\Http\Controllers;

use App\User;
use App\Documents;
use App\Deliverys;
use App\Shipments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $documents = Documents::all();
        $deliverys = Deliverys::all();
        $shipments = Shipments::all();
        $users = User::all();

        $data['documents'] = count($documents);
        $data['deliverys'] = count($deliverys);
        $data['shipments'] = count($shipments);
        $data['users'] = count($users);

        return response()->json(["data"=>$data],200);
    }


    public function all($entity)
    {
        $documents = Documents::where("entity_id", $entity)->get();
        $deliverys = Deliverys::where("entity_id", $entity)->get();
        $shipments = Shipments::where("entity_id", $entity)->get();
        $users = User::where("entity_id", $entity)->get();

        $data['documents'] = count($documents);
        $data['deliverys'] = count($deliverys);
        $data['shipments'] = count($shipments);
        $data['users'] = count($users);

        return response()->json(["data"=>$data],200);
    }

}
