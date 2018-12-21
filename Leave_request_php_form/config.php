
<?php
$host = "localhost";
$username = "user1";
$password = "securepassword";
$db_name = "dbtest1";
 
// Create database connection

// #procedural
// # the ampersand(@) suppresses the PHP error message

@ $con = mysqli_connect("$host", "$username", "$password", "$db_name");
//check for connection errors
if (!$con) {
    echo "Sorry, there was a problem connecting";
    exit;
}
// not necessary but just in case you're working in a high-volume environment with lots of customers accesing your web application.
mysqli_close(close);

// # Object-oriented 
// # the ampersand(@) suppresses the PHP error message

// @ $con = new mysqli("$host", "$username", "$password", "$db_name");
// //check for connection errors

// if (!$db){
//     echo "Sorry, there was a problem connecting";
//     exit;    
// }
// // not necessary but just in case you're working in a high-volume environment with lots of customers accesing your web application.
// $db->close();
 
?>