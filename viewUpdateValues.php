<?php
include_once 'database.php';

$link2=mysqli_query($conn,"SELECT demo_id, SUM(CostReduction) as totalEff , sum(Collaboration) as totalColl , sum(NewTechnology) as totalTech, sum(Documentation) as totalDoc, sum(Implementation) as totalImpl,sum(Impact) as totalIm FROM EvaluationPerJudgeDemo  GROUP BY demo_id");

if (!$link2) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


while($row = $link2->fetch_assoc()) {

$project_id=$row['demo_id'];
$bestImp=$row['totalIm'];
$bestImpl=$row['totalImpl'];
$bestColl=$row['totalColl'];
$bestEff=$row['totalEff'];
$bestDoc=$row['totalDoc'];
$bestTech=$row['totalTech'];


$link3=mysqli_query($conn,"insert IGNORE into WinnersDemo set totalCost=".$bestEff.", totalColl=".$bestColl." , totalIm=".$bestImp.", totalTechInn=".$bestTech.", totalDoc=".$bestDoc.", totalDemo=".$bestImpl.", demo_id=".$project_id);


  if (!$link3) {
    echo "Erasaror: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugasging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debuggiassasng error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }


}






$link4=mysqli_query($conn,"SELECT talk_id, SUM(CostReduction) as totalEff , sum(Collaboration) as totalColl , sum(NewTechnology) as totalTech, sum(Documentation) as totalDoc, sum(SpeechQuality) as totalSpeech,sum(Impact) as totalIm FROM EvaluationPerJudgeTalk  GROUP BY talk_id");


if (!$link4) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


while($row = $link4->fetch_assoc()) {

$talk_id=$row['talk_id'];
$bestImp=$row['totalIm'];
$bestSpeech=$row['totalSpeech'];
$bestColl=$row['totalColl'];
$bestEff=$row['totalEff'];
$bestDoc=$row['totalDoc'];
$bestTech=$row['totalTech'];





$link5=mysqli_query($conn,"INSERT INTO WinnersTalk (totalCost, totalColl, totalIm,totalTechInn,totalDoc,totalSpe,talk_id) VALUES(".$bestEff.",".$bestColl.",".$bestImp.",".$bestTech.",".$bestDoc.",".$bestSpeech." ,".$talk_id.") ON DUPLICATE KEY UPDATE totalCost=".$bestEff.", totalColl=".$bestColl." , totalIm=".$bestImp.", totalTechInn=".$bestTech.", totalDoc=".$bestDoc.", totalSpe=".$bestSpeech);
//INSERT INTO WinnersTalk (totalCost, totalColl, totalIm,totalTechInn,totalDoc,totalSpe,talk_id) VALUES(2,2,2,2,2,2 ,8) ON DUPLICATE KEY UPDATE totalCost=2, totalColl=6 , totalIm=2,totalTechInn=2, totalDoc=2, totalSpe=2 


//"insert IGNORE into WinnersTalk set totalCost=".$bestEff.", totalColl=".$bestColl." , totalIm=".$bestImp.",
// totalTechInn=".$bestTech.", totalDoc=".$bestDoc.", totalSpe=".$bestSpeech.", talk_id=".$talk_id);



  if (!$link5) {
    echo "Erasaror: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugasging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debuggiassasng error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }


}



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <img src="/img/pruebas.PNG" height="15%" width="100%">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.rawgit.com/resir014/Clear-Sans-Webfont/v1.1.1/css/clear-sans.css">
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  </head>

   <body   style="background-color:#F3F3F3; " >

<style>
table, th, td {
    border-right: 6px solid #f3f3f3;
    border-collapse: collapse;
    table-layout: fixed;    
}
th, td {
    padding: 5px;
    text-align: left;    
word-wrap:break-word;
}
</style>

<h1  align="center" style=" color:#003C71;font-size:40px; font-family:Clear Sans, sans-serif; " >Intel Talk</h1>


<table   style="background-color:#FFFFFF; color:#003C71 ; margin:auto; padding: 20px;  width:100% ; font-size:large; font-family:Clear Sans, sans-serif; "  >
  <tr>
    <th  style="width: 15%; color:#0071C5"  ><span class="fa fa-star checked"  color="#FFFFE0" ></span>The Biggest Cost Reducction</th>
    <th   style="width: 15%; color:#0071C5 "  > <span class="fa fa-star checked" color="#F3D54E"></span>The Biggest Impact Innovation</th>
    <th style="width: 15%;  color:#0071C5 "    > <span class="fa fa-star checked" color="#F3D54E"></span> The Most Advanced Technical Innovation</th>
    <th  style="width: 15%; color:#0071C5 "  > <span class="fa fa-star checked" color="#F3D54E"></span> The Greatest Collaboration</th>
    <th  style="width: 15%; color:#0071C5 "  > <span class="fa fa-star checked" color="#F3D54E"></span>  The Best Documented Innovation</th>
    <th  style="width: 15%; color:#0071C5 "  > <span class="fa fa-star checked" color="#F3D54E"></span> The Best Speech</th>
  </tr>
  <tr>

<?php

  $result = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalCost DESC LIMIT 0, 1");
  while($row = $result->fetch_assoc()) {
  $totalCost=$row['talk_id'];
  $result2 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalCost." order by talk_id asc limit 1 ");
     while($row = $result2->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }

  $result3 = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalIm DESC LIMIT 0, 1");
  while($row = $result3->fetch_assoc()){
  $totalImp=$row['talk_id'];
  $result4 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalImp." order by talk_id asc limit 1");
     while($row = $result4->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }

  $result5 = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalTechInn DESC LIMIT 0, 1");
  while($row = $result5->fetch_assoc()){
  $totalTech=$row['talk_id'];
  $result6 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalTech." order by talk_id asc limit 1");
     while($row = $result6->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }

  $result7 = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalColl DESC LIMIT 0, 1");
  while($row = $result7->fetch_assoc()){
  $totalCol=$row['talk_id'];
  $result8 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalCol." order by talk_id asc limit 1");
     while($row = $result8->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }


  $result9 = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalDoc DESC LIMIT 0, 1");
  while($row = $result9->fetch_assoc()){
  $totalDoc=$row['talk_id'];
  $result10 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalDoc." order by talk_id asc limit 1");
     while($row = $result10->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }

  $result11 = mysqli_query($conn,"SELECT * FROM WinnersTalk ORDER BY totalSpe DESC LIMIT 0, 1");
  while($row = $result11->fetch_assoc()){
  $totalSpe=$row['talk_id'];
  $result12 = mysqli_query($conn,"SELECT * FROM IntelTalk where talk_id=".$totalSpe." order by talk_id asc limit 1");
     while($row = $result12->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['talk_name']."</td>";
     }
  }

?>

  </tr>
   <tr></tr>
    <tr>
  </tr>
</table>

<br><br>

<h1 align="center" style=" color:#003C71;font-size:40px; font-family:Clear Sans, sans-serif; " >Demo Fair</h1>
<table  style="background-color:#FFFFFF; margin:auto; padding: 20px;  width:100% ; color:#003C71;font-size:large; font-family:Clear Sans, sans-serif; " >
  <tr>
    <th style="width: 15%; color:#0071C5 " > <span class="fa fa-star checked" color="#F3D54E"></span>    The Biggest Cost Reducction</th>
    <th  style="width: 15%; color:#0071C5 " >  <span class="fa fa-star checked" color="#F3D54E"></span>  The Biggest Impact Innovation</th>
    <th  style="width: 15%; color:#0071C5 " >   <span class="fa fa-star checked" color="#F3D54E"></span>  The Most Advanced Technical Innovation</th>
    <th   style="width: 15%; color:#0071C5 "> <span class="fa fa-star checked" color="#F3D54E"></span>    The Greatest Collaboration</th>
    <th style="width: 15%; color:#0071C5 "> <span class="fa fa-star checked" color="#F3D54E"></span>    The Best Documented Innovation</th>
    <th style="width: 15%; color:#0071C5 ">   <span class="fa fa-star checked" color="#F3D54E"></span> The Best Demo</th>
  </tr>
  <tr>

<?php

  $result13 = mysqli_query($conn,"SELECT * FROM WinnersDemo ORDER BY totalCost DESC LIMIT 0, 1");
  while($row = $result13->fetch_assoc()){
  $totalCostD=$row['demo_id'];
  $result14 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalCostD." order by demo_id asc limit 1");
     while($row = $result14->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."<br></td>";

     }
  }


  $result15 = mysqli_query($conn,"SELECT * FROM WinnersDemo  ORDER BY totalIm DESC LIMIT 0, 1");
  while($row = $result15->fetch_assoc()){
  $totalImD=$row['demo_id'];
  $result16 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalImD." order by demo_id asc limit 1");
     while($row = $result16->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."</td>";
     }
  }



  $result17 = mysqli_query($conn,"SELECT * FROM WinnersDemo ORDER BY totalTechInn DESC LIMIT 0, 1");
  while($row = $result17->fetch_assoc()){
  $totalNewD=$row['demo_id'];
//SELECT * FROM Project where demo_id="8" order by demo_id asc limit 1
  $result18 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalNewD." order by demo_id asc limit 1");
     while($row = $result18->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."</td>";
     }
  }


  $result19 = mysqli_query($conn,"SELECT * FROM WinnersDemo ORDER BY totalColl DESC LIMIT 0, 1");
  while($row = $result19->fetch_assoc()){
  $totalCollD=$row['demo_id'];
  $result20 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalCollD." order by demo_id asc limit 1");
     while($row = $result20->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."</td>";
     }
  }


  $result21 = mysqli_query($conn,"SELECT * FROM WinnersDemo ORDER BY totalDoc DESC LIMIT 0, 1");
  while($row = $result21->fetch_assoc()){
  $totalDocD=$row['demo_id'];
  $result22 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalDocD." order by demo_id asc limit 1");
     while($row = $result22->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."</td>";
     }
  }


  $result23 = mysqli_query($conn,"SELECT * FROM WinnersDemo ORDER BY totalDemo DESC LIMIT 0, 1");
  while($row = $result23->fetch_assoc()){ 
  $totalDemo=$row['demo_id'];
  $result24 = mysqli_query($conn,"SELECT * FROM Project where demo_id=".$totalDemo." order by demo_id asc limit 1");
     while($row = $result24->fetch_assoc()) {
        echo "<td style='width: 15%;'>".$row['project_name']."</td>";
     }
  }



?>
  </tr>
   <tr></tr>
    <tr>
  </tr>
</table>
<br>
<br>
</body>
</html>



