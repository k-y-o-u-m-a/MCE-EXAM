<?php
include 'classes/Config.php';
$conn=new Config;
$con=$conn->createCon();
//$sql="Select * from question where module='".$_REQUEST['mod']."'";
//$sql1="Select * from exam_result where candidate_id='".$_REQUEST['user']."'";
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET names=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET collation_connection=utf8_general_ci');
$sql="Select question.que_desc,question.option1,question.option2,question.option3,question.option4,question.correct_answer,user_answer.user_ans from question INNER JOIN user_answer ON user_answer.session_id='".md5($_REQUEST['user'])."' && question.module='".$_REQUEST['mod']."' && question.qId=user_answer.que_id";
$sql1="Select * from exam_result where candidate_id='".$_REQUEST['user']."'";
require('WriteHTML.php');

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
$htmlTable1='<TABLE>
<TR><TD>Roll No. = '.$_REQUEST['user'].'</TD><TD>Candidate Name = '.$_REQUEST['name'].'</TD></TR>
<TR><TD>Exam Date = '.$row1['exam_date'].'</TD><TD>Total Question = '.$row1['total_que'].'</TD></TR>
<TR><TD>Question Attempted = '.$row1['total_attempt'].'</TD><TD>Correct Answer = '.$row1['total_mark'].'</TD></TR>
<TR><TD>Not Attempted = '.$row1['not_attempt'].'</TD><TD>Marks Obt. = '.$row1['percent'].'</TD></TR>'
;


$htmlTable1.='</TABLE>';

$pdf->WriteHTML2("$htmlTable1");

while($row=mysqli_fetch_array($res))
{
$status="";
if($row['user_ans']==$row['correct_answer'])
	$status="Right";
else
	$status="Wrong";
$a='';
if(isset($row['user_ans']))
	$a=$row['user_ans'];
else
	$a='Not attempted.';
$htmlTable='<TABLE>
<TR><TD>Question '.$i.':</TD><TD>'.$row['que_desc'].'</TD></TR>
<TR><TD>Option 1: '.$row['option1'].'</TD><TD>Option 2: '.$row['option2'].'</TD></TR>
<TR><TD>Option 3: '.$row['option3'].'</TD><TD>Option 4: '.$row['option4'].'</TD></TR>
<TR><TD>Correct Answer: '.$row['correct_answer'].'&nbsp;&nbsp;&nbsp;Your Answer: '.$a.'</TD><TD>Status: '.$status.'</TD></TR>';



$htmlTable.='</TABLE>';

$pdf->WriteHTML2("$htmlTable");
$i++;
}
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>