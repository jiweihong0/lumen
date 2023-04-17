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
    public function updateuserModel( $id, $name, $password, $email){
        error_log($name);
        $sql = "update user set name=:name, password=:password, email=:email where id=:id";
        $response = DB::update($sql , ['id'=>$id, 'name'=>$name, 'password'=>$password, 'email'=>$email]);
        return $response;
    }

    public function deleteuserModel($id){
        $sql = "delete from user where id=:id";
        $response = DB::delete($sql , ['id'=>$id]);
        return $response;        
    }
}
