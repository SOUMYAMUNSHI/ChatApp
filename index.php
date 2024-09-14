<?php
include("./static/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="./styleSheet.css" />
  <style>
    .user:hover {
      background-color: #f4f6f6;
      border-radius: 5px;
    }
  </style>
  <title>Chat App</title>
</head>

<body>
  <div class="main-div">
    <!--Main div here-->

    <div class="User-list">
      <!--User List div here-->
      <div class="search-bar">
        <span>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </span>
      </div>
      <div class="user-container"> <!--Div to show user-->
        <?php //php code to view user from chatList
        $sql = "SELECT * FROM `userlist`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="user container" style="cursor:pointer;" id="<?php echo $row["userSl"] ?>">
            <div class="user-info">
              <div class="image-container">
                <img class="user-icon" src="./pic/images.png" alt="user-icon" />
              </div>
              <div class="user-details">
                <div class="user-name"><b><?php echo $row["userName"] ?></b></div>
                <div class="user-status">
                  <label class="ststus-symbol"></label><label class="status-details">Active</label>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

    <div class="user-chat">
      <!--chat div here-->
      <span class="chat-user-info">
        <img class="user-icon" src="./pic/images.png" alt="user-icon" />
        <div class="sender-user-details">
          <div class="user-name">Mr X</div>
          <div class="user-last-active">2 mints ago</div>
        </div>
      </span>
      <div class="show-message"> <!--Messages-->
        <?php
        $sender = "MrX";
        $receiver = "SoumyaMunshi";

        $shatSl = "SELECT * FROM `chat` WHERE `senderId` = '$sender' OR `senderId` = '$receiver' ORDER BY `sl`";
        $shatResult = mysqli_query($conn, $shatSl);

        while ($row = mysqli_fetch_assoc($shatResult)) {
          if ($row["senderId"] == $receiver) {
        ?>

            <span class="receiver-message" id="<?php echo $row["sl"] ?>"> <!--Reciever Messages-->
              <label class="receiver-time">12.30 pm</label>
              <p class="reciver-msg message"><?php echo $row["message"] ?></p>
            </span><!--Reciever Messages End-->
          <?php
          } else {
          ?>
            <span class="sender-message" id="<?php echo $row["sl"] ?>"> <!--Sender Messages-->
              <label class="sender-time">12.30 pm</label>
              <p class="sender-msg message"><?php echo $row["message"] ?></p>
            </span><!--Sender Messages End-->
        <?php
          }
        }
        ?>

      </div>
      <div class="write-message container">
        <div class="input-group flex-nowrap">
          <input
            type="text"
            class="form-control"
            placeholder="Enter text here....."
            aria-label="Username"
            aria-describedby="addon-wrapping" />
          <span class="input-group-text" id="addon-wrapping"><i class="bi bi-send-fill"></i></span>
        </div>
      </div>
    </div>
  </div>
</body>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

</html>