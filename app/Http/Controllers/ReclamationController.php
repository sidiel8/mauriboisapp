<?php

namespace App\Http\Controllers;
use App\Reclamation ;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index(){
        $reclamationsBOIS = Reclamation::orderBy('created_at' , 'DESC')->where('category','Bois')->get();
        $reclamationsPVC = Reclamation::orderBy('created_at' , 'DESC')->where('category','PVC')->get();
      //$mesures = $client->mesures() ;
        return  response()->json(['reclamationsBOIS'=>$reclamationsBOIS ,'reclamationsPVC'=>$reclamationsPVC ]) ;
    }

    public function store(Request $request){

        $request->validate([
            'name'     => 'required|max:255',
            'numero'   => 'required|max:255',
            'type'     => 'required|max:255',
            'category' => 'required|max:255',

           
            
        ]);
             $rec = new Reclamation() ;
             $rec->name = request('name') ;
             $rec->numero= request('numero');
             $rec->type=request('type') ;
             $rec->category=request('category') ;
             $rec->respo = \Auth::user()->name ;

             $rec->save() ;
             return response()->json($rec) ;
    }

    public function  delete($id){
        $reclamtion = Reclamation::findOrFail($id);
        $reclamtion->delete() ;
    }

    public function update(Request $request, $id)
    {
        $rec = Reclamation::findOrfail($id) ;
        $rec->date_reparation= now();
        $rec->save();
        return response()->json($rec) ;
        
    }

    public function cancel(Request $request, $id)
    {
        $rec = Reclamation::findOrfail($id) ;
        $rec->date_reparation= NULL;
        $rec->save();
        return response()->json($rec) ;
        
    }
}

