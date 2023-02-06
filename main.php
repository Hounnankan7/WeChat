<?php
session_start();
?>

<?php

    //Verify que la personne est bien connecter et si les infos à entrer ne sont pas nulles
    if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && empty($_SESSION['email']) && empty($_SESSION['password'])){
        header('location: index.php');
    }

?>

<script>
    function getText(){
        var message = document.getElementById('text').value;
        document.getElementById('text').value = "";
        xhr = new XMLHttpRequest();
        xhr.open('POST', 'sendToChat.php', true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send('chat='+message);
        xhr.onreadystatechange = function(){
            if(xhr.responseText){

            }
        }
    }

    function setText(){
        xhr = new XMLHttpRequest();
        xhr.open('POST', 'getChatText.php', true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send();
        xhr.onreadystatechange = function(){
            //display all messages
            document.getElementById('chat_area').innerHTML = xhr.responseText;
            //scroll to the last message
            document.getElementById('chat_area').scrollTop = document.getElementById('chat_area').scrollHeight;
        }
    }
    
    //appel continue de la fonction d'affichage des messages
    setInterval("setText()", 2000);


    function getUsers(){
        xhr1 = new XMLHttpRequest();
        xhr1.open('POST', 'getUsers.php', true);
        xhr1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr1.send();
        xhr1.onreadystatechange = function (){
            document.getElementById('loggedInUsers').innerHTML = xhr1.responseText;
        }
    }

    //appel continue de la fonction d'affichage des users
    setInterval("getUsers()", 3000);

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeChat</title>

    <!-- Telechargement de bootstrap et bootstrap icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WeChat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="main.php">Chat Room</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>


    <div id="chatbox" class="container">
        <h2 class="text-center">WeApp</h2>

        <div class="media" style="background-color: whitesmoke; padding:10px; height:120px;">
            <img src="images/chat-left-text-fill.svg" alt="WeChat Icon" class="rounded-circled" style="float:left;" width="60" height="60"/>
            <div class="media-body">
                <h5 style="margin: 10px;">Chat</h5>
            </div>
            <form method="GET" action="" class="mt-2 mr-2">
                <input type="submit" class="btn btn-danger mt-2" value="Logout" name="logout" style="float: right;">
            </form> 
        </div>

        <div id="chat_area" class="container border overflow-auto" style="width: 75%; float:left; height:500px;">

        </div>

        <div class="container border overflow-auto" style="margin: 10px; margin-top: 0px; display:inline-block; width: 20%; height:500px;">
            <p>Chat Participants :</p>
            <div id="loggedInUsers">

            </div>
        </div>

        <div class="input-group" style="width: 75%; clear:both; margin-bottom: 40px;">
            <input type="text" name="" id="text" class="form-control"/>
            <div class="input-group-append">
                <button id="sendBtn" class="btn btn-primary" type="button" onclick="getText()">Send</button>
            </div>  
        </div>

    </div>

    
    <!-- Telechargement de bootstrap pour fonctionnalité en plus -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php

    //Pour détruire la session en cas de déconnexion et changer le status de l'individu en offline et rediriger vers la page index
    include_once('config.php');
    if(isset($_GET['logout'])){
        $result = mysqli_query($database_connect, "UPDATE users_table SET user_status = '0' WHERE user_email = '$_SESSION[email]'");
        session_destroy();
        header('location: index.php?loggedout_successfully');
    }

?>