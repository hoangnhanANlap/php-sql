
<?php
$servername = "";
$username = "root";
$password = "";
$dbname = "demo-db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//print_r($conn)   ;
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqli ="SELECT * FROM login.new_table";
$result = $conn->query($sqli);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "-id: " . $row["id"]."  ". " - Name: " . $row["name"]. " " ."-Password:". $row["pass"]. "<br>";
  }
} else {
  echo "0 results";
}
$query = "intsert into new_table(id, name, pass)";
//VALUES ('".id." ','".name." ','".pass." ');
//mysqli_query($conn , $query);

$conn->close();
//**************

?>

