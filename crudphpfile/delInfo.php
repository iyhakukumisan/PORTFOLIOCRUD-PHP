

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD - DELETE</title>




<style>

body{
	
	margin:0;
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	
}


/* delete Box */
.del-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  text-align:center;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  
}

.btn-yes{
	background-color:grey;
	color:white;
	padding:10px;
	margin:10px;
	border:2px solid black;

	
	
}

.btn-no{
	background-color:grey;
	color:white;
	padding:9px;
	margin:10px;
	text-decoration:none;
	border:2px solid black;
	
}

.btn-yes:hover{
	background-color:red;
	color:black;
	border:2px solid yellow;
	cursor:pointer;
	
}

.btn-no:hover{
	background-color:orange;
	color:black;
	border:2px solid red;
	
	
}




</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="del-content center">

<?php
require_once("../database/connection.php");
$user_id=$_REQUEST['id'];

$sql = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");
if($row=mysqli_fetch_assoc($sql)){
    $newname = $row["fname"] . " " . $row["lname"];

echo "<h1>
		Are you sure you want to delete <br>" 
		. $newname . 
		"<br> record?</h1>";
}
mysqli_close($con);
?>



<form method="GET" action="../crudphpfile/deletenow.php">
    <input type="hidden" name ="user_id" value="<?php echo $user_id;?>">
    <br> 
    <input type="submit" class="btn-yes" name = "btn_yes" value="YES"> 
    &nbsp <a class="btn-no" href="../admin/crud.php">NO</a>

</form>
<br>
</div>


</body>
</html>



