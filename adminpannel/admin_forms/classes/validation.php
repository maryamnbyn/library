<?php

namespace adminpannel\admin_forms\classes;


class validation
{
    /**
     * @var
     */
    static private $errors;
    /**
     * @var
     */
    static private $data;

    /**
     * @param array $data
     * @param array $rules
     *
     *
     * $a = "98765";
     * $b = substr($a,1,2);
     *
     *
     *
     * @return bool
     */
    static public function make(Array $data, Array $rules)
    {
        $valid = true;
        self::$data = $data;

        foreach ($rules as $item => $ruleset) {

            $ruleset = explode('|', $ruleset);
            foreach ($ruleset as $rule) {
                $pos = strpos($rule, ":");
                if ($pos !== false) {
                    $parametr = substr($rule, $pos + 1);
                    $rule = substr($rule, 0, $pos);
                } else {
                    $parametr = "";

                }
                $MethodName = ucfirst($rule);
                $value = isset($data[$item]) ? $data[$item] : null;
                if (method_exists(new static(), $MethodName)) {
                    if (self::{$MethodName}($item, $value, $parametr) == false) {
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
    static public function getErrores()
    {
        return self::$errors;
    }

    /**
     * @param $item
     * @param $value
     * @return bool
     */
    public function required($item, $value)
    {
        if (strlen($value) == 0) {
            self::$errors[$item][] = "پر کردن فیلد {$item} الزامیست";
        }
        return true;
    }

    /**
     * @param $item
     * @param $value
     */
    public function email($item, $value)
    {

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$errors[$item][] = "فرمت ایمیل وارد شده صحیح نیست";

        }
    }

    /**
     * @param $item
     * @param $value
     * @param $param
     */
    public function min($item, $value, $param)
    {
        if (strlen($value) < $param) {
            self::$errors[$item][] = "طول فیلد  {$item} کمتر از {$param} کاراکتر است";
            return false;
        }
        return true;
    }

    public function max($item, $value, $param)
    {
        if (strlen($value) > $param) {
            self::$errors[$item][] = "طول فیلد {$param} نمیتواند بیشتر از {$item} کاراکتر شود";
            return false;
        }
        return true;
    }

    public function confirm($item, $value, $param)
    {
        $orginal = isset(self::$data[$item]) ? self::$data[$item] : null;
        $confirm = isset(self::$data[$param]) ? self::$data[$param] : null;
        if ($orginal !== $confirm) {
            self::$errors[$item][] = "فیلد {$item} با فیلد {$param} برابر نیست.";
            return false;
        }
        return true;
    }
}