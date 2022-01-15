<?php
session_start();

$fetched=$_SESSION['sessnid'];
$fet=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stu.css">
    <title>Document</title>

</head>

<body>
    <div class="main">
        <div class="left">
            <div class="header">
                <h1 style="color:aliceblue">HTML</h1>
            </div>
            <div class="dyquestion" id="dyquestion" style="color:white;"></div>
            <div class="foot"></div>
        </div>
        <div class="right">
            <div class="upper">
                <div class="details">
                    <h2>Username:-<?php echo $fet ?></h2>
                    <h2>Email:-<?php echo $fetched ?></h2>
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


        </div>
    </div>

    <!-- <section class="back" id="back">
        <div class="backinner">
            <div class="backpopup">
                <div id="questionbtns" class="questionbtns">
                    <div class="bar"></div>
                    <div id="btttn" class="btttn">
                        <button value="1" class="x"  >Q.1</button>
                        <button value="2" class="x"  >Q.2</button>
                        <button value="3" class="x"  >Q.3</button>
                        <button value="4" class="x"  >Q.4</button>
                        <button value="5" class="x"  >Q.5</button>
                        <button value="6" class="x"  >Q.6</button>
                        <button value="7" class="x"  >Q.7</button>
                        <button value="8" class="x"  >Q.8</button>
                        <button value="9" class="x"  >Q.9</button>
                        <button value="10" class="x"  >Q.10</button>
                    </div>
                </div>
                
                   <div class="dyquestion" id="dyquestion" style="color:white;"></div>

                
               
                <div class="detail">
                    <h1 id="topc">Html </h1>
                    <div  class="timer">
                        <i class="far fa-clock"></i>
                        <span id="ten-countdown">10:00</span>

                    </div>
                </div>
                
            </div>
            <div class="row">
        <div class="btns">
                    <button id="btnpre">Previous</button>
                    <button id="sub">Submit</button>
                    <button id="btnnext" >Next</button>
                    <button id="finish" >Finish Exam</button>
                    <div id="score" class="score">
                        <div class="scorebar"></div>
                        <h1 id="scor"></h1>
                    </div>
                </div>
        </div>

        </div>

    </section>  -->
    <script src="../../jquery-3.6.0.js"></script>
    <script>
        $(function() {
            alert("bfjhxdzvfdsvufsv")

            let qid = 0;
            $("#finish").hide();
            $("#btnpre").show();
            $("#btnnext").show();
            $("#sub").show();

            $(".x").click(()=>{
                alert("cxzvfuhvfudz");
            })



            // $(".x").click(function() {
            //     alert("Clicked");
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
                            return null;
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
</body>

</html>