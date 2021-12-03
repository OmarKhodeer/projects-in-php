<?php
// Format the date
function formatDate($date) {
    return date("F j, Y, g:i a", strtotime($date));
}

function shorttenText($text, $chars = 450) {
    if(strlen($text) >= 450) {
        $text .= " ";
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text, " "));
        $text .= "...";
    }
    return $text;
}