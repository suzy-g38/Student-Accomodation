<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <title>Student Accomodation</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="favicon.ico?char=<?php if(isset($_POST['char'])) { echo $_POST['char']; } ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" integrity="sha384-3Nqiqht3ZZEO8FKj7GR1upiI385J92VwWNLj+FqHxtLYxd9l+WYpeqSOrLh0T12c" crossorigin="anonymous"></script>
</head>
<body class="admin-heading-section" id="admin-title">

    <!-- Nav Bar -->
    <section>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
       <a class="navbar-brand icon" href="Admin-Home.php">Acomo</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link admin-create-room" href="#">Create</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" href="Index.php">Logout</a>
             </li>
         </ul>
        </div>
     </nav>
     <div class="box hideform">
     </div>

       <div class="create-room hideform">
         <button class="btn btn-light admin-close">X</button>
         <form class="form-body create-room-form" action="resource/admin.php" method="post">
           <div class="form-group ">
             <p class="create-room-para">CREATE ROOM</p>
             <input type="number" name="room_id" class="form-control" id="room-id" placeholder="Room ID">
           </div>
           <div class="form-group">
             <input type="text" name="room_type" class="form-control" id="room-type" placeholder="Room Type">
           </div>
           <div class="form-group">
             <input type="text" name="room_location" class="form-control" id="room-location" placeholder="Room Location">
           </div>
           <div class="form-group">
             <input type="number" name="room_charge" class="form-control" id="room-charge" placeholder="Room Charge">
           </div>
           <div class="form-group">
           <button type="submit" id="create-room" class="btn btn-outline-dark create-admin-home">Create</button>
           </div>
         </form>



       </div>
       <div class="table-responsive admin-table">
        <table class="table table-dark table-hover">
          <tr>

          <th class="admin-th">Room ID</th>
          <th class="admin-th">Room Type</th>
          <th class="admin-th">Room Location</th>
          <th class="admin-th">Room Charge</th>
          <th class="admin-th">Room Status</th>
          <th class="admin-th">Payment Status</th>
          <th class="admin-th">Update</th>
          <th class="admin-th">Delete</th>

        </tr>

        <?php
          $data = file_get_contents("Database/room-data.json");
          $data = json_decode($data, true);
            $index=0;
            foreach($data as $row){
            ?>
                        <tr>
              <td><?php echo $row["room_id"]?></td>
              <td><?php echo $row["room_type"]?></td>
              <td><?php echo $row["room_location"]?></td>
              <td><?php echo $row["room_charge"]?></td>
              <td><?php echo $row["room_status"]?></td>
              <td><?php echo $row["payment_status"]?></td>

              <div class="update-room hideform">
                <button class="btn btn-light admin-close">X</button>
                <form class="form-body update-room-form" action="resource/update-table.php" method="post">
                  <div class="form-group ">
                    <p class="update-room-para">UPDATE ROOM</p>
                    <input type="number" name="update_room_id" class="form-control" id="update_room_id" placeholder="Room ID">
                  </div>
                  <div class="form-group">
                    <input type="text" name="update_room_type" class="form-control" id="update_room_type" placeholder="Room Type">
                  </div>
                  <div class="form-group">
                    <input type="text" name="update_room_location" class="form-control" id="update_room_location" placeholder="Room Location">
                  </div>
                  <div class="form-group">
                    <input type="number" name="update_room_charge" class="form-control" id="update_room_charge" placeholder="Room Charge">
                  </div>
                  <div class="form-group">
                  <button type="submit" name="update-btn" class="btn btn-outline-dark ">Update</button>
                  </div>
                </form>

              </div>
              <td><a class="btn btn-outline-warning update" href="#">Update</a></td>


              <td><a class="btn btn-outline-warning" href="resource/delete.php?id=<?php echo $index?>">Delete</a></td>
                        </tr>
                    <?php
                        $index++;
                      }
                    ?>

      </table>

      </div>

     <div>
       <?php
       //$data = file_get_contents("Database/room-data.json");
         //$json = json_decode($data, true);
           //if(isset($_POST["update-btn"])){
             //$room_id = $_POST["update_room_id"];
             //foreach ($json as $item) {
               //if($json[$room_id-1]["room_id"]==$room_id){
               //$json[$room_id-1]["room_type"] = $_POST["update_room_type"];
               //$json[$room_id-1]["room_location"] = $_POST["update_room_location"];
               //$json[$room_id-1]["room_charge"] = $_POST["update_room_charge"];
            // }  }
            //   $json = json_encode($json);
            //   file_put_contents('Database/room-data.json', $json);
             //}
           ?>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <script src="javascript/Admin-Home.js" charset="utf-8"></script>

</body>
</html>
