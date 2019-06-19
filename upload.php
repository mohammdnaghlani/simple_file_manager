<?php 
require_once 'init.php';
$msg =null ;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_FILES['upfile']) && !empty($_FILES['upfile'])){
        $file_name = $_FILES['upfile']['name'];
        $file_path = $_FILES['upfile']['tmp_name'];
        $random_name = uniqid() ;
        $file_type =$_FILES['upfile']['type'];
        $extention = explode('.' , $file_name);
        $extention = strtolower(end($extention));
        $withe_list_type = [
           'image/jpeg',
           'image/jpg',
           'image/png',
           'image/gif',
        ];
        if(in_array($file_type , $withe_list_type)){
            $result = move_uploaded_file($file_path , BASE_PATH.'gallery/'.$random_name. '.' . $extention);
            if($result){
                $msg = 'Upload success !' ;
            }
        }else{
            $msg = 'extension error !' ;
        }
    }else{
        $msg = 'try again !' ;
    }
}else{
    $msg = 'Access deniad !' ;
}

echo $msg ;

echo '<a href="index.php">index</a>' ;