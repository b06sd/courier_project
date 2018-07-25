<?php
if (!function_exists('numberFormat')) {
    function numberFormat($curr){
        return number_format($curr, 0, '.', ',');
    }
}

if (!function_exists('currencyFormat')) {
    function currencyFormat($curr){
        return number_format($curr, 2, '.', ',');
    }
}