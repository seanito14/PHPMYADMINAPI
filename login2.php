<?php
//AUTHOR: Sean ito
//Co-Authors Jai Motus, Ethan Granato,
$response = array();
include 'db_connect.php';
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$LUser_Name = $input['LUser_Name'];
$LUser_Password = $input['LUser_Password'];
if($queries['LUser_Name'] and $queries['LUser_Password']){
	//query ni Jai
	$query    = "SELECT 'LUser_Name','LUser_Password' FROM 'loginuserdata' WHERE 'LUser_Name' = ? AND LUser_Password = ?";
	//sean query $query    = "SELECT 'LUser_Name','LUser_Password' FROM 'loginuserdata' WHERE 'LUser_Name' = ? AND `LUser_Password` = ?";
	//$con->prepare;
		if($stmt = $con->prepare($query)){
			$stmt->bind_param("s",$LUser_Name,$LUser_Password);
			$stmt->execute();
      $stmt->store_result();
			$stmt->bind_result("s",$LUser_Name,$LUser_Password);
			$stmt->fetch();

      if($stmt->fetch()){
        //Validate the password
        //password_verify($LUser_Password);
        echo "Verifying User Password...";
			//	$stmt->close();
			//TODO EDIT CONDITIONAL STATEMENT
			//if(strcmp('$LUser_Password', '$LUser_Password') == 0){
        //if($LUser_Password == '$LUser_Password'){
    //   if (password_verify($LUser_Password, $row['LUser_Password'])) {
        //if(password_verify($LUser_Password)){
          $response["status"] = 0;
          $response["message"] = "Login successful";
          $response["Username"] = $LUser_Name;
        }
        else{
          $response["status"] = 1;
          $response["message"] = "1st Invalid username and password combination";
        }
      }
      else{
        $response["status"] = 1;
        $response["message"] = "2nd Invalid username and password combination";
      }
      //	$stmt->close();
		}
	}
  else{
		$response["status"] = 2;
		$response["message"] = "Missing mandatory parameters";
	}
	//Display the JSON response
	echo json_encode($response);
//	var_dump($queries);
//echo json_encode($queries);
//echo json_encode($stmt);
	?>
