

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD - RESULT</title>

<style>

body{
	
		margin:0;
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		
	}


	
		.searchbox {
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
		
		a{
			background-color:gray;
			text-decoration:none;
			width:50px;
			padding:13px;
			color:black;
			border:2px solid black;
			text-decoration:none;
			border-radius:5px;
			
		}
		
		a:hover{
			background-color:black;
			color:white;
			border:2px solid red;
			
		}
	
		
		
</style>

</head>
<body>

<div class="searchbox">

<?php
    include("../database/connection.php");
    if(empty($_GET["search"])){
        echo "WALANG laman si GET";
    }
    else{
        $check = $_GET["search"];

        $terms = explode(" ", $check);
        $query = "SELECT * FROM tbl_info WHERE ";
        $i=0;

        foreach($terms as $each){
            $i++;

            if($i==1){
                $query .= "fname LIKE '%$each%' ";
            }
            else{
                $query .= "OR lname LIKE '%$each%' ";
            }

        }
        $sql = mysqli_query($con, $query);
        $c_q = mysqli_num_rows($sql);

        if($c_q > 0 && $check != "" ){
            while($row = mysqli_fetch_assoc($sql)){
                echo "<h1>" . $name = $row["fname"] . "</h1><br>";

            }
        }
        else{
            echo "<h1>RECORD NOT FOUND!</h1>";
        }


}




?>
<br>
<a href="search.php">BACK</a>
<br><br>
</div>


</body>
</html>