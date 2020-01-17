<?php

  $conn = mysqli_connect('localhost','root','','patientdatabase');

    if (isset($_POST['sign-in_btn'])) {

          $sql = "SELECT * FROM patients WHERE email_address = '".$_POST["email_address"]."' AND password = '".$_POST["password"]."'";

          $result = $conn->query($sql);

        if ($result->num_rows > 0) {

                if ($result === TRUE) {

                  echo "Your login is successful";
                  header("location: dashboard_insert.php");

                }
                else {

                    echo "Your email exists in our database, but your password is invalid";

                    header("location:dashboard_insert.php");

                }

        }
        else {

            echo "Sorry your email doesn't exist in our database";
            header("location: index.html");

        }

          $conn->close();

      }

 ?>
