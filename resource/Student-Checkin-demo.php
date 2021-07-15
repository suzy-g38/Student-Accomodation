<?php require "Student-CheckIn.php"; ?>
<?php
$id=$_GET["id"];
$data = file_get_contents('Database/room-data.json');
$json = json_decode($data);
$room_detail = $json[$id];
$room_detail->room_status = "unavailable";
$json = json_encode($json);
file_put_contents('Database/room-data.json', $json);

if(file_exists("Database/accomodation-details.json")){
  $current_data = file_get_contents('Database/accomodation-details.json');
  $array_data = json_decode($current_data, true);
  $extra = array(
       'room_id'  =>  $room_detail->room_id,
       'room_type'  =>  $room_detail->room_type,
       'room_location'  =>  $room_detail->room_location,
       'room_charge'  =>  $room_detail->room_charge,
  );
  $array_data[] = $extra;
  $final_data = json_encode($array_data);
  file_put_contents('Database/accomodation-details.json', $final_data);
}
header('Location: ../Student-Home.php');
            ?>
