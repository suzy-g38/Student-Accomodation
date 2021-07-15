<?php
$data = file_get_contents("../Database/room-data.json");
  $json = json_decode($data, true);
    if(isset($_POST["update-btn"])){
      $room_id = $_POST["update_room_id"];
      foreach ($json as $item) {
        if($json[$room_id-1]["room_id"]==$room_id){
        $json[$room_id-1]["room_type"] = $_POST["update_room_type"];
        $json[$room_id-1]["room_location"] = $_POST["update_room_location"];
        $json[$room_id-1]["room_charge"] = $_POST["update_room_charge"];
      }  }
        $json = json_encode($json);
        file_put_contents('../Database/room-data.json', $json);
      }
      header("Location: ../Admin-Home.php");
    ?>
