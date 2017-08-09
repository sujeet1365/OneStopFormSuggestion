<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_exam";


$conn = new mysqli($servername, $username, $password, $dbname);
global $conn;

if ($conn->connect_error) {
    echo "Submition error";
    die("Connection failed: " . $conn->connect_error);
} 

$Firstname = $_POST["first"];
$Lastname = $_POST["last"];
$Age = $_POST["age"];
$Contact = $_POST["contact"];
$Email = $_POST["email"];
$Password = $_POST["password"];


$sql1 = "Select * FROM students where email='$Email'";
$l1=$conn->query($sql1);
if ($l1->num_rows > 0)
{
	 echo "User already Exist" ;
}
else
{
$sql = "INSERT INTO registration (f_name,l_name,age,contact,email,password)
VALUES ('$Firstname', '$Lastname', $Age,$Contact, '$Email','$Password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>""Age:" .$row["age"]."Email: ".$row["email"]."<br>"."Passwod: ".$row["password"];
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>


