<!DOCTYPE HTML>  
<html>
<head>
  <style>.error {color: #FF0000;}</style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href=""> <!--gets rid of favicon error -->
  <title>Hogsalt Leave Request Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="app.js"></script>
</head>
<body>  

<?php
// define variables and set to empty values
$firstnameErr =$lastnameErr = $emailErr = $dateErr = $durationErr = $locationErr = $genderErr = $websiteErr = "";
$firstname = $lastname = $email = $leavestart = $leaveEnd = $leaveduration = $storelocation = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstNameErr = "First name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstNameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["lastname"])) {
    $lastNameErr = "Last name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastNameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["leavestart"])) {
    $dateErr = "Start date is required";
  } else {
    $leavestart = test_input($_POST["leavestart"]);
    // check for date validity format
    if (!DateTime::createFromFormat('Y-m-d', $leavestart)->format('Y-m-d') === $leavestart) {
      $dateErr = "Invalid leave start date format"; 
    }
  }

  if (empty($_POST["leaveEnd"])) {
    $dateErr = "End date is required";
  } else {
    $leaveEnd = test_input($_POST["leaveEnd"]);
    // check for date validity format
    if (!DateTime::createFromFormat('Y-m-d', $leaveEnd)->format('Y-m-d') === $leaveEnd) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["leaveduration"])) {
    $durationErr = "Leave duration is required";
  } else {
    $leaveduration = test_input($_POST["leaveduration"]);
    // check for date validity format
    if (!DateTime::createFromFormat('Y-m-d', $leaveduration)->format('Y-m-d') === $leaveduration) {
      $durationErr = "Invalid date format"; 
    }
  }

  if (empty($_POST["storelocation"])) {
    $locationErr = "Store location is required";
  } else {
    $storelocation = test_input($_POST["storelocation"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$storelocation)) {
      $locationErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- <p><span class="error">* required field</span></p> -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<div class="container">
  <h2>PHP Form Validation Example</h2>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <span class="error">* <?php echo $firstNameErr;?></span>
        <label for="form_firstname">Firstname *</label>
        <input id="form_firstname" type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <span class="error">* <?php echo $lastNameErr;?></span>
        <label for="form_lastname">Lastname *</label>
        <input id="form_lastname" type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
  
  <div class="row">

    <div class="col-md-6">
        <div class="form-group">
          <span class="error">* <?php echo $emailErr;?></span>
          <label for="form_email">Email *</label>
          <input id="form_email" type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Please enter your email *" required="required" data-error="Email is required.">
          <div class="help-block with-errors"></div>
        </div>
    </div>
  
    <div class="col-md-6">
      <div class="form-group">
          <span class="error"><?php echo $websiteErr;?></span>
          <label for="form_website">Website *</label>
          <input id="form_website" type="text" name="website" value="<?php echo $website;?>" class="form-control" placeholder="Please enter your website *" required="required" data-error="Website is required.">
          <div class="help-block with-errors"></div>
        </div>
    </div>
  </div>

  <div class="row" id="dates">

    <div class="col-md-6">
        <div class="form-group">
          <span class="error">* <?php echo $dateErr;?></span>
          <label for="form_leavestart">Leave start date *</label>
          <input id="form_leavestart" type="date" name="leavestart" value="<?php echo $leavestart;?>" class="form-control" placeholder="Please enter your leave start date *" required="required" data-error="Leave start date is required.">
          <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <span class="error"><?php echo $dateErr;?></span>
          <label for="form_leaveEnd">Leave end date *</label>
          <input id="form_leaveEnd" type="date" name="leaveEnd" value="<?php echo $leaveEnd;?>" class="form-control" placeholder="Please enter your leave end date *" required="required" data-error="Leave end date is required.">
          <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="col-md-12">
      <span class="error">* <?php echo $durationErr;?></span>
      <label for="form_leaveDuration">Leave duration *</label>
      <div class="form-group" id="leaveDuration" name ="leaveduration" value="<?php echo $leaveduration;?>" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <i class="fa fa-caret-down"></i>
      </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <span class="error">* <?php echo $locationErr;?></span>
          <label for="form_store_location">Employee store location *</label>
          <select id="form_store_location" name="storelocation" class="form-control" value="<?php echo $storelocation;?>" required="required" data-error="Please specify your store location.">
          </select>
          <div class="help-block with-errors"></div>
        </div>
      </div>
  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="form-group">
        <label for="form_comment">Reason for requesting time off: </label>
        <textarea id="form_comment" type="text" name="comment" value="<?php echo $comment;?>" class="form-control" placeholder="Please enter your reason for requesting time off " rows="2"></textarea>
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-12">

      <div class="form-group">
        <span class="error">* <?php echo $genderErr;?></span>
        <label for="form_gender" >Gender * </label>
        <div id="radio_inputs">
          <input type="radio" name="gender" class="radio-inline" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
          <input type="radio" name="gender" class="radio-inline" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
          <input type="radio" name="gender" class="radio-inline" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-12">
      <input type="submit" class="btn btn-lg btn-primary btn-send btn-block" value="Submit">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <p class="text-muted">
      <strong class="error">*</strong> These fields are required.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div id="output">
        <?php
          echo "<h2>Your Input:</h2>";
          echo $firstname;
          echo "<br>";
          echo $lastname;
          echo "<br>";
          echo $email;
          echo "<br>";
          echo $leavestart;
          echo "<br>";
          echo $leaveEnd;
          echo "<br>";
          echo $leaveduration;
          echo "<br>";
          echo $storelocation;
          echo "<br>";
          echo $website;
          echo "<br>";
          echo $comment;
          echo "<br>";
          echo $gender;
        ?>
      </div>
    </div>
  </div>
</div>
  
</form>


</body>
</html>
<!-- <script src="app.js"></script> -->