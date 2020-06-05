<?php

namespace App;
use App\Role ;
use App\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nv','phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $rules = ['nv' => 'required|string' , 'password'=>'required|string'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
             return $this->belongsToMany('App\Role') ;
    }

    public function  hasAnyRoles($roles){
            if($this->roles()->where('name', $roles)->first()){
                return true ;
            }

            return false ;
    }

    public function  hasRole($role){
        if($this->roles()->with('name', $role)->first()){
            return true ;
        }

        return false ;

        
}

public function getAllPermissionsAttribute() {
    $permissions = [];
      foreach (Role::all() as $permission) {
        if (Authenticatable::user()->can($permission->name)) {
          $permissions[] = $permission->name;
        }
      }
      return $permissions;
  }

  public function clients(){
    return $this->hasMany('App\Client' , 'vendeur' , 'nv');
}

public function mesures(){
    //return $this->hasMany('App\Mesure' , 'user_id' , 'id');
}
}
