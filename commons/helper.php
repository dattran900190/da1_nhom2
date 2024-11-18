<?php
 
 if(!function_exists('require_file')){
    function require_file($pathFolder){
        
        $files= array_diff(scandir($pathFolder),['.','..']);

        foreach($files as $file){
           
            require_once $pathFolder .'/' . $file;
        }
    }
}



?>