<?php
session_start();

if(isset($_SESSION["id"])){
    $user_id = $_SESSION["id"];
    include("../database/connection.php");

    $get_record = mysqli_query($con, "SELECT * FROM tbl_info WHERE id = '$user_id'");
    while($row_edit = mysqli_fetch_assoc($get_record)){
            $dbfname = $row_edit["fname"];
            $dblname = $row_edit["lname"];
            $dbemail = $row_edit["email"];
            $dbcontact = $row_edit["contact"];

            // echo "WELCOME " . $dblname . "," . $dbfname . "<br>";
            // echo "CONTACT: " . $dbcontact . "<br>";
            // echo "EMAIL: " . $dbemail . "<br><br>";

            // echo "<a href='logout.php'>LOG OUT</a>";


    }

}
else{
    echo "YOU must login FIRST! <a href='../login.php'>LOGIN NOW!</a>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MY PORTFOLIO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/mystyle.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 
<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  border-radius: 15px;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button 1*/
.close1 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button 2*/
.close2 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* The Close Button 3*/
.close3 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close3:hover,
.close3:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: black;
  background-image: linear-gradient(black, teal);  
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}


  
.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  /* width:300px; */
  /* font-size: 16px;   */
  border: none;
  outline: none;
  color: white;
  padding: -5px;
  background-color: inherit;
  font-family: inherit;
  margin: -5px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
  margin: -5px;
}

/* .dropdown:hover .dropdown-content {
  display: block;
} */


