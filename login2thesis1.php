<?php
$mysqli = new mysqli("localhost", "root", "", "ThesisPrototype1");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}   else { $Connected; echo "Connected"; echo "<br>";}
//above is DBCONNECT
  if ($Connected = true){
  $_REQUEST['username'];
  $_REQUEST['password'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = ("SELECT 'LUser_Name','LUser_Password' FROM 'loginuserdata' WHERE 'LUser_Name' = $username AND 'LUser_Password' = $password");

echo ($query);

  }


/*BASELINE CODE
$username = 'username';
$password = 'password';
______________________________________
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_row()) {
        printf ($row[1]);
        echo " is the username ";
        printf ($row[2]);
        echo " is the email ";
        printf ($row[3]);
        echo " is the password ";
    }
    $result->close();
}
$mysqli->close();


DELETED CODES________________________

if ($queries['LUser_Name'] and $queries['LUser_Password']){
  echo "We are logging you in...";
  echo "<br>";
  $query    = "SELECT 'LUser_Name','LUser_Password' FROM 'loginuserdata' WHERE 'LUser_Name' = ? AND LUser_Password = ?";
  echo "Wait a sec...";
  echo "<br>";
//BINDING
  //printf ($query);
  $con->prepare;
    if($stmt = $con->prepare($query)){
      echo "IMGUNNA BE RICH";
    }
}
ANOTHER DELETED CODES ______________________________________
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$LUser_Name = $input['LUser_Name'];
$LUser_Password = $input['LUser_Password'];
$query = "SELECT * FROM `loginuserdata` WHERE LUser_Name = ? AND LUser_Password = ?";
echo ($query);
if(isset($input['LUser_Name']) && isset($input['LUser_Password'])){
	$username = $input['LUser_Name'];
	$password = $input['LUser_Password'];
  echo "lol";
}


*/
?>
