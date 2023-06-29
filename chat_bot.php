
<?php

require 'db_connect.php';
session_start();
$user_name=$_SESSION['User_name'];//This user name is used as table namae where chathistory will be stored.


// echo $user_name;
// $sql_create="CREATE TABLE `$user_name`(`slno` INT NOT NULL , `student_message` VARCHAR(50) NOT NULL , `bot_message` VARCHAR(50) NOT NULL , `time` VARCHAR(15) NOT NULL , PRIMARY KEY (`slno`)) ENGINE = InnoDB;";
// $val=mysqli_query($connect,$sql_create);

// $sql_create="CREATE TABLE `$email` (`Hemanth N B` INT NOT NULL , `Hemant` INT NOT NULL ) ENGINE = InnoDB";
//   $val=mysqli_query($connect,$sql_create);

    // $_SESSION['Password']=$pass;

//Get data is used to delete chat history between student and the chat-bot.
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    echo '<script>alert("Closing will clear all conversation")</script>';
    $table_name=strtolower($user_name);
    $sql="TRUNCATE TABLE `$table_name`";
        mysqli_query($connect,$sql);
}

// Receives data from front-end(HTML) to back-end(PHP)
if($_SERVER['REQUEST_METHOD']=='POST')
{
        $dummy='Sorry I was not able to find answer for your request\n Hope you have wonderful Day !!\n';
        $message=$_POST['query'];//Stores input message from the user.
        $msg=strtolower($message);
        $time=$_POST['time'];
       $sql= "SELECT * FROM `interaction` WHERE `questions` LIKE '%$msg%' ";
        $res=mysqli_query($connect,$sql);

        if(mysqli_num_rows($res)==0)
        {
            $table_name=strtolower($user_name);
                $insert1="INSERT INTO `$user_name`(`student_message`,`bot_message`,`time`) VALUES('$msg','$dummy','$time')";
             $insert_res1=mysqli_query($connect,$insert1);   
            }
            else
            {
                $array=mysqli_fetch_assoc($res);
                $bot_message=$array['response'];
                $insert2="INSERT INTO `$user_name`(`student_message`,`bot_message`,`time`) VALUES('$msg','$bot_message','$time')";
                $insert_res2=mysqli_query($connect,$insert2);   
        }
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Work+Sans:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//localhost/Project007/chat-bot_system/chat-bot.css">
    <style>
        #delete_msg {
            font-family: 'Nunito', sans-serif;
            font-size: 17px;
            background-color: #212529;
            color: white;
    border: none;
    margin-top: 8px;
}
.logo1{
    color:white;
}
.nav-item
{
    margin-top:12px;
    }
    .user-message
    {
        font-family: 'Fira Sans Condensed', sans-serif;    }
    .bot-message
    {
        font-family: 'Fira Sans Condensed', sans-serif;    }
    
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://uvce.ac.in/" target="_blank">Home</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                    href="https://uvce.ac.in/about.php" target="_blank">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://uvce.ac.in/contact.php" target="_blank">Contact us</a>
                </li>
                <li class="nav-item">
                
                <!-- To delete chat history -->
                <form action="//localhost/Project007/chat-bot_system/chat_bot.php" method="get">
                        <button  id="delete_msg" name="close">Clear</button>
                </form>

                </li>
            </ul>
        </nav>

    <div class="main-container" id="main">
        <p class="logo1">CHAT-BOT</p>

