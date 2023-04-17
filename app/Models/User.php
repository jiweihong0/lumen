<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class User{
    public function showall(){
        $sql = "select * from user";
        $response = DB::select($sql);
        return $response;
    }
    public function insertuserModel( $name, $password, $email){
        error_log($name);
        $sql = "insert into user (id,name,password,email) values (:id, :name, :password, :email)";
        $response = DB::insert($sql , ['id'=>NULL, 'name'=>$name, 'password'=>$password, 'email'=>$email]);
        return $response;
    }
}
