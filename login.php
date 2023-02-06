<?php
session_start();

include_once('config.php');

$user_email = $_POST['email'];
$user_password = md5($_POST['password']);

$result = mysqli_query($database_connect, "SELECT * FROM users_table WHERE user_email='$user_email' AND user_pswd='$user_password'");

while($row=mysqli_fetch_assoc($result)){
    $name = $row['user_name'];
}

if (mysqli_num_rows($result)>0) {
    echo "Sucess";
    $_SESSION['email']=$user_email;
    $_SESSION['password']=$user_password;
    $_SESSION['name']=$name;

    //When the user login and change status to ONLINE: 0 offline 1:online
    $query = mysqli_query($database_connect, "UPDATE users_table SET user_status='1' WHERE user_email='$user_email'");

    header('location: main.php');
}else{
    echo "Make sure you enter the right identification";
    header('location: index.php?login_error=<span style="color:red;">Email or Password incorrect</span>');

}

?>