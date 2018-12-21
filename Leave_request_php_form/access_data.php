<!-- ASSUMPTIONS
## Respective tables have already been created.
-->
<?php 
require "config.php";
if((isset($_POST["firstname"]) && $_POST["firstname"] !="") && (isset($_POST["lastname"]) && $_POST["lastname"] !="") && (isset($_POST["email"]) && $_POST["email"] !="") && (isset($_POST["store_location"]) && $_POST["store_location"] !="") && (isset($_POST["leave_start"]) && $_POST["leave_start"] !="") && (isset($_POST["leave_end"]) && $_POST["leave_end"] !="") && (isset($_POST["leave_duration"]) && $_POST["leave_duration"] !="") && (isset($_POST["reason"]) && $_POST["reason"] !=""))
{
 require "leave_request.php";

 // real_escape_string eascapes special characters in a string to make them safe to use in an SQL query
$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
$lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$store_location = mysqli_real_escape_string($con, $_POST["store_location"]);
$leave_start = mysqli_real_escape_string($con, $_POST["leave_start"]);
$leave_end = mysqli_real_escape_string($con, $_POST["leave_end"]);
$leave_duration = mysqli_real_escape_string($con, $_POST["leave_duration"]);
$reason = mysqli_real_escape_string($con, $_POST["reason"]);

// using the prepared statement helps filter out malicious data as well as speed up executing multiple INSERT statements on the server.

$query = "INSERT INTO employeesLeaveRequest VALUES(?,?,?,?,?,?,?,?)";
$constmt = mysqli_prepare($con, $query);

// mysqli_stmt_bind_param binds the parameters to the SQL query and tells the database what the parameters are. The "sss" argument lists the types of data that the parameters are. The s character tells mysql that the parameter is a string.
// Telling mysql what type of data to expect minimizes the risk of SQL injections.

mysqli_stmt_bind_param($constmt, "ssssssss", $firstname, $lastname, $email, $store_location, $leave_start, $leave_end, $leave_duration, $reason);

// Execute prepared statement
mysql_bind_execute($constmt);

// echo "New records created successfully";
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($constmt));

// Close statement
mysqli_stmt_close($constmt);

}
else
{
echo "Please fill out all required information.";
}
?>