<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Documents::orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$documents],200);
    }

    public function all($entity)
    {
        $documents = Documents::where("entity_id", $entity)->orderBy('id', 'DESC')->get();
        return response()->json(["data"=>$documents],200);
    }

    public function watch($identification){
        try{
            $document = Documents::where('identification','=',$identification)->get();
            return response()->json(["data"=>$document],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function register(Request $request)
    {
        $documents = new Documents(request()->all());
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time()."-".$file->getClientOriginalName();
            $path = "all/{$request->entity_id}/documents/".$filename;
            Storage::disk('local')->put("public/{$path}", file_get_contents($request->file));
            $documents->file = $path;
         }
        // if ($request->hasFile('file')) {
        //     $temp = file_get_contents($request->file('file'));
        //     $documents->file = base64_encode($temp);
        //     // $path = $request->file('file')->store('/public/documents');
        //     // $documents->file = $path;
        //  }
        $documents->save();
        return response()->json(["data"=>$documents],200);
    }

    public function update(Request $request, $id){
        try{
            $document = Documents::find($id);
            $document->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

    public function delete($id){
        try{
            $docuemnts = Documents::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"none"],200);
        }
    }

}
