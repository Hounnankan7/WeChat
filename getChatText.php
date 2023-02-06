<?php

include_once('config.php');
$resultat = mysqli_query($database_connect, "SELECT * FROM chat_table");

while($row = mysqli_fetch_assoc($resultat)){

    echo $row['chat_person_name']." : ".$row['chat_value']."<br>";

}

?>