<?php

session_start();

include_once('config.php');

if(isset($_POST['chat'])){

    $result = mysqli_query($database_connect, "INSERT INTO chat_table (chat_id, chat_person_name, chat_value, chat_time) 
                                                VALUES (NULL, '$_SESSION[name]', '$_POST[chat]', NOW() );");

}

?>