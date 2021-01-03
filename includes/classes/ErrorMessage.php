<?php
class ErrorMessage
{
    public static function show($text)
    {
        exit("<span class='error__banner'>$text</span>");
    }
}
