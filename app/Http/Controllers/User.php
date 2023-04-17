<?php
namespace App\Http\Controllers;
use App\Models\User as UserModel;

class User extends Controller{
    public function getAlluser(){
        $usermodel = new Usermodel();
        return $usermodel->showall();
    }
    public function insertuser(){
        $usermodel = new Usermodel();
        return $usermodel->insertuser();
    }
}

