<?php
    function link_url($uri)
    {
        return BASE_URL . $uri ;
    }

    function fetch_file(string $folder_name ,  string $extension = '*')
    {
        $result = null ;
        if(file_exists(BASE_PATH . $folder_name)){
            $path =  $folder_name .'\\*.' . $extension ;
            $result = glob($path) ;            
        }else{
            $result = false ;
        }
        return  $result ;
    }