<?php

namespace adminpannel\admin_forms\classes;


include "validation.php";

class UserController
{
    /**
     *
     */
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST')
            return;
        $rules =[
            'name'             => 'required|min:6',
            'lastName'         => 'required',
            'city'             => 'required',
            'birthday'         => 'required',
            'postcode'         => 'required',
            'discipline'       => 'required',
            'email'            => 'required|email|unique:user',
            'password'         => 'required|min:6|max:20',
            'confirm_password' => 'required|confirm:password'
        ];
        $validation =new validation();
        $valid = $validation->make($_POST , $rules);
        var_dump($validation->getErrores());
        $validation->getErrores();
        if(!$valid){
            var_dump($validation->getErrores());die();
        }
var_dump($_POST);die();
    }
}