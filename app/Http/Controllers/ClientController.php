<?php

namespace App\Http\Controllers;
use App\Client ;
use App\Mesure;
use Illuminate\Http\Request;
use Gate ;
class ClientController extends Controller
{
    //public String mesuer ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        if(Gate::allows('mange')){
            $clients = Client::orderBy('created_at' , 'DESC')->paginate(10);
         }
         else{
         $clients =  Client::orderBy('created_at' , 'DESC')->where('vendeur' , \Auth::user()->nv)->paginate(10);
         } ;
      
     
        return response()->json($clients);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request ;
      
     $request->validate([
            'name' => 'required|max:255',
            'numero' => 'required|max:255',
            'email' => 'max:255',
            'quartier' => 'required|max:255',
            'vendeur' => 'required|max:255',
            
        ]);
      $client = new Client() ;
         $client->name=request('name')   ;
         $client->numero=request('numero')   ;
         $client->email = request('email');
         $client->quartier=request('quartier')   ;
         $client->vendeur = request('vendeur')    ;    
         $client->respo=\Auth::user()->name  ;
        
         $client->save() ;
        
            if($client){
               return $this->refresh() ;
            } 
       
             
    } 
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::findOrfail($id) ;
      return response()->json($client) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrfail($id) ;
        $client->name = request('name');
        $client->numero = request('numero');
        $client->email = request('email');
        $client->quartier = request('quartier');
        $client->respo=\Auth::user()->name  ;
        $client->save();
        if($client){
                return $this->refresh() ;
        }
        
    }
    public function statu(Request $request, $id)
    {
        $client = Client::findOrfail($id) ;
       
        $client->statu = 1;
        $client->respo=\Auth::user()->name  ;
        $client->save();
        return response()->json($client);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function refresh(){
        if(Gate::allows('mange')){
            $clients = Client::orderBy('created_at' , 'DESC')->paginate(10);
         }
         else{
            $clients =  Client::orderBy('created_at' , 'DESC')->where('vendeur' , \Auth::user()->nv)->paginate(10);
         } ;
      
     
        return response()->json($clients);
    }
}