<!-- To display messages on UI-->        
<?php
$table_name=strtolower($user_name);
$display_sql="SELECT * FROM `$table_name`";
$disply_result=mysqli_query($connect,$display_sql);
if(mysqli_num_rows($disply_result)!=0)
{
    while($display_data=mysqli_fetch_assoc($disply_result))
    {
        $student_message=$display_data['student_message'];
        $bot_message=$display_data['bot_message'];
        $display_time=$display_data['time'];
        echo' <div class="msg-container">
        
        <p class="image-para"><span class="user-image"><svg stroke="currentColor" fill="white" stroke-width="0"
        viewBox="0 0 1024 1024" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
        <path
        d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z">
        </path>
        </svg>
        </span>
        </p>
        
        <div class="user-container">
        <p class="user-message" id="user-message">'.$student_message.'</p>
        <p class="time">'.$display_time.'</p>
        </div>
        
        
        
        <span class="bot-image"><svg stroke="currentColor" fill="white" stroke-width="0" viewBox="0 0 512 512"
        height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
        <path
        d="M260.22 58.28c-33.15 0-60.763 22.89-68 53.782h136c-7.24-30.89-34.85-53.78-68-53.78zM146.06 130.75v194.188H381.22V130.75H146.06zm117.063 24.125c32.075 0 58.28 26.207 58.28 58.28 0 32.075-26.206 58.282-58.28 58.282s-58.28-26.207-58.28-58.28c0-32.076 26.206-58.282 58.28-58.282zm-135.75 40.22c-37.902 8.577-67.593 37.596-77.094 75.124-3.368.833-6.668 2.127-9.81 3.936-18.16 10.452-24.47 33.907-13.97 52.03l16.156-9.342c-5.428-9.37-2.296-21.078 7.125-26.5l.157-.063c9.396-5.302 21.1-2.135 26.5 7.19 5.43 9.374 2.3 21.043-7.124 26.467l9.312 16.188c18.16-10.453 24.466-33.905 13.97-52.03-1.42-2.454-3.09-4.682-4.94-6.69 5.013-20.46 20.205-36.686 39.72-44v-42.31zm272.53 3.25v44.624c13.927 8.56 24.357 22.155 28.345 38.436-1.848 2.007-3.517 4.235-4.938 6.688-10.497 18.126-4.19 41.578 13.97 52.03l9.312-16.187c-9.425-5.424-12.555-17.093-7.125-26.468 5.427-9.375 17.234-12.55 26.655-7.126 9.42 5.422 12.553 17.13 7.125 26.5l16.156 9.344c10.5-18.125 4.19-41.58-13.97-52.032-3.142-1.81-6.442-3.103-9.81-3.937-8.527-33.68-33.33-60.522-65.72-71.876zm-224.28 145.28v33.125c5.605-1.6 11.743-2.5 18.438-2.5 8.152 0 15.475 1.222 22 3.406v-34.03h-40.438zm141.688 0v33.47c6.063-1.826 12.78-2.845 20.187-2.845 7.424 0 14.164 1.085 20.25 3.03v-33.655h-40.438zm-123.25 49.313c-21.565 0-31.638 9.323-38.75 23.375-5.676 11.21-8.255 25.565-9.438 38.718h96.438c-1.052-13.284-3.285-27.65-8.75-38.81-6.833-13.953-16.734-23.283-39.5-23.283zm143.437 0c-22.766 0-32.668 9.33-39.5 23.28-5.466 11.162-7.698 25.528-8.75 38.813h96.438c-1.183-13.152-3.763-27.506-9.438-38.717-7.113-14.052-17.186-23.375-38.75-23.375z">
        </path>
        </svg></span>
        
        <div class="bot-container">
        <p class="bot-message">'.$bot_message.'</p>
        <p class="time">'.$display_time.'</p>
        </div>      
        </div>';
    }
}
?>
        <!-- To thake input fro users I have used HTML forms -->

        <form class="text-input" action="//localhost/Project007/chat-bot_system/chat_bot.php" method="post">
            <input type="text" name="query" id="query" placeholder="write something here..">
            <input type="text" id="hidden" name="time" value="">
            <script>

                var date = new Date();
                var hours = date.getHours();
                var minutes = date.getMinutes();
                hours = hours % 12;
                hours = hours ? hours : 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                let time = hours.toString() + ":" + minutes;
                document.getElementById('hidden').value = time;
                </script>

            <button type="submit" id="submit"><svg stroke="currentColor" fill="white" stroke-width="0" t="1569683742680"
            viewBox="0 0 1024 1024" version="1.1" pId="14019" height="2em" width="2em"
            xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <path
            d="M931.4 498.9L94.9 79.5c-3.4-1.7-7.3-2.1-11-1.2-8.5 2.1-13.8 10.7-11.7 19.3l86.2 352.2c1.3 5.3 5.2 9.6 10.4 11.3l147.7 50.7-147.6 50.7c-5.2 1.8-9.1 6-10.3 11.3L72.2 926.5c-0.9 3.7-0.5 7.6 1.2 10.9 3.9 7.9 13.5 11.1 21.5 7.2l836.5-417c3.1-1.5 5.6-4.1 7.2-7.1 3.9-8 0.7-17.6-7.2-21.6zM170.8 826.3l50.3-205.6 295.2-101.3c2.3-0.8 4.2-2.6 5-5 1.4-4.2-0.8-8.7-5-10.2L221.1 403 171 198.2l628 314.9-628.2 313.2z"
            pId="14020"></path>
        </svg></button>
        </form>


    </div>
    </div>
    </div>
   
        <script>
            var cont=document.getElementById('main');
        cont.scrollTop=cont.scrollHeight;
        </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>

            <script>
               document.getElementById('delete').addEventListener("click",()=>
               {
                   console.log(document.getElementById('user-message').innerText);
                   var msg=document.getElementById('user-message').innerText;
                   window.location=`chat_bot.php?close=${msg}`;
                   
                });
            </script>

</body>

</html>