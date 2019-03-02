<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 3/2/2019
 * Time: 3:47 PM
 */

namespace adminpannel\admin_forms\classes;


use Plasticbrain\FlashMessages\FlashMessages;

class Controller
{
public $flash;
function  __construct()
{
    $this->flash = new FlashMessages();
}
 public function validation($data,$rules){

     $validation =new validation();
     $valid = $validation->make($_POST , $rules);
     if (! $valid){
         foreach ($validation->getErrores() as $error){
             $this->flash->error($error[0]);
         }
         return false;
     }
     return true;
 }
}