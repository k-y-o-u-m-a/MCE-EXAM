<?php
	include 'classes/Batch.php';
	include 'classes/Config.php';
	if(isset($_REQUEST['createBatchBtn']))
	{
		$batchName='B'.$_REQUEST['batchName'];
		$startTime=$_REQUEST['startTime'];
		$repTime=$_REQUEST['reportTime'];
		$con=new Config;
		$conn=$con->createCon();
		$exam=new Batch;
		$exam->createBatch($conn,$batchName,$startTime,$repTime);
		$con->closeCon();
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
				<h2>Create Batch</h2>
				<form class="form-horizontal" role="form" action="" method="post">
				<div class="form-group">
					<label class="control-label col-sm-3" for="email">Batch No:</label>
					<div class="col-sm-3">
					<input type="number" class="form-control" required value="" name="batchName" placeholder="Batch No.">
					</div>
				</div>
                
                <?php date_default_timezone_set('Asia/Kolkata');?>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Start Time</label>
					<div class="col-sm-3">          
					<input type="text" class="form-control" required value="<?php echo date("h:i A");?>" name="startTime" placeholder="Start Time">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Reporting Time:</label>
					<div class="col-sm-3">          
					<input type="text" value="<?php echo date("h:i A");?>" name="reportTime" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="createBatchBtn">Submit</button>
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