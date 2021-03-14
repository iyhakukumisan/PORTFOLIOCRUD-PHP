<!DOCTYPE html>
<html>
<head>
<title>CRUD - DASHBOARD</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 
</head>
<body style="height:1000px;">


<?php
    include("../database/connection.php");
    $sql = mysqli_query($con, "SELECT * FROM tbl_info"); //retrieving data in database
	echo "<div class='table-responsive'>";
    echo "<table class='table table-light table-bordered table-sm table-hover'>";
    echo "<thead class='thead-dark'><tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME </th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>ACTION</th>
    </tr></thead>";
    while($row=mysqli_fetch_assoc($sql)){           //displaying all records
        $idd = $row["id"];
        $ffname = $row["fname"];
        $llname = $row["lname"];
        $emaill = $row["email"];
        $connt = $row["contact"];

        echo  "<tbody><tr>   
                <td> " . $idd . "</td>
                <td>" . $ffname . "</td> 
                <td>" . $llname . "</td>
                <td>" . $emaill . "</td>
                <td>" . $connt . "</td>
                <td><a class='btn btn-primary' href ='print.php?id=$idd'>PRINT</a> &nbsp
                </td>
        </tr></tbody>";

    }
    echo "</table>";
	echo "</div>";

?>

</body>
</html>