.topnav {
  overflow: hidden;
     background-color: teal; /* For browsers that do not support gradients */
    background-image: linear-gradient(teal, #01babd);
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
 background-color: #aed9bb; /* For browsers that do not support gradients */
    background-image: linear-gradient(#01babd, #aed9bb);
}

.topnav a.active {
    background-color: #aed9bb; /* For browsers that do not support gradients */
    background-image: linear-gradient(#01babd, #aed9bb);
    color:black;
}

.topnav .icon {
  display: none;
}



@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


/*bottomnotice*/

.footer {
	
   background-color: teal; /* For browsers that do not support gradients */
    background-image: linear-gradient(teal, #01babd);
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
  margin-top: 10px;
}

.footer .active-btn {
	background-color: #aed9bb; /* For browsers that do not support gradients */
    background-image: linear-gradient(#01babd, #aed9bb);
    color:white;
}

</style>

<script src="jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">MY PORTFOLIO - Jerome T. Niñada "TISER JE" </a>
  <a href="crud.php">ADD ACCOUNT</a>
  <a href="logout.php">LOGOUT</a>

  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	<!--footer-->

<div class="footer">
<span class="active-btn">LOGIN AS ADMINISTRATOR</span>


</div>



  <!-- content -->

  <br><br>
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center">
                <div id="mygrad2" class="card">
                  <img src="../picture/ME.jpg" alt="John" class="img-thumbmail mx-auto d-block pic">
                  
                </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="row">

              <!-- Trigger/Open The Modal -->
                            <button id="myBtn" class="itmbox"><h3>ABOUT ME</h3></button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                              <!-- Modal content -->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <span class="close">&times;</span>
                                  <h2>About me</h2>
                                </div>
                                <div class="modal-body">
                                      <div class="container">
                                          <div class="row">
                                            <h4>PERSONAL</h4>
                                            <div class="col">
                                              <ul>
                                                  <li><p>Name: Jerome Turqueza Niñada</p></li>
                                                  <li><p>Nickname: Je</p></li>
                                                  <li><p>Contact: 0929203031</p></li>
                                              </ul>

                                            </div>

                                            <div class="col">
                                              <ul>
                                                  <li><p>Home: 1661 Estrada St. San Andres Bukid, Manila</p></li>
                                                  <li><p>Birthdate: February 29, 1997</p></li>
                                                  <li><p>Email: mr.jdummy20@gmail.com</p></li>
                                              </ul>

                                            </div>

                                          </div>


                                          <div class="row">
                                            <h4>OTHER INFO</h4>
                                            <div class="col-sm-6">
                                              <ul>
                                                  <li><p>GENDER: Male</p></li>
                                                  <li><p>RELIGION: Roman Catholic</p></li>
                                                  <li><p>Birthplace: Manila</p></li>
                                              </ul>

                                            </div>

                                            <div class="col-sm-6">
                                              <h4>EDUCATION</h4><br>
                                              <p>Bachelor of Science in Computer Technology</p><br>
                                              <p>EARIST, Manila - 2017 </p><br>
                                             

                                            </div>

                                          </div>


                                          <div class="row">
                                            <h4>FAVORITE & HOBBIES</h4>
                                            <div class="col-sm-6">
                                              <ul>
                                                  <li><p>FAVORITE FOOD: CHEESBURGER</p></li>
                                                  <li><p>FAVORITE COLOR: BLUE</p></li>
                                                  <li><p>FAVORITE ACTRESS: EMMA STONE</p></li>
                                              </ul>

                                            </div>

                                            <div class="col-sm-6">
                                              <ul>
                                                  <li><p>HOBBIES: PROGRAMMING</p></li>
                                                  <li><p>HOBBIES: PLAYING COMPUTER GAMES</p></li>
                                                  <li><p>HOBBIES: SHARING KNOWLEDGE</p></li>
                                              </ul>

                                            </div>

                                          </div>

                                      </div>
                                </div>
                            
                              </div>

                            </div>       
            </div>
                <!-- 2ndsection -->
            <div class="row">

              <!-- Trigger/Open The Modal -->
                    <button id="myBtn2" class="itmbox"><h3>MY WORKS</h3></button>
                 
                    <!-- The Modal -->
                    <div id="myModal1" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="close1">&times;</span>
                          <h2>My Works</h2>
                        </div>
                        <div class="modal-body">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-sm-4"><img src="../picture/gramono.JPG" class="img-fluid zoom">
                                        <br><br><br><br> <p class="mybg-peach title1 d-flex justify-content-center">WEBSITE</p></div>
                                      <div class="col-sm-4"><img src="../picture/POS.jpg" class="img-fluid zoom"><br><br><br><p class="mybg-peach title1 d-flex justify-content-center">POS</p></div>
                                      <div class="col-sm-4"><img src="../picture/backofficemain.jpg" class="img-fluid zoom"><br><br><br><p class="mybg-peach title1 d-flex justify-content-center">Inventory System</p></div>
                                  </div>
                              </div>
                       
                        </div>
               
                      </div>

                    </div>    
                    
            </div>

                <!-- 3rd section -->
            <div class="row">

                  <!-- Trigger/Open The Modal -->
                  <button id="myBtn3" class="itmbox"><h3>SKILL OFFER</h3></button>

                  <!-- The Modal -->
                  <div id="myModal2" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="close2">&times;</span>
                        <h2>SKILL OFFER</h2>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <p>Communication Skills (Former Teacher)</p>
                                    <p>Teamplay (SK Chairperson in our Brgy.)</p>
                                    <p>Analytical Skills (Knowledgeable at Formula writing in MS Excel)</p>
                                    <p>Backend Skills (Java, PHP, VB.net)</p>
                                    <p>Frontend Skills (HTML, CSS, Javascript)</p>
                                    <p>Graphics Designing (Adobe Photoshop, Illustrator and Premeire)</p>
                                  </div>
                              </div>
                        </div>
                      </div>
                  
                    </div>

                  </div>      
            </div>

              <!-- 4th section -->
              <div class="row">

                                      
                      <!-- Trigger/Open The Modal -->
                      <button id="myBtn4" class="itmbox"><h3>CONTACT</h3></button>

                      <!-- The Modal -->
                      <div id="myModal3" class="modal">

                          <!-- Modal content -->
                          <div class="modal-content">
                              <div class="modal-header">
                                <span class="close3">&times;</span>
                                <h2>Contact</h2>
                              </div>
                              <div class="modal-body">
                                    <div class="container">
                                          <div class="row">
                                                  <div class="col-sm-6">
                                                      <p>Contact: 09292833</p>
                                                      <p>Address: 1661 Estrada St. San Andres Bukid, Manila</p>
													  
													   <a href="https://www.facebook.com/iyhakumisan/" class="fa fa-facebook">  FACEBOOK - Jerome Turqueza Niñada</a> <br><br>
														<a href="#ig" class="fa fa-instagram">  INSTAGRAM</a> <br><br>
														<a href="#gmail" class="fa fa-google">  GMAIL - mr.jdummy20@gmail.com</a> <br><br>
														<a href="#github" class="fa fa-github">    GITHUB</a> <br><br>
                                                  </div>
                                          </div>
                                  </div> 
                              </div>
                            </div>
                        </div>
                  </div>

                  <!-- 5th section -->

                  <div class="row">
                      <div id="mygrad1" class="card1">
                          <h1>HI! I'm Jerome "Je" T. Niñada</h1>
                          <p class="title1">TITSER JE, Future Software Engineer, Game Dev. and Graphics Editor</p>
                          <p>IT Instructor and Freelance Web designer, I create some web design including UI and also knowlegable in backend like Java, PHP and SQL.</p>
  
                      </div>
                  </div>
				  <br><br>

    </div>
    </div>
	
	


<script>
  // Get the modal
  let modal = document.getElementById("myModal");
  let modal1 = document.getElementById("myModal1");
  let modal2 = document.getElementById("myModal2");
  let modal3 = document.getElementById("myModal3");
  
  // Get the button that opens the modal
  let btn = document.getElementById("myBtn");
  let btn1 = document.getElementById("myBtn2");
  let btn2 = document.getElementById("myBtn3");
  let btn3 = document.getElementById("myBtn4");
  
  // Get the <span> element that closes the modal
  let span = document.getElementsByClassName("close")[0];
  let span1 = document.getElementsByClassName("close1")[0];
  let span2 = document.getElementsByClassName("close2")[0];
  let span3 = document.getElementsByClassName("close3")[0];
 
    btn.onclick = function() {
      modal.style.display = "block";
      }
    
 
    btn1.onclick = function() {
      modal1.style.display = "block";
      }

    btn2.onclick = function() {
      modal2.style.display = "block";
      }

    btn3.onclick = function() {
      modal3.style.display = "block";
      }
  

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  span1.onclick = function() {
    modal1.style.display = "none";
  }

  span2.onclick = function() {
    modal2.style.display = "none";
  }

  span3.onclick = function() {
    modal3.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal || event.target == modal1 || event.target == modal2 || event.target == modal3) {
      modal.style.display = "none";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";
    }
  }
  </script>
  <script>
   // let a = document.querySelector("a");
  //  function myFunction() {
   //   let x = document.getElementById("myTopnav");
  //    if (x.className === "topnav") {
  //      x.className += " responsive";
  //      a.innerHTML = 'MY PORTFOLIO - Jerome T. Niñada "TISER JE"';


  //    } else {
  //      x.className = "topnav";
  //      a.innerHTML = "MY PORTFOLIO";
  //    }
  //  }


    </script>
	
	<script>
function myFunction() {
  let x = document.getElementById("myTopnav");
  
  if (x.className === "topnav") {
    x.className += " responsive";

  } else {
    x.className = "topnav";

  }
}
</script>


</body>
</html>
