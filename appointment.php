INDEX.PHP
<!DOCTYPE HTML>
<html>
<head>
<title>KG HOSPITAL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Medical Appointment Form ">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<script>
	 

function showUser(str) {
	
    if (str=="") {
    document.getElementById("subjects").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("subjects").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getDoctor.php?q="+str,true);
  xmlhttp.send();
}
	 </script>
<!--//fonts--> 



</head>
<body>

<h1> Patient Portal System </h1>
    <div class="bg-agile">
	<div class="book-appointment">
	<b><h2>Booking an Appointment </h2></b>
			<form name="insert" action="insert.php" method="POST">
			<div class="left-agileits-w3layouts same">
			<div class="gaps">
				<p>Patient Name</p>
					<input type="text" name="pname" placeholder="" required=""/>
			</div>	
				<div class="gaps">	
				<p>Phone Number</p>
					<input type="text" name="no" placeholder="" required=""/>
				</div>

				<div class="gaps">
				<p>Email</p>
						<input type="email" name="email" placeholder="" required="" />
				</div>
              <div class="gaps">
				<p>Gender</p>	
					<select class="form-control" name="ge" >
						<option></option>
						<option>Male</option>
						<option>Female</option>
					</select>
			</div>	
	
									
				
			</div>
			<div class="right-agileinfo same">
			
			
			<div class="gaps">
				<p>Select Date</p>		
						<input  id="datepicker1" name="da" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
			</div>

			<div class="gaps">
				<p>Symptoms</p>
						<textarea name="as" placeholder="" required="" ></textarea>
				</div>
			<div class="gaps">
				<p>Speciality</p>	
						
  
  <select id="subject" name="di" class="form-control" onchange="showUser(this.value)">
   
   
   <option value="cardiologist" class="">Cardiologist</option>
   <option value="allergist" class="">Allergist</option>
  <option value="Dermatologist" class="">Dermatologist</option>
  <option value="gynaecologist" class="">Gynaecologist</option>
  <option value="development pediatrician" class="">Development pediatrican</option>
                  
					</select>
			</div>
			<div class="gaps">
				<p>Available doctors</p>
				<select id="subjects" name="ti" class="form-control">
<div id="doctor_list"></div>	
					</select>
			<!--	<select id="subject1" name="ti"  class="form-control">
                        <div id="doctor_list"></div>				
					
					</select>-->
			</div>
		
			
			</div>
			<div class="clear"></div>
						  <input type="submit" value="Make an appointment">
			</form>
		</div>
   </div>
   <!---728x90--->
   <!--copyright-->
			<div class="copy w3ls">
	        </div>
		<!--//copyright-->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
		

</body>
</html>




GETDOCTOR.PHP

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','admin');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"admin");
$sql="SELECT doctor_name FROM doctor_details WHERE speciality = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
	echo '<option value = "'.$row['doctor_name'].'">'.$row['doctor_name'].'</option>';
}
mysqli_close($con);
?>

INSERT.PHP
<!DOCTYPE HTML>
<html>
<head>
<title>Patient portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Medical Appointment Form ">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<!--//fonts--> 
</head>
<body>

<h1> Patient portal system</h1>

    <div class="bg-agile">
	<div class="book-appointment">

			<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['pname'];
$num = $_POST['no'];
$email = $_POST['email'];
$sym = $_POST['as'];
$date = $_POST['da'];
$dept = $_POST['di'];
$gender = $_POST['ge'];
$availdoc = $_POST['ti'];

$sql = "INSERT INTO appoinment (name, num, email, sym, date, dept, gender, availdoc)
VALUES ('$name', '$num', '$email', '$sym', '$date', '$dept', '$gender', '$availdoc')";

if ($conn->query($sql) === TRUE) {
	echo "<h1> <font color=red size='4pt'> Appointment successful</font></h1>";
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
		</div>
   </div>

			<div class="copy w3ls">
	        </div>
		<<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

</body>
</html>

