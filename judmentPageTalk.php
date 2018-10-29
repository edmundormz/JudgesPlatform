<?php
include_once 'database.php';
include_once 'updateValuesTalk.php';
session_start();



if(isset($_POST['saveJud']))
{


$_SESSION['id']=$_POST['judge_id'];

$_SESSION['name_judge']= str_replace("'","\'",$_POST['judge_name']);




$wwid_judge=$_POST['judge_id'];
$judge_name=str_replace("'","\'",$_POST['judge_name']);



mysqli_query($conn,"insert into Judges (judge_id, judge_name) VALUES ('$wwid_judge', '$judge_name') ");










}

?>
<!DOCTYPE html>
<html>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <img src="/img/header.jpg" height="15%" width="100%">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.rawgit.com/resir014/Clear-Sans-Webfont/v1.1.1/css/clear-sans.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
   <!-- Start Section 0 -->
   <body   style="background-color:#F3F3F3;" >

<h1  align="center" style=" color:#003C71;font-size:40px; font-family:Clear Sans, sans-serif; " >Intel Talks</h1>

      <form   accept-charset="UTF-8" id="myForm" method="post" action="#">
         <div class="section" style="background: #f3f3f3 !important;">
            <div class="container">
               <div class="col-6 col-md-4"  style="width:100%;overflow:auto;color:#003C71;">
                  <br>
 <label class="form-check-label" for="exampleCheck1">Search by project name:</label>

 <select id="mySelect" onchange="myFunction()" required style="color:#003C71; font-size:large;  width:99%;" name="cat";  >
<?php

 // $result = mysqli_query($conn,"Select * from IntelTalk");
 $result = mysqli_query($conn,"Select * from IntelTalk WHERE judge_id='".$_SESSION['id']."' and evaluated='0'");

echo'  <option value="" selected disabled hidden>Choose here</option>';
  while($row = $result->fetch_assoc()) {

// echo '<option name="search" value="'.$row['talk_id'].'">'.$row['talk_name'].'</option>';
 echo '<option name="search" value="'.$row['intel_talk_id'].'">'.$row['talk_name'].'</option>';

  }
 echo "</select><br><br>";

?>


</div>
</div>
</div>

<!--<p id="demo"></p>-->
<input type="text" name="user" hidden id="demo">



      </form>


  <form accept-charset="UTF-8" method="post" action="">

<div class="section" style="background: #f3f3f3 !important;">
            <div class="container">
                <div class="col-6 col-md-4"  style="width:100%;overflow:auto;color:#003C71;">
<?php

include_once 'database.php';

$valor=$_POST['user'];



echo '<input type="text" name="userN" hidden value="'.$valor.'" id="de">';

$result = mysqli_query($conn,"Select * from IntelTalk where intel_talk_id=".$valor);
//echo $valor;

$val=20;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo '  <label style= "color:#003C71;font-size:large; font-family:Clear Sans, sans-serif;   width:100%;">';
    echo  ' Project Name(s):  '.$row{'talk_name'}.'</label>';
    echo '  <label style= "color:#003C71;font-size:large; font-family:Clear Sans, sans-serif;   width:100%;">';
    echo  ' Owner(s) Name(s):  '.$row{'owner_name'}.'</label>';
    echo '<label style= "color:#003C71;font-size:large; font-family:Clear Sans, sans-serif;   width:100%;">';
    echo 'Description: '.$row{'description'}.' </label> ';
    //echo '<input type="text" name="id_" hidden value="'.$row{'demo_id'}.'">';
    echo '<input type="text" name="id_talk" hidden value="'.$row{'talk_id'}.'">';


      }
}
?>
<br>
<br>




<table style= "color:#003C71;font-size:large; font-family:Clear Sans, sans-serif;   width:100%;">
<tr><td> Cost Reduction
<div class="slidecontainer" style="width:90%">
 <input name="cost" type="range" min="1" max="100"value="50" class="slider" id="myRange">
</div>
</td>
<td> Impact
<div class="slidecontainer">
  <input name="impact" type="range" min="1" max="100"value="50" class="slider" id="myRange">
</div></td>
</tr>

<tr><td> New Technology
<div class="slidecontainer" style="width:90%">
 <input name="new" type="range" min="1" max="100"value="50" class="slider" id="myRange">
</div>
</td>
<td> Collaboration
<div class="slidecontainer">
  <input name="collaboration" type="range" min="1" max="100"value="50" class="slider" id="myRange">
</div></td>
</tr>
<tr>
<td>   Documentation
<div class="slidecontainer" style="width:90%">
  <input name="documentation" type="range" min="1" max="100"value="50"    style= "color:#003C71;" class="slider" id="myRange">
</div>
</td>

<td> Speech Quality
<div class="slidecontainer">
 <input name="speech" type="range" min="1" max="100"value="50" class="slider" id="myRange">
</div>

</td>
</tr>
</table>


  <label for="comment">Comment:</label>
  <textarea  class="form-control" cols="8" rows="5" value="" name="comment"></textarea>


                  <br>

    <button id="image" type="submit"  width="50" height="20"  style="width:118px; height:48px;"  name="saveValue">
                          Send evaluation</button>


               </div>
            </div>



         </div>
    <div class="section" style="background: #003C71!important;">

            <p style=" font-size:large; font-family: Intel Clear Bold;">
         </div>



      </form>
      <!-- End Section 0 -->


<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    //document.getElementById("demo").innerHTML = "You selected: " + x;
    document.getElementById("demo").value=x;
    submitVal = $('#submitButton').val();
    document.getElementById("myForm").submit();

}

</script>
   </body>
</html>
