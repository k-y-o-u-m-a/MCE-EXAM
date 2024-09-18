<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
	include 'classes/Module.php';
	if(isset($_REQUEST['generate']))
	{
	$con=new Config;
	$conn=$con->createCon();
	// modify start 
	$module=$_REQUEST['moduleName'];
	$sql_module_no="SELECT DISTINCT `userid` FROM user_master where module={$module}";
	$res_module_no=mysqli_query($conn,$sql_module_no);
	$userid_modulewise=array();
	$zc=0;
	while($row_module_no=mysqli_fetch_assoc($res_module_no))
	{
		$userid_modulewise["$zc"]=$row_module_no['userid'];
		$zc++;
	}
	
	$f_user_id=implode("','",$userid_modulewise);
	//echo $f_user_id;
	//modify close
	$sql="SELECT DISTINCT `user_id` FROM `user_answer` where user_id in('".$f_user_id."')";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		$candId="";
		$module=$_REQUEST['moduleName'];
		$candAns="";
		$totQue=$_REQUEST['tq'];
		$markPerQue=$_REQUEST['mpq'];
		$negMark=$_REQUEST['npq'];
		$rightAns=0;
		$wrongAns=0;
		$totAttempt=0;
		$notAttempt=0;
		$totMark=0;
		$bonus=$_REQUEST['bm'];
		$gTotal=0;
		$array=array();
		//$sql1="SELECT * FROM `user_answer` where user_id='".$row['user_id']."'";
		$sql1="SELECT * FROM `user_answer` where user_id='".$row['user_id']."' and user_ans in('A','B','C','D')";
		$res1=mysqli_query($conn,$sql1);
		//changed
		$rowcount=mysqli_num_rows($res1);
		while($row1=mysqli_fetch_array($res1))
		{
			if($row1['user_ans']==$row1['right_answer'])
				$rightAns++;
			if($row1['user_ans']!=$row1['right_answer'])
				$wrongAns++;
			$array[$row1['que_id']]=$row1['user_ans'];
			$totAttempt=$rowcount;
			$notAttempt=$totQue-$totAttempt;
			$candId=$row1['user_id'];
			$examDate=date("d-m-Y");
		}
		$candAns=mysql_escape_string(serialize($array));
		$totMark=$rightAns*$markPerQue;
		$negMark=$wrongAns*$negMark;
		$gTotal=($totMark-$negMark)+$bonus;
		$examResult=new ExamResult;
		$examResult->evaluateExamResult($conn,$candId,$module,$totQue,$candAns,$totAttempt,$notAttempt,$totMark,$negMark,$gTotal,$examDate);
	}
			$con->closeCon();
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css"><title>ETP</title>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
			<div class="col-md-12">
				<h2>Generate Result</h2>
				<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label col-sm-3" for="email">Module Name:</label>
<?php
					$con=new Config;
					$conn=$con->createCon();
					$mod=new Module;
					$getMod=$mod->getModule($conn);
?>
					<div class="col-sm-3">
					<select class="form-control" name="moduleName">
                    <option selected value="">--Select Module--</option>
<?php
					while($row=mysqli_fetch_assoc($getMod))
					{
?>
			<option value="<?php echo $row['module_description'];?>"><?php echo $row['module_description'];?></option>
<?php
					}
?>
                    </select>
					</div>
                    <label class="control-label col-sm-3" for="pwd">Marks per question :</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="eg.- 1,2,3" value="" name="mpq" class="form-control">
                    </div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Negative Marks per question :</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="eg.- 0.25,0.50,0.75,1" value="" name="npq" class="form-control">
					</div>

					<label class="control-label col-sm-3" for="pwd">Bonus marks :</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="eg.- 1,2,3" value="" name="bm" class="form-control">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Total question :</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="eg.- 50,60,100" value="" name="tq" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="generate">Generate</button>
				</div>
			</div>
			</form>
			</div>
            <div class="col-md-12">
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>