

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./views/assets/css/style.css">
</head>
<body>
    <header>
        
        <div class="log_url">
            <h2>Auto-Ecole</h2>
            <ul>
                <li>
                <li><a href="index.php">Home</a></li>
                <ul class="menu">
                    <li class="hover-trigger">
                        <a href="#">Register|Login</a>
                        <ul class="sub-menu">
                            <li><a href="./add_user.php">Register</a></li>
                            <li><a href="./login.php">Login</a></li>
                        </ul>

                    </li>
                </ul>
                 <form action="./views/traitement/action.php" method="post">
                    <button name="logout" class="logout">Logout</button>
                </form> 
                </li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>
        </div>
        

    </header>