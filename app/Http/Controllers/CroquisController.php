<?php

namespace App\Http\Controllers;
use App\Croquis ;
use Illuminate\Http\Request;

class CroquisController extends Controller
{


    public function index($id){
        $croquis = Croquis::orderBy('created_at' , 'DESC')->where('client_id', $id)->with(['mesure'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($croquis) ;
    }

    public function showCroquis($id){
        $croquis = Croquis::orderBy('created_at' , 'DESC')->where('id', $id)->with(['mesure'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($croquis) ;
    }

    public function croquis(){
        $croquis = Croquis::orderBy('created_at' , 'DESC')->with(['client','mesure'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($croquis) ;
    }

    public function store(Request $request){
       
            
     //  return $request->all('mesure_id');
       $imageName = $request->mesure_id.'_'.$request->client_name.'_'.time().'.'.$request->image->getClientOriginalExtension() ;
       $imgExt = $request->image->getClientOriginalExtension() ;
      // $imageSize=$request->image->getClientOriginalSize() ;
      // return $imageSize ;
        $request->image->move(public_path('images/croquis'), $imageName);

        $croquis = new Croquis() ;
             $croquis->designation =request('designation');
             $croquis->designer= $request->designer;
             $croquis->mesure_id=request('mesure_id') ;
             $croquis->client_id=request('client_id') ;
             $croquis->filename=$imageName ;
             $croquis->filext=$imgExt ;
             $croquis->respo = \Auth::user()->name ;
             $croquis->save() ;
    	return response()->json(['success'=>'You have successfully upload image.']);
       
    }
    // for actiu spefi
 

    /***************************************************** */


    public function upload(Request $request)
    {
        if (count($request->images)) {
            foreach ($request->images as $image) {
                return $image ;
            }
        }

       /* return response()->json([
            "message" => "Doness"
        ]);*/
    }


    public function uploadFile(Request $request) {
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getClientSize();
            $file = FileEntry::create($input);

            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
