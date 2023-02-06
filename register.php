<?php

require_once('config.php');
$name=$_POST['name'];
$user_email=$_POST['email'];
$user_password =md5($_POST['pass1']); //md5() pour chiffrer les éléments a l'entrer dans la DB

$result = mysqli_query($database_connect, "INSERT INTO users_table (user_id, user_name, user_pswd, user_email, user_status
) VALUES (NULL, '$name', '$user_password', '$user_email', '0');");

if($result){
    header('location: index.php?registration_successfull=<span style="color:green;">You have registered successfull.Please login to continue</span>');
}
else{
    echo "Registration fail";
}

?>