<?php 
        //getting the database connection
include_once 'dbconnect.php';
 
 //an array to display response
 $response = array();
 
 //if it is an api call 
 //that means a get parameter named api call is set in the URL 
 //and with this parameter we are concluding that it is an api call 
  if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 
 // echo "<br/>you are here";
 //checking the parameters required are available or not 
if(isTheseParametersAvailable(array('loginid','loginname','password')))
{
 
    //getting the values 
   $loginid = $_GET['loginid']; 
    $loginname = $_GET['loginname']; 
    $password = $_GET['password'];
    $selectQuery = "SELECT loginid,loginname FROM loginmaster WHERE loginid ='$loginid' OR loginname = '$loginname'";
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
      echo  " user Already registered";
    }else{
        echo  "No Record found";
       
     //if the user already exist in the database 
      //if user is new creating an insert query 
    $sql ="INSERT INTO loginmaster (loginid, loginname, LoginPass, ContId) 
    VALUES ('$loginid', '$loginname', '$password', '0')";
    //$stmt->bind_param("ssss", $loginid, $loginname, $password, "0");
    //$stmt->execute();
    if ($conn->query($sql) === TRUE) {
      $response['error'] = FALSE; 
      $response['message'] = 'User registered successfully'; 
      $response['user'] = $user; 
      } else {
        $response['error'] = TRUE; 
        $response['message'] = 'required parameters are not available'; 
        }
  }
}
     
 break; 
 
 case 'login': 
 
