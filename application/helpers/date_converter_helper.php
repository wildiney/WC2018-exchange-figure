<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('date_converter')){
    function date_converter($date,$format){
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        return strftime($format, strtotime($date));
    }
}

?>