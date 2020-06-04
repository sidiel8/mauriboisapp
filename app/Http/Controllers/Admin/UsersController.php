<?php

namespace App\Http\Controllers\Admin;
use App\User ; 
use App\Role ;
use App\Client ;
use Gate ;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{ 

     public function __construct(){
         $this->middleware('auth') ;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all() ;
        return  view('admin.users.users')->with('users' , $users) ; ;
    }


    
    public function allUsers(Request $request)
    {
        $users = User::all() ;
        return  reponsonse()->json($users) ;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('auth.register') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|unique:users|max:255',
            'nv' => 'required|unique:users|max:255',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
            
        ]);
        $user =new  User() ;
        $user->name =request('name');
        $user->nv =request('nv');
        $user->phone =request('phone');
        $user->password = Hash::make(request('password'));
        
        $user->save() ;
        //$user= User::find($id);
       
        $user->roles()->sync($request->roles);
       return redirect()->route('admin.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       
        $user = User::findOrfail($id) ;
      
        $roles = Role::all() ;
   
        return view('admin.edit')->with(
            [
                'user' => $user ,
                'roles' => $roles
            ]
        ) ;
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
        $user= User::find($id);
       
         $user->roles()->sync($request->roles);
         return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id) ;
        $user->roles()->detach() ;
        $user->delete();
          return redirect('admin') ;
    }

    public function showUsers(){
        $users = User::all()->sortByDesc('id');
      return  view('admin.users.users')->with('users' , $users) ;
    }

    public function showClients(){
        $clients = Client::all()->sortByDesc('id');
        return view('admin.clients')->with('clients' , $clients) ;
    }

    public function showClient($id){
        $client = Client::findOrFail($id);
        return  view('admin.clients.client')->with('client' , $client) ;
    }
}
