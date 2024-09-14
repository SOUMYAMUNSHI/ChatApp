<?php
include("./conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <div class="userList">
        <?php
        $userName = "SoumyaMunshi";
        $sql = "SELECT * FROM `userlist` WHERE `userId` != '$userName'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<li class="users"><a href="#"> ' . $row["userName"] . ' </a></li>';
        }
        ?>
    </div>
</body>

</html>