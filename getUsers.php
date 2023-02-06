<?php

include_once('config.php');

$result = mysqli_query($database_connect, "SELECT * FROM users_table");

while($row=mysqli_fetch_assoc($result)){
    if($row['user_status'] == 1){
        echo "<div style='color:green'>".$row['user_name']." (Online)"."</div>";
    }
    else{
        echo "<div style='color:red'>".$row['user_name']." (Offline)"."</div>";
    }
}

?>