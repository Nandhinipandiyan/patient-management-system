HOME.PHP
<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Portal</title>
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
    background-size:     1370px 700px;                     
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
</head>
<body>
<ul>
  <li><a class="active" href="#home">Insert</a></li>
  <li><a href="update.php">Update</a></li>
  <li><a href="delete.php">Delete</a></li>
  <li><a href="view.php">View</a></li>
</ul>
<br>
<br>
<br>
<br>
<center>
<form action="insert.php" method="POST" ><br>

<li1>Patient ID:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type="text" name="n" /></li1><br><br>
<li1>Patient name:</li1>&nbsp;&nbsp;&nbsp;<li1><input type="text" name="name" /></li1><br><br>
<li1>Address:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" /></li1><br><br>
<li1>Phone no:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type="text" name="phno" /></li1><br><br>
<li1>E -mail:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type="text" 
    name="email" /></li1><br><br>
<li1>Doctor Name:</li1><li1>&nbsp;&nbsp;<input type="text" name="dname" /></li1><br><br>
<li1>Date:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="date" name="date" /></li1><br><br>
<li1>Illness:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1>
    <input type="text" name="illness" /></li1><br><br>
<li1>Type:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="type" /></li1><br><br>
<li1>Test:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="test" /></li1><br><br>


<li1><input type="submit" class="button" /></li1>
</center>
</form> 

</body>
<br><br><br>
</html>

INSERT.PHP

<?php
$n = $_POST['n'];
$name = $_POST['name'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$email = $_POST['email'];
$dname = $_POST['dname'];
$date = $_POST['date'];
$ill = $_POST['illness'];
$type = $_POST['type'];
$test = $_POST['test'];
echo "$n";
echo "$name";
echo "$address";
echo "$phno";
echo "$email";
echo "$dname";
echo "$date";
echo "$ill";
echo "$type";
echo "$test";

$db=mysqli_connect('localhost','root','','admin');
$result="insert into patient_details(patient_id,patient_name,address,phone_number,email_id,
	doctor_name,date,illness,type,test) values ('$n','$name','$address','$phno','$email','$dname',
	'$date','$ill','$type','$test')";
if((mysqli_query($db,$result)) == true){ 
sleep(5);
header('location: home.php');
exit;
}
if((mysqli_query($db,$result)) == false){
sleep(5);
header('location: home.php');
exit;
}
?>

UPDATE.PHP

<!DOCTYPE html>
<html>
<head>
<title>Patient Portal</title>
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
    background-size:     1370px 700px;                     
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
</head>
<body>
<ul>
  <li><a href="home.php">Insert</a></li>
  <li><a class="active" href="#update">Update</a></li>
  <li><a href="delete.php">Delete</a></li>
  <li><a href="view.php">View</a></li>
</ul>
<form name="update" action="update2.php" method="post">
    <br>
    <br>
    <br>
  <center>
    <li1>Patient ID:</li1>&nbsp;<li1><input type="text" name="n" /></li1>
    <li1><input type="submit" name="submit" class="button" value="Search">
<center>
</form>

</body>
<br><br><br>
</html>

<?php
?>

UPDATE2.PHP

<!DOCTYPE html>
<html>
<head>
<title>Patient Portal</title>
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
    background-size:     1370px 700px;                     
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
</head>
<body>
<ul>
  <li><a href="home.php">Insert</a></li>
  <li><a class="active" href="#update">Update</a></li>
  <li><a href="delete.php">Delete</a></li>
  <li><a href="view.php">View</a></li>

