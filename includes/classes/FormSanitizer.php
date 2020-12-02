<?php

class FormSanitizer
{

    public static function sanitizeFormString($inputText)
    {
        $inputText = strip_tags($inputText); //remove html characters
        $inputText = str_replace(" ", "", $inputText); // remove unwanted spaces
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }
    
    public static function sanitizeFormUsername($inputText)
    {
        $inputText = strip_tags($inputText); //remove html characters
        $inputText = str_replace(" ", "", $inputText); // remove unwanted spaces
        return $inputText;
    }

    public static function sanitizeFormPassword($inputText)
    {
        $inputText = strip_tags($inputText); //remove html characters
        return $inputText;
    }

    public static function sanitizeFormEmail($inputText)
    {
        $inputText = strip_tags($inputText); //remove html characters
        $inputText = str_replace(" ", "", $inputText); // remove unwanted spaces
        return $inputText;
    }

}
