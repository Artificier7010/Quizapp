
<?php
    // $conn =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
    $conn =mysqli_connect("localhost","root","","quizapp");
    
    if($conn === false){
        die("error could not connect".mysqli_connect_error());
    }


    $rollNo=$_POST['rollno'];
    $cllg=$_POST['cllg'];
    $email=$_POST['regemail'];
    $password=$_POST['regpass'];
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

    $sql="INSERT INTO register VALUES(
       NULL ,'$rollNo','$cllg','$email','$password','$role'
    )";

    if(mysqli_query($conn,$sql)){
      echo '<script type="text/javascript">
      confirm(" Registered Succesfully");
      window.location.href="../Index.php"
      </script>';
    }else{
        echo "error=".mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
    