</ul>
<?php
$db = mysqli_connect('localhost','root','','admin');
//$n = $_POST['n'];
//echo $n; 
$result = mysqli_query($db, "SELECT * FROM patient_details where patient_id = '$_POST[n]'");
$row = mysqli_fetch_assoc($result);
if (!$row)
{
    echo "Record not found ";
}
else
{
    $n=$row['patient_id'];
$id = $row['patient_name'];
$un = $row['address'];
$pa = $row['phone_number'];
$ge = $row['email_id'];
$d = $row['doctor_name'];
$e = $row['date'];
$p = $row['illness'];
$typ = $row['type'];
$tes = $row['test'];

    echo "<form name='insert' action='update3.php' method='POST' ><br>
<li1>Patient ID:</li1>&nbsp;&nbsp;&nbsp;<li1><input type='text' name='n' value='$n' /></li1><br><br>
<li1>Patient name:</li1>&nbsp;&nbsp;&nbsp;<li1><input type='text' name='name' value='$id' /></li1><br><br>
<li1>Address:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='add' value='$un' /></li1><br><br>
<li1>Phone no:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='ph' value='$pa'/></li1><br><br>
<li1>E -mail:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='email' value='$ge'/></li1><br><br>
<li1>Doctor Name:</li1><li1>&nbsp;&nbsp;<input type='text' name='dname' value='$d' /></li1><br><br>
<li1>Date:</li1><li1>&nbsp;&nbsp;<input type='text' name='dt' value='$e' /></li1><br><br>
<li1>Illness:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='ban' value='$p
'/></li1><br><br>
<li1>Type:</li1><li1>&nbsp;&nbsp;<input type='text' name='ty' value='$typ' /></li1><br><br>
<li1>Test:</li1><li1>&nbsp;&nbsp;<input type='text' name='te' value='$tes' /></li1><br><br>
<li1><input type='submit' class='button' value='Insert' /></li1>
</form>  ";

}
?> 
</body>
<br><br><br>
</html>

UPDATE3.PHP

<?php
$n=$_POST['n'];
$db = mysqli_connect('localhost','root','','admin');
$result = mysqli_query($db, "SELECT * FROM patient_details where patient_id = '$n'");
$row = mysqli_fetch_assoc($result);
if (!$row)
{
    echo "Record not found ";
}
else
{
	//$n= $_POST['n'];
    $name = $_POST['name'];
$un = $_POST['add'];
$pa = $_POST['ph'];
$ge = $_POST['email'];
$d = $_POST['dname'];
$e = $_POST['dt'];
$p = $_POST['ban'];
$typ = $_POST['ty'];
$tes = $_POST['te'];
    
    $query = "update patient_details set patient_id='$n',patient_name='$name', address='$un', phone_number='$pa',email_id='$ge',doctor_name='$d',date='$e',illness='$p',type='$typ' , test='$tes'
    			where patient_id='$n'";

    			//echo $query; exit;
    if($db->query($query) == true){ 
    	sleep(5);
header('location: update.php');
exit;
    } 
}
?>
DELETE.PHP

<!DOCTYPE html>
<html>
<head>
<title>Patient Portal</title>
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

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
 body{   

    background-color:  #FFFFFF;
    background-image:url("2.jpg");
    background-size:     1370px 700px;                     
    background-repeat:   no-repeat;
    }
     .news{   
    background-image:url("3.jpg");
    background-size:     100%;                     
    background-repeat:   no-repeat;
    
    }
    
    h1{
        color:red;
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
</head>
<body>
<ul>
  <li><a href="home.php">Insert</a></li>
  <li><a href="update.php">Update</a></li>
  <li><a class="active" href="#delete">Delete</a></li>
  <li><a href="view.php">View</a></li>
</ul>
<form name="insert" action="delete1.php" method="POST" >
    <br>
    <br>
    <br>
<center>
<li1>Patient ID:</li1>&nbsp;<li1><input type="text" name="id" /></li1><br><br>
<li1><input type="submit" class="button" value="Delete" /></li1>
<center>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>

DELETE1.PHP

<?php
$db = mysqli_connect('localhost','root','','admin');
$query = "delete from patient_details where patient_id=$_POST[id]";
if($db->query($query) == true){  
sleep(5);
header('location: delete.php');
exit;
}
?>
