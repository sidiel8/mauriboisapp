<?php

namespace App\Http\Controllers;
use App\Client ;
use App\User;
use App\Role;
use Gate ;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function allUsers(Request $request)
    { 
        $users = Role::where('name','<>','admin')->first()->users()->get() ;
       // $users = Role::all()->users()->get() ;
    
       
        return  response()->json($users) ;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    
      
       return view('home') ;
    }


    public function clientToEdit($id){
        $client = Client::orderBy('created_at' , 'DESC')->where('numero' ,$id)->with('devis')->get();
      //$mesures = $client->mesures() ;
        return  response()->json($client) ;
    }

    public function deleteClient($id){
        $client = Client::findOrFail($id);
        $client->devis()->delete();
        $client->croquis()->delete();
        $client->mesures()->delete();
        $client->delete();
        return response()->json($client);
    }
}
