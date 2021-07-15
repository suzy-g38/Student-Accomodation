<?php
if($_POST){
  if(file_exists("../Database/room-data.json")){
    $current_data = file_get_contents('../Database/room-data.json');
    $array_data = json_decode($current_data, true);
    $extra = array(
         'room_id'  =>  $_POST['room_id'],
         'room_type'  =>  $_POST['room_type'],
         'room_location'  =>  $_POST['room_location'],
         'room_charge'  =>  $_POST['room_charge'],
         'room_status'  =>  "available",
         'payment_status'  =>  "not paid",
    );
    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    file_put_contents('../Database/room-data.json', $final_data);
    header('Location: ../Admin-Home.php');
}
}

?>
