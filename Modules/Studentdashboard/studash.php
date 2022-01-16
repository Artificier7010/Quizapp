<?php
include '../../db_conn.php';
session_start();
$conn = OpenCon();

$fetched = $_SESSION['sessnid'];
$username = $_SESSION['user'];

$cllg = "";
$email = "";
$role = "";
$roletoshow = "";
$phpvar="360"; 


// Fetching User Details

$sql1 = "SELECT * FROM register WHERE rollno='$username'";
$rs1 = mysqli_query($conn, $sql1);
if ($row1 = mysqli_fetch_array($rs1)) {
    $cllg = $row1['college'];
    $email = $row1['email'];
    $role = $row1['role'];
    if ($role == 'stu') {
        $roletoshow = "Student";
    } else {
        $roletoshow = "N/A";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <div class="main">
        <div class="left">
            <div class="header">
                <h1 style="color:aliceblue">HTML</h1>
                <div class="user-details">
                    <h2> <?php echo $username ?> </h2>
                    <div class="card">
                        <button id="userbtn"><i class="fas fa-user-check"></i></button>
                        <div class="innercard">
                            <div class="inner-row">
                                <h3>Username:- <?php echo $username ?></h3>
                            </div>
                            <div class="inner-row">
                                <h3>College:- <?php echo $cllg ?></h3>
                            </div>
                            <div class="inner-row">
                                <h3>Email:- <?php echo $email ?></h3>
                            </div>
                            <div class="inner-row">
                                <h3>Role:- <?php echo $roletoshow ?></h3>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="dyquestion" id="dyquestion"></div>
            <div class="btns">
                <button id="btnpre"><i class="fas fa-backward"></i>&nbsp; Previous</button>
                <button id="sub"><i class="fas fa-check"></i>&nbsp;Submit</button>
                <button id="finish">Finish Exam</button>
                <button id="btnnext"><i class="fas fa-forward"></i>&nbsp;Next</button>

            </div>
            <div class="foot">
                  <div id="status"style="font-size:30px;color:white;"></div>

            </div>
        </div>
        <!-- <div class="right">
            <div class="upper">
                <div class="details">
                    <h2>Username:-
                    </h2>
                    <h2>Email:-
                    </h2>
                    <h2>Subject:-HTML</h2>
                    <h2>Date:-2/01/2022</h2>
                </div>
                <div class="btns">
                    <button id="btnpre">Previous</button>
                    <button id="btnnext">Next</button>
                </div>

            </div>

            <div class="midd">
                <div class="btns-cont">
                    <div class="row">
                        <button value="1" class="x">Q.1</button>
                        <button value="2" class="x">Q.2</button>
                        <button value="3" class="x">Q.3</button>
                    </div>
                    <div class="row">
                        <button value="4" class="x">Q.4</button>
                        <button value="5" class="x">Q.5</button>
                        <button value="6" class="x">Q.6</button>

                    </div>
                    <div class="row">
                        <button value="7" class="x">Q.7</button>
                        <button value="8" class="x">Q.8</button>
                        <button value="9" class="x">Q.9</button>
                    </div>
                    <div class="row">
                        <button value="10" class="x">Q.10</button>
                    </div>
                </div>

            </div>
            <div class="lower">
                <div class="lower-btns">
                    <button id="sub">Submit</button>
                    <button id="finish" >Finish Exam</button>
                </div>
            </div>


        </div> -->
    </div>
    <script src="../../jquery-3.6.0.js"></script>
    <script>
        $(function() {
            countDown(<?php echo $phpvar; ?>,"status");

            let qid = 0;
            $("#finish").hide();
            $("#btnpre").show();
            $("#btnnext").show();
            $("#sub").show();
            $(".innercard").hide()

            // $(".x").click(()=>{
            //     alert("cxzvfuhvfudz");
            // })

            $("#userbtn").click(() => {
                $(".innercard").toggle();
            })


            $.post("question.php", {
                k: 1
            }, function(data) {
                $(".dyquestion").html(data);
                qid = 1;
            });



            // $(".x").click(function() {
            //     let x = $(this).val();
            //     qid = x;

            //     $.post("question.php", {
            //         k: x
            //     }, function(data) {

            //         $(".dyquestion").html(data);
            //     });
            // })

            // next button
            $("#btnnext").click(function() {
                qid++;
                if (qid <= 10) {
                    $.post("question.php", {
                        k: qid
                    }, function(data) {
                        $(".dyquestion").html(data);
                    });
                }
            })

            //previous button

            $("#btnpre").click(function() {

                qid--;

                if (qid >= 1) {
                    $.post("question.php", {
                        k: qid
                    }, function(data) {

                        $(".dyquestion").html(data);

                    });
                }
            })

            //submit

            $("body").on("click", "#sub", function() {
                if (qid <= 10) {
                    if ($("input[type='radio'].radioBtnClass").is(':checked')) {
                        var card_type = $("input[type='radio'].radioBtnClass:checked").val();
                        $.post("answer.php", {
                            ans: card_type,
                            k: qid
                        }, function(data) {
                            alert(data);
                        });
                    }
                } else if (qid > 10) {
                    $("#finish").show();
                    $("#btnnext").hide();
                    $("#btnpre").hide();
                    $("#sub").hide();
                }
                qid++;
                if (qid <= 10) {
                    $.post("question.php", {
                        k: qid
                    }, function(data) {

                        $(".dyquestion").html(data);

                    });
                }
            })
            $("#finish").click(function() {
                window.location = "answercheck.php";
            })



        })
    </script>



    <!-- Timer Code -->
    <script type="text/javascript">
        function countDown(secs, elem) {

            var element = document.getElementById(elem);

            element.innerHTML = "Timer: " + secs + " seconds";

            if (secs < 1) {

                clearTimeout(timer);
                window.location = "answercheck.php";

                element.innerHTML = '<h2>Ended</h2>';
            }

            secs--;

            var timer = setTimeout('countDown(' + secs + ',"' + elem + '")', 1000);

        }
    </script>
</body>

</html>