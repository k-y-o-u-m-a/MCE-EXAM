<?php
	include 'classes/Config.php';
	include 'classes/ExamResult.php';
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
<?php
	$con=new Config;
	$conn=$con->createCon();
	$sqlDate="SELECT DISTINCT `exam_date` FROM `exam_result` Order By id ASC";
	$resDate=mysqli_query($conn,$sqlDate);
?>
<body>
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        		<?php include 'common/header.html';?>
			</div>
            <div class="col-md-12">
        		<?php include 'common/admin_menu.html';?>
			</div>
            <div class="col-sm-12">
            	<h3>Examination Result</h3>
				<?php
                while($rowDate=mysqli_fetch_array($resDate))
				{
				?>
                <div class="col-sm-2">
				<ul class="nav nav-pills">
					<li class="active">
                    	<a href="<?php echo 'examResultByDate.php?date='.$rowDate['exam_date']; ?>">
                    		<?php echo $rowDate['exam_date']; ?>
                    	</a>
                    </li>
				</ul>
                </div>
                <?php
				}
				?>
                
			</div>
            <div class="col-sm-12" style="background:#ffab62;width:100%;height:25px;position:absolute;bottom:0;left:0;">
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>