<?php
include '../../db_conn.php';
session_start();
$conn = OpenCon();

// Available Quizes
// ***************

$sql1 = "SELECT * FROM quizes";
$rs = mysqli_query($conn, $sql1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="studash.css">
  <title>Document</title>
</head>

<body>
  <div class="custm-nav">
    <ul>
      <li class="active"><i class="fas fa-home"></i></li>
      <li><i class="fas fa-info"></i></li>
      <li><i class="far fa-address-card"></i></li>
      <li><i class="fas fa-user"></i></li>
      <div class="indicator"></div>
    </ul>
  </div>
  <div class="bel-block container">

    <!-- HOME SECTION -->
    <!-- ******************** -->
    <div class="home">
      <h1>AVAILABLE QUIZES</h1>
      <hr>
      <br>
      <table id="customers">
        <thead>
          <th>S No.</th>
          <th>Title</th>
          <th>Subject</th>
          <th>Subject Code</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          $sno = 1;
          while ($userrow = mysqli_fetch_array($rs)) {
            if ($userrow) {
              echo "<tr>";
              echo '<td data-label="Id">' . $sno . '</td>';
              echo '<td data-label="Title">' . $userrow["title"] . '</td>';
              echo '<td data-label="Subject">' . $userrow["subject"] . '</td>';
              echo '<td data-label="Subject Code">' . $userrow["subcode"] . '</td>';
              echo '<td data-label="Action"><button class="strtbtn">START</button></td>';
              echo "</tr>";
              $sno++;
            } else {
              echo "<tr>";
              echo '<td colspan="8" style="text-align:center;">No Users</td>';
              echo "</tr>";
            }
          }
          ?>

        </tbody>
      </table>




    </div>


  </div>



  <!-- Script -->
  <!-- ******************     -->

  <script src="../../jquery-3.6.0.js"></script>
  <script>
    $(document).ready(function() {

      let isbtnDis=false;
      if(isbtnDis==true){
        $(this).html("Finished")
        $(this).attr("disabled","true");
      }

      $(".strtbtn").click(function() {
        let subCode = $(this).closest('tr').find("td:nth-child(4)").text();
        isbtnDis=true;
       
        window.location.href="../Studentdashboard/stuportal.php";
        $.post()
      })


    })
  </script>

  <script type="text/javascript">
    var nav = document.querySelectorAll("li");

    nav.forEach((li) => {
      li.addEventListener("click", function() {
        removeActive();
        this.classList.add("active");
      });
    });

    function removeActive() {
      nav.forEach((li) => {
        li.classList.remove("active");
      });
    }
  </script>


</body>

</html>