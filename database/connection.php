<?php                   
//session_start();
define('DBSERVER','127.0.0.1'); // database server localhost
define('DBUSERNAME','root');   // database username root

$con = mysqli_connect(DBSERVER, DBUSERNAME, "") or die ("Cannot connect Server."); //connection string

$mydatabase = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS `mydbtest` ");
$mydatabase = mysqli_query($con, " 
                CREATE TABLE IF NOT EXISTS `mydbtest` . `tbl_info` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `fname` varchar(10) NOT NULL,
                    `lname` varchar(10) NOT NULL,
                    `email` varchar(30) NOT NULL,
                    `contact` varchar(11) NOT NULL,
					`uname` varchar(20) NOT NULL,
					`pword` varchar(20) NOT NULL,
					`account_type` int(1) NOT NULL,
                    PRIMARY KEY(`id`)
                ) ENGINE = InnoDB;");



if($con === false){
    die("Cannot connect database" . mysqli_error());
}
else{
    mysqli_select_db($con, "mydbtest");     //connection open
   // echo "CONNECTION SUCCESS";
}

?>