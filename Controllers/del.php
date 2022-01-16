<?php
include '../db_conn.php';
$uid= $_POST['uid']; 
// $conn=mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
$conn= OpenCon();
$sql="DELETE FROM register WHERE register.rollno='$uid'";
$rs=mysqli_query($conn,$sql);
if($rs){
    echo "<div id='toast'><div id='img'><i class='far fa-trash-alt'></i></div><div id='desc'>1 Row Dropped</div></div>";
    echo "<script type='text/javascript'>
        var x = document.getElementById('toast')
        x.className = 'show';
        setTimeout(function(){ x.className = x.className.replace('show', ''); }, 5000);
    </script>";
}
?>