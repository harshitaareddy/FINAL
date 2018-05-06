<?php
namespace App\Classes;

use Input;
class Honeypot{
    public static $honey=''; // fill in to test

    public static function generate($honey_name)
    {
        $html = '<div id="' . $honey_name . '_wrap" style="display:none;">' . "\r\n" .
            '<input name="' . $honey_name . '" type="text" value="'.Honeypot::$honey.'" id="' . $honey_name . '"/>' . "\r\n" .
            '</div>';
        return $html;
    }

}