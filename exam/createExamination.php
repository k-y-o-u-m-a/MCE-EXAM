<?php
	include 'classes/Examination.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	include 'classes/Batch.php';
	if(isset($_REQUEST['createExamBtn']))
	{
		$start=$_REQUEST['examDate'];
		$module=$_REQUEST['examModule'];
		//$totQue=$_REQUEST['totQue'];
		$negMark=$_REQUEST['negMark'];
		$totTime=$_REQUEST['totalTime'];
		//$bilingual=$_REQUEST['bilingual'];
		$status='N';
		$con=new Config;
		$conn=$con->createCon();
		
		$sql="SELECT * FROM `module` WHERE `module_description`=".$module;
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res);
		
		$sql1="INSERT INTO `exam`(`exam_name`,`start_date`,`total_time`,`total_que`,`negative_mark`,`module`,`bilingual`, `status`) VALUES ('".$row['module_name']."','".$start."','".$totTime."','".$row['tot_que']."','".$negMark."',".$module.",'Y','N')";
		mysqli_query($conn,$sql1);
		//$exam=new Examination;
		//$exam->createExamination($conn,$examName,$start,$end,$totQue,$negMark,$batch,$module,$totTime,$bilingual,$status);
		$con->closeCon();
		header("location:createExamination.php?id=".$module);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css">
<style>
	.black_overlay
	{
		display: none;position: absolute;top: 0%;left: 0%;width: 100%;height: 120%;background-color: black;z-index:1001;-moz-opacity: 0.8;opacity:.80;filter: alpha(opacity=80);
	}
	.white_content
	{
		display: none;position: absolute;top: 15%;left: 15%;width: 75%;height: 90%;padding: 16px;border: 16px solid orange;background-color: white;z-index:1002;overflow: auto;
	}
	.black_overlay1
	{
		position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:black;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);
	}
	.white_content1
	{
		position:absolute;top:10%;left:35%;width:20%;height:25%;padding:16px;border:16px solid orange;background-color:white;z-index:1002;overflow:auto;
	}
</style>
<script>
	function closeDiv()
	{
		document.getElementById('light').style.display='none';
		document.getElementById('fade').style.display='none';
	}
	function closeDiv1()
	{
		document.getElementById('light1').style.display='none';
		document.getElementById('fade1').style.display='none';
	}
</script>
<title>ETP</title>
</head>

<body>
	<div class="container">
 <?php
if(isset($_REQUEST['id']))
{
?>
	<div id="light1" class="white_content1" style="text-align:center;">
    <br>
	<?php echo "Exam successfully created."; ?>
    <br>
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='manageExamination.php';">
    
    </div>
	<div id="fade1" class="black_overlay1"></div>
<?php
}
?>   
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
			<option value="<?php echo $row['module_description'];?>"><?php echo $row['module_name'];?></option>
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
					<input type="text" value="<?php echo date("d-m-Y");?>" name="examDate" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Negative Mark(If any):</label>
					<div class="col-sm-3">          
					<select class="form-control" name="negMark">
                    	<option value="0">0</option>
                        <option value="0.25">0.25</option>
                        <option value="0.50">0.50</option>
                        <option value="0.75">0.75</option>
                        <option value="1.0">1.0</option>
                    </select>
					</div>
				</div>
				<div class="form-group">
                	<label class="control-label col-sm-3" for="email">Total Time for Exam:</label>
					<div class="col-sm-3">
					<input type="number" class="form-control" required value="" name="totalTime" placeholder="eg. 120 (in minutes)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="createExamBtn">Submit</button>
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