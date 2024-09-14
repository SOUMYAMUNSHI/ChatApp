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
    <div class="chat-container">
        <div class="msg Sender">
            <?php
            $senderId = "SoumyaMunshi";
            $receiverId = "MrX";
            $sql = "SELECT * FROM `chat` WHERE (`senderId` = '$senderId' AND `receiverId` = ' $receiverId') OR (`senderId` = '$receiverId' AND `receiverId` = '$senderId')";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row["message"];
            }
            ?>
        </div>
        <div class="msg reciever">
            <li>mag</li>
        </div>
    </div>
</body>

</html>