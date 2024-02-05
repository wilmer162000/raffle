<?php
session_start();
require("connect.php");

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $_SESSION['dump'] = 'Connection success';
}

// Fetch all contacts from the database
$query = "SELECT * FROM people.contacts";
$result = mysqli_query($connection, $query);

// Check if there are any contacts
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <style>
        table {
            width: 600px;
            margin-top: 20px;
            text-align: center;
            outline: 1px solid black;
            background-color: whitesmoke;
            background-color: red;
            border-radius: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            outline: 1px solid black;
            border-radius: 20px;
            background-color: whitesmoke;
        }
        body{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <div>
        <div class="frame">
            <h1>Contact List</h1>
            <form action="index.php">
            <input type="submit" value="submit new">
            </form>
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr><th>Contact Number</th><th>Submission Datetime</th></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['contact_number'] . '</td>';
                    echo '<td>' . $row['submission_datetime'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No contacts found.';
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
