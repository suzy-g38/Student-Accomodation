<?php
$id = $_GET['id'];
 $data = file_get_contents('../Database/room-data.json');
  $json = json_decode($data);

   unset($json[$id]);
    $json = json_encode($json);
     file_put_contents('../Database/room-data.json', $json);

  header('location: ../Admin-Home.php');

 ?>
