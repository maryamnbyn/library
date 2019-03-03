<?php

namespace adminpannel\admin_forms\classes;


class validation
{
    /**
     * @var
     */
    private  $errors;
    /**
     * @var
     */
    private $data;

    /**
     * @param array $data
     * @param array $rules
     * @return bool
     */
    public function make(Array $data , Array $rules)
    {
    $valid      = true;
    $this->data = $data;

    foreach ($rules as $item => $ruleset){

        $ruleset = explode('|' ,$ruleset);
        foreach ($ruleset as $rule){
            $pos = strpos($rule,":");
            if ($pos !== false)
            {
                $parametr =substr($rule,$pos+1);
                $rule =substr($rule,0,$pos);
            } else
                {
                $parametr="";

            }
            $MethodName = ucfirst($rule);
            $value =isset($data[$item]) ? $data[$item] : null;
            if (method_exists($this,$MethodName)){
                if ($this->{$MethodName}($item,$value,$parametr)== false)
                {
                    $valid = false;
                    break;
                }


            }

        }
    }
        return $valid;

}

    /**
     * @return mixed
     */
    public function getErrores()
    {
    return $this->errors;
}

    /**
     * @param $item
     * @param $value
     * @return bool
     */
    public function required($item , $value)
    {
    if (strlen($value) == 0){
        $this->errors[$item][] = "پر کردن فیلد {$item} الزامیست";
    }
return true;
}

    /**
     * @param $item
     * @param $value
     */
    public function email($item , $value )
    {

    if (!filter_var($value , FILTER_VALIDATE_EMAIL)){
        $this->errors[$item][]="فرمت ایمیل وارد شده صحیح نیست";

    }
}

    /**
     * @param $item
     * @param $value
     * @param $param
     */
    public function min($item , $value , $param)
    {
if (strlen($value) < $param)
{
    $this->errors[$item][]="طول فیلد  {$item} کمتر از {$param} کاراکتر است";
    return false;
}
return true;
}

    public function max($item , $value , $param)
    {
        if (strlen($value) > $param)
        {
            $this->errors[$item][]="طول فیلد {$param} نمیتواند بیشتر از {$item} کاراکتر شود";
            return false;
        }
        return true;
    }
public function confirm($item,$value,$param)
{
        $orginal = isset($this->data[$item]) ? $this->data[$item] : null ;
        $confirm = isset($this->data[$param]) ? $this->data[$param] : null ;
        if ($orginal !== $confirm)
        {
            $this->errors[$item][] = "فیلد {$item} با فیلد {$param} برابر نیست.";
 return false;
        }
        return true;
}
}