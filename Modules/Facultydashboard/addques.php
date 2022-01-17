<?php
include '../../db_conn.php';
session_start();
$conn= OpenCon();

$lang = $_SESSION['lang'];
$subject = $_SESSION['subjct'];
$subcd = $_SESSION['subcd'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="addques-main">
        <div class="container">
            <h1>Add Questions</h1>
            <hr>
            <br>
            <form method="POST" class="row g-3 needs-validation">
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Question</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="ques" aria-describedby="validationServer03Feedback" placeholder="Question" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Question
                    </div>
                </div>
        
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Option 1</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="opt1" aria-describedby="validationServer03Feedback" placeholder="Option" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Option
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Option 2</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="opt2" aria-describedby="validationServer03Feedback" placeholder="Option" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Option
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Option 3</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="opt3" aria-describedby="validationServer03Feedback" placeholder="Option" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Option
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Option 4</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="opt4" aria-describedby="validationServer03Feedback" placeholder="Option" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Option
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer03" class="form-label">Answer</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03" name="ans" aria-describedby="validationServer03Feedback" placeholder="Answer" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid Answer
                    </div>
                </div>
                
               
                <button type="submit" id="subaddquiz" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>

</body>

</html>

<?php
    $sql="";
if(isset($_POST['ques'])){
    $ques=$_POST['ques'];
    $opt1=$_POST['opt1'];
    $opt2=$_POST['opt2'];
    $opt3=$_POST['opt3'];
    $opt4=$_POST['opt4'];
    $ans=$_POST['ans'];
         
         if($lang=="eng"){
            $sql="INSERT INTO questiontab VALUES(NULL,'$ques','$opt1','$opt2','$opt3','$opt4','$ans','$subject','$subcd')";  
         }else{
            $sql="INSERT INTO questiontab2 VALUES(NULL,'$ques','$opt1','$opt2','$opt3','$opt4','$ans','$subject','$subcd')";
         }


        $rs=mysqli_query($conn,$sql);
         if($rs){
             
             echo "
             <script type='text/javascript'>
             alert('Question Added');
             </script>
             ";
         }


}

?>

