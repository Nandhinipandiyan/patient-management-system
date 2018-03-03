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
<li1>Doctor Name:</li1>&nbsp;&nbsp;&nbsp;<li1><input type="text" name="name" /></li1><br><br>
<li1>Address:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" /></li1><br><br>
<li1>Phone no:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type="text" name="phno" /></li1><br><br>
<li1>E -mail:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type="text" 
    name="email" /></li1><br><br>
<li1>Joining Date:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="date" name="date" /></li1><br><br>
<li1>Qualification:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1>
    <input type="text" name="illness" /></li1><br><br>
<li1>Experience:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="type" /></li1><br><br>
<li1>Speciality:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="speciality" /></li1><br><br>

<li1><input type="submit" class="button" /></li1>
</center>
</form> 

</body>
<br><br><br>
</html>

INSERT.PHP
<?php
//$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$email = $_POST['email'];
$date = $_POST['date'];
$ill = $_POST['illness'];
$type = $_POST['type'];
$speciality = $_POST['speciality'];
//echo "$id";
echo "$name";
echo "$address";
echo "$phno";
echo "$email";
echo "$date";
echo "$ill";
echo "$type";
echo "$speciality";

$db=mysqli_connect('localhost','root','','admin');
$result="insert into doctor_details(doctor_name,address,phone_number,email_id,
 date,qualification,experience,speciality) values ('$name','$address','$phno','$email',
	'$date','$ill','$type','speciality')";
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
    <li1>Doctor ID:</li1>&nbsp;<li1><input type="text" name="n" /></li1>
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
$result = mysqli_query($db, "SELECT * FROM doctor_details where doctor_id = '$_POST[n]'");
$row = mysqli_fetch_assoc($result);
if (!$row)
{
    echo "Record not found ";
}
else
{
    $n=$row['Doctor_id'];
$id = $row['doctor_name'];
$un = $row['address'];
$pa = $row['phone_number'];
$ge = $row['email_id'];
$e = $row['date'];
$p = $row['qualification'];
$typ = $row['experience'];
$tes = $row['speciality'];
    echo " <center> <form name='insert' action='update3.php' method='POST' ><br>
<li1>Doctor ID:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='n' value='$n' /></li1><br><br>
<li1>Doctor name:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='name' value='$id' /></li1><br><br>
<li1>Address:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='add' value='$un' /></li1><br><br>
<li1>Phone no:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='ph' value='$pa'/></li1><br><br>
<li1>E -mail:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='email' value='$ge'/></li1><br><br>
<li1>Date:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='dt' value='$e' /></li1><br><br>
<li1>Qualification:</li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li1><input type='text' name='ban' value='$p
'/></li1><br><br>
<li1>Experience:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='ty' value='$typ' /></li1><br><br>
<li1>Speciality:</li1><li1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='te' value='$tes' /></li1><br><br>
<li1><input type='submit' class='button' value='Insert' /></li1> </center>
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
$result = mysqli_query($db, "SELECT * FROM doctor_details where doctor_id = '$n'");
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
//$d = $_POST['dname'];
$e = $_POST['dt'];
$p = $_POST['ban'];
$typ = $_POST['ty'];
$tes = $_POST['te'];
    
    $query = "update doctor_details set doctor_id='$n',doctor_name='$name', address='$un', phone_number='$pa',email_id='$ge',date='$e',qualification='$p',experience='$typ' , speciality='$tes'
    			where doctor_id='$n'";

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
<li1>Doctor ID:</li1>&nbsp;<li1><input type="text" name="id" /></li1><br><br>
<li1><input type="submit" class="button" value="Delete" /></li1>
<center>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
DELETE1.PHP
<?php
$db = mysqli_connect('localhost','root','','admin');
$query = "delete from doctor_details where Doctor_id=$_POST[id]";
if($db->query($query) == true){  
sleep(5);
header('location: delete.php');
exit;
}
?>

VIEW.PHP
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
    background-size:     2370px 700px;                     
    background-repeat:   no-repeat;
    
	}
	 .news{   
    background-image:url("3.jpg");
    background-size:     100%;                     
    background-repeat:   no-repeat;
    
	}
</style>
</head>
<body>
<ul>
  <li><a href="home.php">Insert</a></li>
  <li><a href="update.php">Update</a></li>
  <li><a href="delete.php">Delete</a></li>
  <li><a class="active" href="#View">View</a></li>
</ul>
 <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
</body>
<br><br><br>
</html>

<html>
<center> 
    <table cellpadding="5" cellspacing="0" border="10" >
                            <thead>
                                <tr>
                                    <th>Doctor ID</th>
                                   <th>Doctor Name</th>
                                   <th>Address</th>
                                   <th>Phone no</th>
                                   <th>E-mail</th>
                                    <th>Date</th>
                                   <th>Qualification</th>
                                    <th>Experience</th>
                                     <th>Speciality</th>
                                 
                                </tr>
                           </thead>
                           <tbody>
                        <?php 
                        $db = mysqli_connect('localhost','root','','admin');
                            $query=mysqli_query($db,"select * from doctor_details ORDER BY Doctor_id ASC")or die(mysqli_error());
                            while($row=mysqli_fetch_array($query)){
                            $n=$row['Doctor_id'];
                            $username=$row['doctor_name'];
                            $gender=$row['address'];
                            $dob=$row['phone_number'];
                            $phno=$row['email_id'];
                             $date=$row['date'];
                            $bname=$row['qualification'];
                             $type=$row['experience'];
                              $speciality=$row['speciality'];
                           
                            ?>
                              
                                        <tr>
                                        
                                         <td><?php echo $row['Doctor_id'] ?></td>
                                         <td><?php echo $row['doctor_name'] ?></td>
                                         <td><?php echo $row['address'] ?></td>
                                         <td><?php echo $row['phone_number'] ?></td>
                                         <td><?php echo $row['email_id'] ?></td>
                                         <td><?php echo $row['date'] ?></td>
                                          <td><?php echo $row['qualification'] ?></td>
                                           <td><?php echo $row['experience'] ?></td>
                                            <td><?php echo $row['speciality'] ?></td>
                                </tr>
                         
                                  <?php } ?>
                            </tbody>
                        </table>
                    </center>
</html>
