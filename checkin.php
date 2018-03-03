Checkin.php
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="2.jpg" type="image/png">
</head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}
li b{
    listt-style: none;
} 
li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li1{
    listt-style: none;

}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
 body{   
  background-color:  #FFFFFF;
    background-image:url("2.jpg");
    background-size:     1870px 900px;                     
    background-repeat:   no-repeat;
    
  }
   .news{   
    background-image:url("3.jpg");
    background-size:     100%;                     
    background-repeat:   no-repeat;
    
  }
    .button {
    background-color: green;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>

  <title>Self check-in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


 <div class="container">
  <h2>Self check-in</h2>
  <form action="index.php" method="POST">
    <div class="form-group">
      <label for="email">Registration No:</label>
      <input type="number" class="form-control" id="id" placeholder="Enter registration no" name="id">
    </div>
    <button type="submit" class="btn btn-default" onclick="loadDetails()">Submit</button>
  </form>
</div>
<div id="demo"></div>

<script>

function loadDetails() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "index.php?id="+Doctor_id.value, true);
  xhttp.send();
}

</script> 
</body>
</html>

Index.php
<?php
$q = $_POST['id'];

$con = mysqli_connect('localhost','root','','admin');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
		body{   
    background-color:  #FFFFFF;
    background-image:url("2.jpg");
    background-size:     1870px 900px;                     
    background-repeat:   no-repeat;
    
    }
		</style>

    </head>
    <body >
       
<div class="main" style="margin-top: 45px;">
 <h1><center> REGISTRATION DETAILS </center></h1>
  
<?php
mysqli_select_db($con,"admin");
$sql="SELECT appoinment.name, appoinment.sym, appoinment.date, doctor_details.doctor_name, doctor_details.speciality, doctor_details.floor,
		doctor_details.room FROM appoinment 
       INNER JOIN doctor_details 
      ON doctor_details.Doctor_id= appoinment.availdoc
      AND appoinment.id = '".$q."'";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    ?>
	<center>
    <b>Patient Name:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['name'];?> 
	<br> <br> 
    <b>Illness: </b><?php echo $row['sym'];?>
	<br> <br> 
    <b>Date:&nbsp;</b><?php echo $row['date'];?>
	<br> <br> 
    <b>Doctor Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['doctor_name'];?> 
     <br> <br> 	
    <b>Speciality:&nbsp;&nbsp;</b><?php echo $row['speciality'];?>
	<br> <br> 
    <b>Floor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['floor'];?>
	<br> <br> 
    <b>Room:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['room'];?>
    </center>
	<?php
}
mysqli_close($con);
?>
</div>
    </body>
</html>