//for login we need the loginid and password 
 //if(isTheseParametersAvailable(array('loginid', 'password')))
 {
    //getting values 
   $loginid = $_GET['loginid'];
   $password = $_GET['password']; 
     
     //creating the query 
  //   $Query = "SELECT loginid, loginname FROM loginmaster WHERE loginid ='$loginid' AND LoginPass = '$password'";
     $Query = "SELECT loginid, loginname FROM loginmaster where loginid='".$loginid."' and loginpass='".$password."'";
    // print serialize($Query);
     $result = $conn->query($Query);
     $aantal  = $result->num_rows;
     $user = array();
     if($aantal>0)
    {
       while($row =$result->fetch_assoc()){
            array_push($user, $row);
       }
        $response['error'] = false; 
        $response['message'] = 'Login successfull'; 
        $response['data'] = $user; 
        }else{
        //if the user not found 
        $response['error'] = false; 
        $response['message'] = 'Invalid loginid or password';
        $response['data']='Invalid loginid or password';
        }
             
    } 
  break; 
  case 'AddEmployee': 
 
   // if(isTheseParametersAvailable(array('empcode','firstna','mobileno','address','branch')))
{
 
    //getting the values 
   $empcode = $_GET['empcode']; 
    $firstname = $_GET['firstname']; 
    $doj = $_GET['doj'];
    $unitname = $_GET['unitname']; 
    $location = $_GET['location'];
  
     //if user is new creating an insert query  
    $sql ="INSERT INTO employeemaster (empcode, firstname, doj, unitname, location) 
    VALUES ('".$empcode."', '".$firstname."', '".$doj."', '".$unitname."', '".$location."')";
    if ($conn->query($sql) === TRUE) {
      $response['error'] = FALSE; 
      $response['message'] = 'User registered successfully'; 
      } else {
        $response['error'] = TRUE; 
        $response['message'] = 'required parameters are not available'; 
        }
  }
 break;   
 case 'Employeelist': 
 
  //for login we need the loginid and password 
   /* if(isTheseParametersAvailable(array('branch'))){
      //getting values 
      $branch = $_GET['branch'];
    */    
    $loginid = $_GET['loginid'];
    //creating the query 
      $Query = "SELECT empcode,firstname FROM employeemaster where (leftstatus='' or leftstatus is null) and  unitname='".$loginid."'";
      $result = mysqli_query($conn,$Query);
      $aantal  = $result->num_rows;
      if($aantal>0)
      {
      $user = array();
      while($row =$result->fetch_assoc()){
              array_push($user, $row);
          }
          $response['error'] = false; 
         $response['message'] = 'Login successfull'; 
          $response['data'] = $user; 
          }else{
          //if the user not found 
          $response['error'] = false; 
          $response['data'] = false; 
          //$response['message'] = 'Invalid loginid or password';
          //$response['data']='Invalid loginid or password';
  
          }
          $conn->close();
               
      //} 
    break; 
    case 'deleteemployee': 
 
      //for login we need the loginid and password 
       /* if(isTheseParametersAvailable(array('branch'))){
          //getting values 
          $branch = $_GET['branch'];
        */    
        $loginname = $_GET['loginid'];
        $empcode = $_GET['empcode'];
        //creating the query 
          $Query = "update employeemaster set leftstatus='Y',leftdate=CURRENT_TIMESTAMP() where empcode='".$empcode."' and unitname='".$loginname."'";
          $result = mysqli_query($conn,$Query);
          $aantal  = $result->num_rows;
          if($aantal>0)
          {
          $user = array();
          while($row =$result->fetch_assoc()){
                  array_push($user, $row);
              }
              $response['error'] = false; 
             $response['message'] = 'Login successfull'; 
              $response['data'] = $user; 
              }else{
              //if the user not found 
              $response['error'] = false; 
              $response['data'] = false; 
              }
              $conn->close();
                   
          //} 
        break; 
        case 'Attendlist': 
    
     //for login we need the loginid and password 
      // if(isTheseParametersAvailable(array('attenddate')))
      {
         //getting values 
         $attenddate = $_GET['attenddate'];
         $loginid = $_GET['loginid'];
           
          //creating the query 
          $Query1 = "CALL blank_insert('".$attenddate."')";
         //  print serialize($Query1);
  
          $result1 = mysqli_query($conn,$Query1);
         // echo "call blank insert";
          $Query = "CALL attendregister_select('".$attenddate."','".$loginid."')";
         //print serialize($Query);
  
          $result = mysqli_query($conn,$Query);
         $aantal  = $result->num_rows;
         if($aantal>0)
         {
         $user = array();
         while($row =$result->fetch_assoc()){
                 array_push($user, $row);
             }
             $response['error'] = false; 
            $response['message'] = 'Login successfull'; 
             $response['data'] = $user; 
             }else{
             //if the user not found 
             $response['error'] = false; 
             $response['data'] = false; 
             //$response['message'] = 'Invalid loginid or password';
             //$response['data']='Invalid loginid or password';
     
             }
             $conn->close();  
                  
         } 
       break; 
       case 'updateattendance': 
    
        //for login we need the loginid and password 
         // if(isTheseParametersAvailable(array('empcode','attenddate','attstatus')))
         {
            //getting values 
            $empcode = $_GET['empcode'];
            $punchdate = $_GET['punchdate'];
            $unitname = $_GET['unitname'];
            $punchtype = $_GET['punchtype'];
            $punchlocation = $_GET['punchlocation'];
        
           // $punchdate= DATE_FORMAT($punchdate);
           if ($punchtype=='Intime'){
              $sql ="update attendregister set intime='".$punchdate."' where empcode='".$empcode."' and attenddate=DATE('".$punchdate."');";
              $conn->query($sql);    
            } else if ($punchtype=='Outtime'){
                $sql ="update attendregister set outtime='".$punchdate."' where empcode='".$empcode."' and attenddate=DATE('".$punchdate."');";
                $conn->query($sql);      
              }
              
            $sql ="insert into punchmaster(empcode,punchtime,unitname,punchlocation) 
            VALUES ('".$empcode."', '".$punchdate."', '".$unitname."', '".$punchlocation."')";
            // print serialize($sql);
  
                    
            if ($conn->query($sql) === TRUE) {
              $response['error'] = FALSE; 
              $response['message'] = ' successfully'; 
              $response['data'] = "successfull insert"; 
            
            } else {
                $response['error'] = TRUE; 
                $response['message'] = 'required parameters are not available'; 
                }   $conn->close();
                     
            } 
          break; 
          case 'punch': 
    
            //for login we need the loginid and password 
             // if(isTheseParametersAvailable(array('empcode','attenddate','attstatus')))
             {
                //getting values 
                $empcode = $_GET['empcode'];
                $punchdate = $_GET['punchdate'];
                $unitname = $_GET['unitname'];
                $punchlocation = $_GET['punchlocation'];
    
               // $punchdate= DATE_FORMAT($punchdate);
                  
                $sql ="insert into punchmaster(empcode,punchtime,unitname,punchlocation) 
                VALUES ('".$empcode."', '".$punchdate."', '".$unitname."', '".$punchlocation."')";
               // print serialize($sql);
      
                        
                if ($conn->query($sql) === TRUE) {
                  $response['error'] = FALSE; 
                  $response['message'] = ' successfully'; 
                  $response['data'] = "successfull insert"; 
                
                } else {
                    $response['error'] = TRUE; 
                    $response['message'] = 'required parameters are not available'; 
                    }   $conn->close();
                         
                } 
              break; 
             
      
  default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 } 
 
 }else{
 //if it is not api call 
 //pushing appropriate values to response array 
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }

 //displaying the response in json structure 
 echo json_encode($response);


 //function validating all the paramters are available
 //we will pass the required parameters to this function 
 function isTheseParametersAvailable($params){
 
    //traversing through all the parameters 
    foreach($params as $param){

    //if the paramter is not available
    if(!isset($_GET[$param])){
    //return false 
    return false; 
    }
    }
    //return true if every param is available 
    return true; 
    }
     