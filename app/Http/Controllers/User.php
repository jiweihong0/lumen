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

    public function updateUser(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        return $this->usermodel->updateuserModel( $id,$name, $password, $email);
    }

    public function deleteUser(Request $request){
        $id = $request->input('id');
        return $this->usermodel->deleteuserModel($id);
    }

    public function login($id, $password){
        return $this->usermodel->loginModel($id, $password);
    }
}

