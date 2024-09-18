<?php
	include 'classes/Module.php';
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	if(isset($_REQUEST['createModBtn']))
	{
		$modName=$_REQUEST['modName'];
		$totQue=$_REQUEST['tot_que'];
		if($totQue < 0)
			$totQue=intval($totQue*-1);
		$sql="SELECT count(*) FROM `module`";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res);
		$modDesc=$row['count(*)']+1;
		
		$exam=new Module;
		$exam->createModule($conn,$modName,$modDesc,$totQue);
		$con->closeCon();
		header("location:createModule.php?id=".$modName);
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
	<?php echo "Module successfully submitted."; ?>
    <br>
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='createModule.php';">
    
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
				<h2>Create Module</h2>
				<form class="form-horizontal" role="form" action="" method="post">
                <?php
$sql="SELECT count(*) FROM `module`";
$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res);
		$modDesc=$row['count(*)']+1;
?>
                <div class="form-group">
					<label class="control-label col-sm-3" for="email">Module Id:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="" name="" placeholder="<?php echo $modDesc;?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="email">Module Name:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="" name="modName" placeholder="Module Name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">No. of Question</label>
					<div class="col-sm-3">          
                    <input type="number" class="form-control" min="0" max="500" required value="" name="tot_que" placeholder="Total No. of Question">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="createModBtn">Submit</button>
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