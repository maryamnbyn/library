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
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            return;

        $rules = [
            'name' => 'required|min:6',
            'lastName' => 'required',
            'city' => 'required',
            'birthday' => 'required',
            'postcode' => 'required',
            'discipline' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|confirm:password'
        ];

        validation::make($_POST, $rules);
        return validation::getErrores();

        //var_dump($_POST);die();
    }

    public function addbookvalidation()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            return;

        $rules = [
            'name'       => 'required|min:6',
            'date'       => 'required',
            'title'      => 'required',
            'writerID'   => 'required',
            'categoryID' => 'required',
            'num'        => 'required',
            'description'=> 'required',
        ];

        $valid = validation::make($_POST, $rules);
        return (validation::getErrores());

        //var_dump($_POST);die();
    }

    public function AddTrustBookValidation()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            return;
        $rules = [
            'name'     => 'required|min:6',
            'userID'   => 'required',
            'writerID' => 'required',
            'date'     => 'required',
            'datee'    => 'required',


        ];
        $valid = validation::make($_POST, $rules);

        return (validation::getErrores());

        //var_dump($_POST);die();

    }

    public function AddWriterValidation()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            return;

        $rules = [
            'name'        => 'required|min:6',
            'birthday'    => 'required',
            'description' => 'required',
            'city'        => 'required',
            'writerImage' => 'required',
        ];

        $valid = validation::make($_POST, $rules);

        return (validation::getErrores());

        //var_dump($_POST);die();
    }

}