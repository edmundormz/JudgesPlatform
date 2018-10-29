<?php
include_once 'database.php';
//echo "hola";
session_start();

if(isset($_POST['saveValue']))
{

$comment = str_replace("'","\'",$_POST['comment']);
$user=$_POST['userN'];
$impact=$_POST['impact'];
$new=$_POST['new'];
$collaboration=$_POST['collaboration'];
$documentation=$_POST['documentation'];
$cost=$_POST['cost'];
$project_id=$user;
$demo_id=$_POST['id_demo'];
$owner_name="lucero";
$impl=$_POST['implementation'];
$evaluator_id=$_SESSION['id'];


$link4=mysqli_query($conn,"update Project set evaluated='1' where project_id='".$project_id."'");



if (!$link4) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}






$link=mysqli_query($conn,"insert into PonderationDemo set impact='".$impact."', costReduction='".$cost."', demoImplementation='".$impl."', collaboration='".$collaboration."', documentation='".$documentation."',newTech='".$new."', demo_id='".$demo_id."', judge_id='".$evaluator_id."'");


$bestColl= (0.05 * $cost)+ (0.1 * $impact)+ (0.1 * $new)+(0.6 * $collaboration)+ (0.05 * $documentation) + (0.1 * $impl);
$bestEff=(0.6 * $cost)+ (0.1 * $impact)+ (0.05 * $new)+(0.1 * $collaboration)+ (0.05 * $documentation) + (0.1 * $impl);
$bestImpl=(0.1 * $cost)+ (0.05 * $impact)+ (0.05 * $new)+(0.1 * $collaboration)+ (0.1 * $documentation) + (0.6 * $impl);
$bestDoc=(0.05 * $cost)+ (0.1 * $impact)+ (0.05 * $new)+(0.1 * $collaboration)+ (0.6 * $documentation) + (0.1 * $impl);
$greatestImp=(0.05 * $cost)+ (0.6 * $impact)+ (0.1 * $new)+(0.15 * $collaboration)+ (0.0 * $documentation) + (0.1 * $impl);
$bestTech=(0.05 * $cost)+ (0.15 * $impact)+ (0.6 * $new)+(0.05 * $collaboration)+ (0.05 * $documentation) + (0.1 * $impl);





if (!$link) {
    echo "Error2: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



$link2=mysqli_query($conn,"insert into EvaluationPerJudgeDemo set CostReduction='".$bestEff."',Impact='".$greatestImp."', NewTechnology='".$bestTech."', Collaboration='".$bestColl."', Documentation='".$bestDoc."', Implementation='".$bestImpl."', demo_id='".$demo_id."', judge_id='".$evaluator_id."'");





if (!$link2) {
    echo "Error3: Unable to connect to MySQLASDAS." . PHP_EOL;
    echo "Debugging errno:ASDSA " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging errorASDASDAS: " . mysqli_connect_error() . PHP_EOL;
    exit;
}





echo "<script>  //confirm($field_prototype);

confirm('Thank you! evaluation sent! ');
//window.location.href= 'https://sp2010.amr.ith.intel.com/sites/gdcinnovation/_catalogs/masterpage/ShareBoot10-Home.aspx'; // the redirect goes here

</script>";
}

?>

