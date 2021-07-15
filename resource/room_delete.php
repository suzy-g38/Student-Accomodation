<?php
$room_id = $_GET['room_id'];

$room_data = file_get_contents('../Database/accomodation-details.json');
$room_json = json_decode($room_data);
$data = file_get_contents('../Database/room-data.json');
$data = json_decode($data);
//print_r($room_json);
//foreach ($room_json as $k) {
//echo $room_json[0]->room_id;
//}
//echo "string";

//echo "string";
foreach ($data as $item) {
  if($room_json[0]->room_id == $item->room_id){
    $item->room_status = "available";
    //unset($item->st_email);
  }
  //$result_array = array_diff($room_json,$item);

  //if(empty($result_array[0])){
        //echo "they are same";
    }
$json = json_encode($data);
file_put_contents('../Database/room-data.json', $json);

//foreach ($data as $row) {
  //foreach ($room_data as $item) {
    //if($row["room_id"] == $item["room_id"] || $row["room_type"] == $item["room_type"] || $row["room_location"] == $item["room_location"] || $row["room_charge"] == $item["room_charge"]){
      //echo "string";
    //}
  //}

//}
unset($room_json[$room_id]);
$room_json = json_encode($room_json);
file_put_contents('../Database/accomodation-details.json', $room_json);



header('Location: ../Student-Home.php');


 ?>
