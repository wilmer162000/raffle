<?php
session_start();
require("connect.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div.card{
            width: 500px;
            margin: 10px auto;
            border: 5px Dotted white;
            padding: 30px;
            text-align: center;
            background-color: red;
            border-radius: 25px;
        }
        body{
            background-color: whitesmoke;
        }
        h1{
            color: whitesmoke;
        }
        input.check{
            width: 218px;
            font-weight: bolder;
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <div class="card">
            <form action="process.php" method="POST">
                <h1>
                    <?php
                    if(isset($_SESSION['message']) && $_SESSION['message'] === 'Success') {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </h1>
                <h1>Enter your Number</h1><br>
                <input type="text" name="contact">
                <input type="submit">
            </form>
            <form action="succes.php">
            <input type="submit" value="Check the list" class="check">
            </form>
        </div>
    </div>
</body>
</html>
