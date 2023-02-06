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


    <form class="container" id="registration_form" method="POST" action="register.php" style="display: none;">
        <h1>New Registration</h1>

        <!--Message to display on success-->
        <?php
            if(isset($_GET['registration_successfull'])){?>
            <?php echo $_GET['registration_successfull'];?>
        <?php }?>

        <div class="mb-3">
            <label class="form_label">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label class="form_label">Email Adress</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label class="form_label">Password</label>
            <input class="form-control" type="password" name="pass1" id="pass1" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label class="form_label">Confirm Password</label>
            <input class="form-control" type="password" name="pass2" id="pass2" placeholder="Confirm Password" required>
        </div>

        <div class="mb-3">
            <div id="cnfrmpass"></div>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary mb-3" type="submit" name="sbt">Submit</button>
            <button class="btn btn-success mb-3" onclick="document.getElementById('login_form').style.display=''; document.getElementById('registration_form').style.display='none'">Log In</button>
        </div>
    </form>


    <form class="container" id="login_form" method="POST" action="login.php">
        <h1>Log In</h1>
        <!--Message to display on success-->
        <?php
            if(isset($_GET['login_error'])){?>
            <?php echo $_GET['login_error'];?>
        <?php }?>

        <div class="mb-3">
            <label class="form_label">Email Adress</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label class="form_label">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary mb-3" type="submit" name="loginbtn">Login</button>
            <button class="btn btn-success mb-3" onclick="document.getElementById('login_form').style.display='none'; document.getElementById('registration_form').style.display=''" >Register</button>
        </div>
    </form>
    
    <!-- Telechargement de bootstrap pour fonctionnalité en plus -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>