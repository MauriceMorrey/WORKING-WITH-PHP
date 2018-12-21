
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href=""> <!--gets rid of favicon error -->
    <title>TIME-OFF RECORDS TABLE</title>
  </head>
  <body>
    <table class="table table-hover table-dark">
      <thead class="btn-success">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Store</th>
          <th scope="col">Leave Start Date</th>
          <th scope="col">Leave End Date</th>
          <th scope="col">Reason</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mark Otto</td>
          <td>mark@otto.com</td>
          <td>Green streets meats</td>
          <td>2018-12-24</td>
          <td>2019-01-05</td>
          <td>Holiday travel</td>
        </tr>

        <tr>
          <td>John Doe</td>
          <td>john@doe.com</td>
          <td>Au Cheval</td>
          <td>2019-01-01</td>
          <td>2019-01-06</td>
          <td>Honeymoon</td>
        </tr>
        <?php
        require "access_data.php";

        $query = "SELECT * FROM employeesLeaveRequest";
        $conresult = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($conresult)) {
          $Firstname = $row["firstname"];
          $Lastname = $row["lastname"];
          $Email = $row["email"];
          $Store_location = $row["store_location"];
          $Leave_start = $row["leave_start"];
          $Leave_end = $row["leave_end"];
          $Reason = $row["reason"];

          echo "
          <tr>
            <td>$Firstname  $Lastname</td>
            <td>$Email</td>
            <td>$Store_location</td>
            <td>$Leave_start</td>
            <td>$Leave_end</td>
            <td>$Reason</td>
          </tr>
          ";
        }
        ?>
      </tbody>
    </table>
  </body>
</html>
