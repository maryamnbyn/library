<?php

function select_generator
($array,$selectedValue,$InputName,$cssCalssName,$otherAttribite)
{
    $html="<select class='$cssCalssName' name='$InputName' $otherAttribite>";
    foreach ($array as $key=>$value)
    {
        //echo $key."<hr>";
        $selected="";
        if($value==$selectedValue)
            $selected="selected";
        else
            $selected="";

        $html.="<option value='$value' $selected>$key</option>";

    }
    $html.="</select>";
    return $html;

}




?>