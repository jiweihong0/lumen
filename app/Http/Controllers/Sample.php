<?php
namespace App\Http\Controllers;

class Sample extends Controller{
    public function getdata(){
        return "you get data{1231231323}";
    }
    public function name($name){
        return "hi $name";
    }
    public function add($a,$b){
        return "A+B = ". $a+$b;
    }
};