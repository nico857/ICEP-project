 <?php

      if (isset($_GET['date'])) {
          $date = $_GET['date'];

      }

            if (isset($_POST['submit'])) {


              $email = $_POST['email'];
              $conn= new mysqli('localhost','root','','patientdatabase');


              $sql = "SELECT * FROM bookings WHERE email = '".$_POST["email"]."'";

              $result = $conn->query($sql);

                  if ($result->num_rows > 0) {

                    echo "Sorry, user is already in the database!";

                  }else{

                        $sql = "INSERT INTO bookings(name,email,date) VALUES('".$_POST["name"]."','".$_POST["email"]."','".$_GET["date"]."')";

                        if ($conn->query($sql) === TRUE) {

                            echo"You have sucessfully booked your appointment!";

                        }
                        else {

                            echo"Sorry, something went wrong";

                        }

                        $conn->close();

                  }

            }

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration,$cleanup,$start,$end){

  $start = new DateTime($start);
  $end = new DateTime($end);
  $interval = new DateInterval("PT".$duration."M");
  $cleanupInterval = new DateInterval("PT".$cleanup."M");
  $slots = array();

  for ($intStart=$start; $intStart < $end;$intStart->add($interval)->add($cleanupInterval)) {

      $endPeriod = clone $intStart;
      $endPeriod->add($interval);

        if ($endPeriod>$end) {

            break;

        }

        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");

  }

  return $slots;

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>bookings</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https//maxcdn.bootstrapcdn.com/bootstrap.3.3.7/css/bootstrap.min.css"
   integrit="sha384-BVYiiSlFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
   crossorigin="anonymous">

   <link rel="stylesheet" href="booking.css">
  </head>

  <body>
    <div class="container">
      <h1 class="text-center">Booking date: <?php echo date(' d F Y',strtotime($date));?></h1><hr>

        <div class="row">
          <?php $timeslots = timeslots($duration,$cleanup,$start,$end);
            foreach($timeslots as $ts){
            ?>
            <div class= "col-md-2">
              <div class="form-group">
              <button class="btn btn-success"><?php echo $ts;?></button>
          </div>
        </div>
          <?php } ?>
        </div>
    </div>

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!--Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking: <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
            <div class="col-md-12">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Timeslot</label>
                  <input type="text" readonly name="timeslot" id="timeslot" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" readonly name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" readonly name="name" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
        </div>
      </div>

        </header>


    <script>
      $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
      })
    </script>

        <script scr="https://ajax.goggleapis.com/ajax/libs/jquery/1.12.4/query.min.js"></script>
        <script scr="https://maxch.bootstrapcdn.com/bootstrap/3.3.7/js" integrity="sha384-Tc5lQib027qvyjSMfHjOMaLkfWVxZxPnCJA7l2mCWNipG9mGCD8wGNicPD7xa"
        crossorigin="anonymous"></script>

</body>
</html>
