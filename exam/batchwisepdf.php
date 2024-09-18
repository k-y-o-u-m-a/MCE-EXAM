<?php
include 'classes/Config.php';
require('WriteHTML.php');
$conn=new Config;
$con=$conn->createCon();
if(isset($_REQUEST['name1']))
{
	$cnt="Select * from exam_result";
	$resCnt=mysqli_query($con,$cnt);
	while($rowCnt=mysqli_fetch_array($resCnt))
	{
//$sql="Select * from question where module='".$_REQUEST['mod']."'";
//$sql1="Select * from exam_result where candidate_id='".$_REQUEST['user']."'";
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET names=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET collation_connection=utf8_general_ci');
$sql="Select question.que_desc,question.option1,question.option2,question.option3,question.option4,question.correct_answer,user_answer.user_ans from question INNER JOIN user_answer ON user_answer.session_id='".md5($rowCnt['candidate_id'])."' && question.module='".$rowCnt['module']."' && question.qId=user_answer.que_id";
$sql1="Select * from exam_result where candidate_id='".$rowCnt['candidate_id']."'";


$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->SetFont('Arial','B',7);
$res=mysqli_query($con,$sql);
$res1=mysqli_query($con,$sql1);
if($row1=mysqli_fetch_array($res1))

$i=1;
$pdf->Cell(0,5,'Roll No. = '.$rowCnt['candidate_id'],0,1);
$pdf->Cell(5,5,'Candidate Name = '.$rowCnt['candidate_id'],0,2);
$pdf->Cell(0,5,'Exam Date ='.$row1['exam_date'],0,1);

$pdf->Cell(0,5,'Total Question = '.$row1['total_que'],0,1);
$pdf->Cell(0,5,'Question Attempted = '.$row1['total_attempt'],0,1);
$pdf->Cell(0,5,'Correct Answer = '.$row1['total_mark'],0,1);
$pdf->Cell(0,5,'Not Attempted = '.$row1['not_attempt'],0,1);

$pdf->Cell(0,5,'Marks Obt. = '.$row1['percent'],0,1);

while($row=mysqli_fetch_array($res))
{
$status="";
if($row['user_ans']==$row['correct_answer'])
	$status="Right";
else
	$status="Wrong";
$htmlTable='<TABLE>
<TR><TD>Question '.$i.':</TD><TD>'.$row['que_desc'].'</TD></TR>
<TR><TD>Option 1:</TD><TD>'.$row['option1'].'</TD></TR>
<TR><TD>Option 2:</TD><TD>'.$row['option2'].'</TD></TR>
<TR><TD>Option 3:</TD><TD>'.$row['option3'].'</TD></TR>
<TR><TD>Option 4:</TD><TD>'.$row['option4'].'</TD></TR>
<TR><TD>Correct Answer:</TD><TD>'.$row['correct_answer'].'</TD></TR>
<TR><TD>Your Answer:</TD><TD>'.$row['user_ans'].'</TD></TR>
<TR><TD>Status:</TD><TD>'.$status.'</TD></TR>';


$htmlTable.='</TABLE>';

$pdf->WriteHTML2("$htmlTable");
$i++;
}
$pdf->SetFont('Arial','B',6);

$sqlBat="Select batch from user_master where userid='".$rowCnt['candidate_id']."'";
$resBat=mysqli_query($con,$sqlBat);
$rowBat=mysqli_fetch_array($resBat);
$p=date('ymd_').$rowBat['batch'];
if (!is_dir($p))
	mkdir($p);
$path=$p.'/'.$rowCnt['candidate_id'].'.pdf';
$pdf->Output($path); 
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
<title>Admin</title>
<form action="" method="post">
<div class="container-fluid">
<div class="col-md-12">
<?php include 'common/header.html';?>
</div>
<div class="col-md-12">
<?php include 'common/admin_menu.html';?>
</div>
<br><br>
<div class="col-md-12" style="text-align:center;">
<input type="submit" name="name1" class="btn btn-primary" value="Generate PDF" />
</div>
</form>
</div>
</head>
</html>