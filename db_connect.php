<?php
    $server="localhost";
    $user="root";
    $password="";
    $database="chatbot_system";
    $connect=mysqli_connect($server,$user,$password,$database);
    $name="hemanth";
    if($connect)
    {
        // echo "Connection sucessfull";
    }
    else
    {
        echo "Connection Error";
    }
?>