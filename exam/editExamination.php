<?php
	include 'classes/Examination.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	include 'classes/Batch.php';
	if(isset($_REQUEST['updateExamBtn']))
	{
		$id=$_REQUEST['id'];
		$examName=$_REQUEST['examName'];
		$start=$_REQUEST['examDate'];
		$end=$_REQUEST['examDate'];
		$batch=$_REQUEST['examBatch'];
		$module=$_REQUEST['examModule'];
		$totQue=$_REQUEST['totQue'];
		$negMark=$_REQUEST['negMark'];
		$totTime=$_REQUEST['totalTime'];
		$bilingual=$_REQUEST['bilingual'];
		$status='N';
		$con=new Config;
		$conn=$con->createCon();
		$exam=new Examination;
		$exam->updateExamination($conn,$id,$examName,$start,$end,$totQue,$negMark,$batch,$module,$totTime,$bilingual,$status='N');
		$con->closeCon();
	}
	
	$con=new Config;
	$conn=$con->createCon();
	$exam=new Examination;
	$getExam=$exam->getExamDetail($conn,$_REQUEST['id']);
	//$que="";
	while($row=mysqli_fetch_array($getExam))
	{
		$examName=$row['exam_name'];
		$startDate=$row['start_date'];
		$endDate=$row['end_date'];
		$totQue=$row['total_que'];
		$batch=$row['batch'];
		$examMod=$row['module'];
		$negMark=$row['negative_mark'];
		$totTime=$row['total_time'];
		$bilingual=$row['bilingual'];
		$status=$row['status'];
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<title>ETP</title>
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
				<h2>Create Examination</h2>
				<form class="form-horizontal" role="form" action="" method="post">
				<div class="form-group">
					<label class="control-label col-sm-3" for="email">Exam Name:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="<?php echo $examName;?>" name="examName">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Module</label>
					<div class="col-sm-3">
<?php
					$con=new Config;
					$conn=$con->createCon();
					$mod=new Module;
					$getMod=$mod->getModule($conn);
?>        
					<select class="form-control" name="examModule">
<?php
					while($row=mysqli_fetch_assoc($getMod))
					{
?>
		<option value="<?php echo $row['id'];?>" <?php if($row['id']==$examMod) echo 'selected';?>>
			<?php echo $row['module_description'];?>
		</option>
<?php
					}
					//$con->closeCon();
?>
                    </select>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Batch</label>
					<div class="col-sm-3">          
					<select class="form-control" name="examBatch">
<?php
					$bat=new Batch;
					$getBat=$bat->getBatch($conn);
					while($row=mysqli_fetch_assoc($getBat))
					{
?>
		<option value="<?php echo $row['id'];?>" <?php if($row['id']==$batch) echo 'selected';?>>
			<?php echo $row['batch_code'].' - ('.$row['start_time'].' to '.$row['end_time'].')';?>
        </option>
<?php
					}
					//$con->closeCon();
?>
                    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Exam Date:</label>
					<div class="col-sm-3">          
					<input type="text" value="<?php echo $startDate;?>" name="examDate" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">No. of Questions:</label>
					<div class="col-sm-3">          
					<input type="text" value="<?php echo $totQue;?>" name="totQue" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Negative Mark(If any):</label>
					<div class="col-sm-3">          
					<select class="form-control" name="negMark">
                    	<option value="0" <?php if($negMark==0) echo 'selected'?>>0</option>
                        <option value="0.25" <?php if($negMark==0.25) echo 'selected'?>>0.25</option>
                        <option value="0.50" <?php if($negMark==0.50) echo 'selected'?>>0.50</option>
                        <option value="0.75" <?php if($negMark==0.75) echo 'selected'?>>0.75</option>
                        <option value="1.0" <?php if($negMark==1.0) echo 'selected'?>>1.0</option>
                    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Bilingual:</label>
					<div class="col-sm-3">          
						<input type="radio" name="bilingual" value="Y" <?php if($bilingual=='Y') echo 'checked';?>>Yes
                        <input type="radio" name="bilingual" value="N" <?php if($bilingual=='N') echo 'checked';?>>No
					</div>
				</div>
                <div>
                	<label class="control-label col-sm-3" for="email">Total Time for Exam:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="<?php echo $totTime;?>" name="totalTime" placeholder="eg. 120 (in minutes)">
					</div>
                </div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="updateExamBtn">Update</button>
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