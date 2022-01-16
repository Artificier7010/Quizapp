<!-- category insertion  -->
<?php
include '../../db_conn.php';

// session_start();

// $connect =mysqli_connect("localhost","id17345460_artificiers","Av@300303318014","id17345460_registration");
$connect = OpenCon();

// if (isset($_POST['cate'])) {

//   $cate1 = $_POST['cate'];

//   $sql = "INSERT INTO category VALUES(NULL,'$cate1')";


//   $rs = mysqli_query($connect, $sql);

//   if ($rs) {
//     echo "<script type='text/javascript'>alert('worked')</script>";
//   }
// }


?>

<!-- user detail data -->

<?php

$sql2 = "SELECT * FROM register ";

$anss = mysqli_query($connect, $sql2);

?>

<!-- No. of Users -->
<?php

$nou = "SELECT COUNT(*) FROM register";
$nor = mysqli_query($connect, $nou);
$rownum = mysqli_fetch_array($nor);
$total = $rownum[0];
?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
  <link rel="stylesheet" href="style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="fac.css">
</head>

<body>


  <!-- sidebar  -->
  <!-- *************************** -->


  <div class="sidebar">
    <div class="logo-details">
      <img src="../../Assets/darkbglogo.png" alt="" id="wislogo">
      <div class="logo_name">Wiscore</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
        <a id="dash" href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li> -->
      <!-- <li>
        <a id="categ" href="#">
          <i class="fas fa-list-ol"></i>
          <span class="links_name">Attendence</span>
        </a>
        <span class="tooltip">Attendence</span>
      </li> -->
      <li>
        <a id="usr" href="#">
          <i class='bx bx-user'></i>
          <span class="links_name">Users</span>
        </a>
        <span class="tooltip">Users</span>
      </li>
      <li>
        <a id="rslt" href="#">
          <i class='bx bx-chat'></i>
          <span class="links_name">Question Add</span>
        </a>
        <span class="tooltip">Question Add</span>
      </li>
      <!-- <li>
        <a id="shedul" href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Schedule</span>
        </a>
        <span class="tooltip">Schedule</span>
      </li> -->
      <!-- <li class="profile">
        <div class="profile-details">
          <div class="name_job">
            <div class="name"><?php echo $facultyname ?></div>
            <div class="job">Faculty</div>
          </div>
        </div>
        <a href="../../logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
      </li> -->
    </ul>
  </div>
  <section class="home-section">










    <!-- User Details -->
    <!-- ************************* -->
    <div class="userdetail">
      <div class="container">
        <h1>User Details</h1>
        <hr>
        <br>
        <table id="customers">
          <thead>
            <th>S No.</th>
            <th>User ID/Roll No.</th>
            <th>College</th>
            <th>Email</th>
            <th>Action</th>
          </thead>
          <tbody>

            <?php
            $sno = 1;
            while ($userrow = mysqli_fetch_array($anss)) {
              // echo '<script type="text/javascript">
              // window.location="dash.php";
              // </script>';
              if ($userrow) {



                echo "<tr>";
                echo '<td data-label="Id">' . $sno . '</td>';
                echo '<td data-label="User ID">' . $userrow["rollno"] . '</td>';
                echo '<td data-label="Branch">' . $userrow["college"] . '</td>';
                echo '<td data-label="Mobile No.">' . $userrow["email"] . '</td>';
                echo '<td data-label="Action"><button class="button button3 x">Delete</button></td>';


                echo "</tr>";
                $sno++;
              } else if ($userrow['id'] == NULL) {
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



    <!-- Question add -->
    <!-- **************************************** -->

    <div class="userresult">
      <div class="container">
        <h1>Add Quiz</h1>
        <hr>
        <br>
        <form method="POST">
          <div class="mb-3">
            <label for="qtitle" class="form-label">Quiz Title</label>
            <input type="text" name="qtitle" class="form-control" id="qtitle" placeholder="Quiz Title">
          </div>
          <div class="mb-3">
            <label for="noq" class="form-label">Number of question</label>
            <input type="number" name="noq" class="form-control" id="noq" placeholder="Eg: 10">
          </div>
          <div class="mb-3">
            <label for="lang" class="form-label">Language</label>
            <select name="lang" id="lang" class="form-select" aria-label="Language">
              <option disabled selected>Select</option>
              <option value="eng">English</option>
              <option value="hin">Hindi</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="sub" class="form-label">Subject</label>
            <input type="text" name="sub" class="form-control" id="sub" placeholder="Eg: Java">
          </div>
          <div class="mb-3">
            <label for="subcd" class="form-label">Subject Code</label>
            <input type="text" name="subcd" class="form-control" id="subcd" placeholder="Eg: Java01">
          </div>
          <div class="mb-3">
            <label for="timedur" class="form-label">Time Duration(In seconds)</label>
            <input type="number" name="timedur" class="form-control" id="timedur" placeholder="Eg: 360">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    

      </div>
    </div>



  </section>
  <div class="delmsg"></div>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
      }
    }
  </script>

  <script src="../../jquery-3.6.0.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
  <script>
    $(document).ready(function() {

      // hiding elements
      // ************************


      $(".userdetail").show();
      $(".userresult").hide();



      // Navigating through different sections
      // ******************************

      $('#dash').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").show();
      })

      $('#categ').click(function() {

        $(".addcat").fadeIn(200);
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").hide();
      })


      $('#usr').click(function() {

        $(".addcat").hide();
        $(".userdetail").fadeIn(200);
        $(".userresult").hide();
        $(".schedule").hide();
        $(".dashbord").hide();

      })


      $('#rslt').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").fadeIn(200);
        $(".schedule").hide();
        $(".dashbord").hide();

      })

      $('#shedul').click(function() {

        $(".addcat").hide();
        $(".userdetail").hide();
        $(".userresult").hide();
        $(".schedule").fadeIn(200);
        $(".dashbord").hide();

      })





      // Deleting User Details
      // ***************************

      $(".x").click(function() {
        let userid = $(this).closest('tr').find("td:nth-child(2)").text();
        $(this).closest('tr').hide(200);
        alert(userid);
        $.post("../../Controllers/del.php", {
          uid: userid

        }, function(data) {
          $(".delmsg").html(data);
          // alert(data);
        });


      });
    });

    //
  </script>


</body>

</html>

                   <!-- Add quiz  -->
<!-- ******************************************** -->

<?php

if(isset($_POST["qtitle"]))
{
  $qtitle = $_POST["qtitle"];
  $noq = $_POST["noq"];
  $lang = filter_input(INPUT_POST, "lang" , FILTER_SANITIZE_STRING);
  $sub = $_POST["sub"];
  $subcd = $_POST["subcd"];
  $timedur = $_POST["timedur"];


  $sql3 = "INSERT INTO quizes VALUES( NULL , '$qtitle', '$noq','$lang',' $sub',' $subcd','$timedur')";

  $rs3 = mysqli_query($connect , $sql3);
  if($rs3)
  {
    echo "
    <script type='text/javascript'>

    let cnf = confirm('Do you want to add question?');
    if(cnf==true)
    {
      window.location.href= 'addques.php';
    }else{
      alert('Quiz Added Successfully!!!!!!')
    }

    
    </script>
    ";

  }

}

?>

