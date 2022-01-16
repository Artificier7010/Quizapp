<?php
include 'db_conn.php';
session_start();
$conn = OpenCon();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- Main Container -->

    <div class="main">
        <!-- Left Container -->
        <div class="left">
            <h1>Future is Here</h1>
        </div>
        <!-- Right Container -->
        <div class="right">
            <!-- Login Modal -->
            <div id="log-modal" class="main-modal">
                <h1>LOGIN</h1>
                <br>
                <form method="POST">
                    <div class="row">
                        <label for="username">Username</label><br>
                        <div class="inputcont">
                            <i class="far fa-user"></i>
                            <input required type="text" placeholder="Username" id="username" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <label for="password">Password</label><br>
                        <div class="inputcont">
                            <i class="fas fa-lock"></i>
                            <input required type="password" placeholder="Password" id="password" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <label>Select Role</label><br>
                        <div class="inputcont">
                            <i class="far fa-hand-pointer"></i>
                            <select required name="logrole">
                                <option disabled selected value="">Select</option>
                                <option value="fac">Faculty</option>
                                <option value="stu">Student</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="inputcont">
                            <i class="fas fa-sign-in-alt"></i>
                            <button type="submit">Login</button>
                        </div>
                    </div>

                </form>
                <br>
                <div class="dhaa">
                    <p>Don't Have An Account ?</p>
                    <button class="signup">Sign Up</button>
                </div>
            </div>

            <!-- Registration Modal -->
            <div id="reg-modal" class="main-modal">
                <h1>SIGN UP</h1>
                <br>
                <form action="Controllers/register.php" method="POST">
                    <div class="row">
                        <label for="rollno">University Roll Number</label><br>
                        <div class="inputcont">
                            <i class="far fa-user"></i>
                            <input required type="text" placeholder="Roll Number" id="rollno" name="rollno">
                        </div>
                    </div>
                    <div class="row">
                        <label for="cllg">College Name</label><br>
                        <div class="inputcont">
                        <i class="fas fa-university"></i>
                            <input required type="text" placeholder="Ex:- CSIT" id="cllg" name="cllg">
                        </div>
                    </div>
                    <div class="row">
                        <label for="email">E-Mail</label><br>
                        <div class="inputcont">
                            <i class="fas fa-lock"></i>
                            <input required type="email" placeholder="E-mail" id="email" name="regemail">
                        </div>
                    </div>
                    <div class="row">
                        <label for="pass">Password</label><br>
                        <div class="inputcont">
                            <i class="fas fa-lock"></i>
                            <input required type="password" placeholder="Password" id="pass" name="regpass">
                        </div>
                    </div>
                    <div class="row">
                        <label for="cnfpass">Confirm Password</label><br>
                        <div class="inputcont">
                            <i class="fas fa-lock"></i>
                            <input required type="password" placeholder="Confirm Password" id="cnfpass" name="cnfpass">
                        </div>
                    </div>
                    <div class="row">
                        <label>Select Role</label><br>
                        <div class="inputcont">
                            <i class="far fa-hand-pointer"></i>
                            <select required name="role">
                                <option disabled selected value="">Select</option>
                                <option value="fac">Faculty</option>
                                <option value="stu">Student</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="inputcont">
                            <i class="fas fa-sign-in-alt"></i>
                            <button id="reg-btn" type="submit">Register</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="ahaa">
                    <i class="fas fa-times"></i>
                    <button class="cancel">Cancel</button>
                </div>
            </div>

        </div>
    </div>



    <!-- Scripting Area -->
    <script src="jquery-3.6.0.js"></script>
    <script>
        $(document).ready(() => {
            $("#reg-modal").hide();
            // $("#reg-btn").attr("disabled","true");
            $(".signup").click(() => {
                $("#log-modal").hide();
                $("#reg-modal").slideDown(1000);
            })
            $(".cancel").click(() => {
                $("#reg-modal").hide();
                $("#log-modal").slideDown(1000);
            })


            // Validation
            $("#reg-btn").click(() => {
                let roll = $("#rollno").val();
                let email = $("#regemail").val();
                let password = $("#pass").val();
                let cnfpass = $("#cnfpass").val();
                if ((roll.length < 12)) {
                    alert("the Roll No. can't be less than 12 characters ")
                } else if (email == '') {
                    alert("the email can't be Empty ")
                } else if ((password.length < 6 && password.length > 0)) {
                    alert("the Password must have 6 characters")
                } else if (password != cnfpass) {
                    alert("Password Should be same as above");
                    $("#cnfpass").css("border-color", "red");
                } else {
                    $("#cnfpass").css("border-color", "black");
                }
            })
        })
    </script>

</body>

</html>

<!-- Login Code -->
<!-- ****************** -->
<?php
if (isset($_POST['username'])) {
    // $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
    $sql2 = '';
    $usernm = $_POST['username'];
    $passwrd = $_POST['password'];
    $role = filter_input(INPUT_POST, 'logrole', FILTER_SANITIZE_STRING);

    if ($role == 'stu') {
        $sql2 = "SELECT * FROM register WHERE
       rollno='$usernm' and paswrd='$passwrd'";
    } else {
        $sql2 = "SELECT * FROM facregist WHERE
       email='$usernm' and pass='$passwrd'";
    }
    $rs = mysqli_query($conn, $sql2);

    if ($row = mysqli_fetch_array($rs)) {
        $username = $row['rollno'];

        $sessn = "INSERT INTO sessntab VALUES(
            NULL,'$username'
          )";
        $rssessn = mysqli_query($conn, $sessn);
        if ($rssessn) {
            $sql3 = "SELECT MAX(id) FROM sessntab ";
            $rs3 = mysqli_query($conn, $sql3);
            if($row3 = mysqli_fetch_array($rs3)) {
                $_SESSION['sessnid'] = $row3[0];
                if($role=='stu'){
                    echo '<script type="text/javascript">
                    window.location="Modules/Studentdashboard/studash.php";
                 // alert("Worked loghined as student")
                </script>';
                    $_SESSION['user'] = $usernm;
                }else{
                    echo '<script type="text/javascript">
                    window.location="Modules/Facultydashboard/facdash.php";
                 // alert("Worked loghined as student")
                </script>';
                    $_SESSION['user'] = $usernm;

                }
            }
        }
    } else {
    }

    mysqli_close($conn);
}


?>