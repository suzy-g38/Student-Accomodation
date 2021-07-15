<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <title>Student Accomodation</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="favicon.ico?char=<?php if(isset($_POST['char'])) { echo $_POST['char']; } ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" integrity="sha384-3Nqiqht3ZZEO8FKj7GR1upiI385J92VwWNLj+FqHxtLYxd9l+WYpeqSOrLh0T12c" crossorigin="anonymous"></script>
</head>
<body class="student-heading-section" id="student-title">

<section>
  <div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
   <a class="navbar-brand icon" href="Student-Home.php">Acomo</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
     <ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link admin-create-room checkin-all" href="#">Check In</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="Index.php">Logout</a>
         </li>
     </ul>
    </div>
  </nav>
  </section>
  </div>
  <div class="all-table">
    <div class="table-responsive student-table">
     <table class="table table-dark table-hover">
     <tr>
     <th>Room ID</th>
     <th>Room Type</th>
     <th>Room Location</th>
     <th>Room Charge</th>
     <th>Check Out</th>
     </tr>
     <?php
       $data = file_get_contents("Database/room-data.json");
       $data = json_decode($data, true);
                     $index=0;
                     foreach($data as $row){
                       if($row["room_status"]=="available"){
    ?>
      <tr>
           <td><?php echo $row["room_id"]?></td>
           <td><?php echo $row["room_type"]?></td>
           <td><?php echo $row["room_location"]?></td>
           <td><?php echo $row["room_charge"]?></td>

          <td><a class="btn btn-outline-warning check-in-btn" name="button" href="resource/update.php?id=<?php echo $index ?>">Check In</a></td>

          </tr>
          <?php
          $index++;
        }}
          ?>


   </table>
  </div>
  </div>

        <script type="text/javascript">
        $(".checkin-all").click(function(){
          //$(".all-table").hide();
          //$("#accomo-table").show();
          window.location="Student-CheckIn.php";
        });
        </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="javascript/Admin-Home.js" charset="utf-8"></script>

   </body>
   </html>
