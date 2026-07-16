<?php
  $servername="localhost";
  $username="root";
  $password="";
  $db_name="student_db";
 
  $conn=new mysqli($servername, $username, $password, $db_name, 3306);
  if ($conn -> connect_error)
     { die ("Connection failed ".$conn->connect_error);  }
  $reg_no = $name = $sub_code = $gender = $address ="";
  $int_mark = $ext_mark = $tot_mark = 0;
   if ($_SERVER['REQUEST_METHOD']=='POST') 
   {
    $reg_no=$_POST["reg_no"];
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $sub_code=$_POST["sub_code"];
    $int_mark=$_POST["int_mark"];
    $ext_mark=$_POST["ext_mark"];
   }
   $tot_mark = $int_mark + $ext_mark;
   $insert_query = "insert into student_info values ('$reg_no','$name','$gender','$address','$sub_code',$int_mark, $ext_mark, $tot_mark)";
 
   if ($conn->query($insert_query) === TRUE) {
           echo "New record created successfully";  }
   else {
         echo "Error: " . $insert_query . "<br>" . $conn->error;  }
  $conn->close();
?>