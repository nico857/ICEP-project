<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New account</title>
  </head>
  <body>
    <link rel="stylesheet" href="registration.css">
    <h1>Register new account</h1>

    <div class "register">

        <form name ="regitration_form" method ="post" action ="insert.php">

            <h2>Please provide all the relevant information below</h2>
              <input type="text" name="firstname" id="name" placeholder="First_name" required ="Don't leave any empty spaces please"><br><br>
              <input type="text" name="lastname" id="name" placeholder="Last_name" required ="required *"><br><br>
              <input type="text" name="age" id="name" placeholder="Age" required ="required *"><br><br>
              <input type="text" name="home_address" id="name" placeholder="Home_address" required ="required *"><br><br>

              Postal code:<select name="postalCode" id="name" placeholder="Postal_code" required ="required *">
                <option>Select postalCode---</option>
                  <option>0118</option>
                  <option>0005</option>
                  <option>0030</option>
                  <option>0006</option>
                  <option>0007</option>
                  <option>0142</option>
                  <option>0080</option>
                  <option>0096</option>
                  <option>0043</option>
                  <option>0009</option>
                  <option>0400</option>
                  <option>0401</option>
                  <option>0201</option>
                  <option>0011</option>
                  <option>0130</option>
                  <option>0086</option>
                  <option>0118</option>

                  </select><br><br>

              <input type="email" name="email_address" id="email" placeholder="E-mail address" required ="required *"><br><br>

              <select id="num">
                <option>+91</option>
                <option>+11</option>
                <option>+01</option>
                <option>+27</option>

              </select><input type="text" name="phone_number" id="number" placeholder="Phone_number" required ="required *"><br><br>

              Gender: <select type="text" name="gender" placeholder="Gender" required ="This field is required"><br><br>
              <option>None</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
              </select><br><br>

              <input type="password" name="passw" id="pswd" placeholder="Password" required ="required *"><br><br>
              <input type="password" name="pass" id="conPswd" placeholder="Confirm password" ><br><br>


              <input type="checkbox" id="check"><span id= "check">I agree to all the terms and conditions.</span><br><br>
              <button type="submit" name="submit_btn" id ="sub_button">Submit</button><br>

        </form>

  </body>
</html>
