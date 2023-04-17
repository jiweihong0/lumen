<?php
namespace App\Http\Controllers;
use App\Models\User as UserModel;
use Illuminate\Http\Request;

class User extends Controller{
  
    protected $usermodel;

    public function __construct() {
        $this->usermodel = new UserModel;
    }

    public function getAlluser(){
        return $this->usermodel->showall();
    }
    public function insertuser(Request $request){
       
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $usermodel = new Usermodel();
        return  $usermodel->insertuserModel( $name, $password, $email);
    }
}

