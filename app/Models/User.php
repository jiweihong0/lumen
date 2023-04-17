<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class User{
    public function showall(){
        $sql = "select * from user";
        $response = DB::select($sql);
        return $response;
    }
    public function insert(){
        $sql = "insert in to user (id,name,password,email) values (:id, :name, :password, :email)";
        $response = DB::insert([$sql , 'id'=>$id, 'name'=>$name, 'password'=>$password, 'email'=>$email]);
        return $response;
    }
}
