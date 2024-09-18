<?php
	session_start();
	include 'classes/Config.php';	
	$conn=new Config;
	$con=$conn->createCon();
	$msg="";
	if(isset($_REQUEST['save']))
	{
		$candName=$_REQUEST['candName'];
		$cenAddress=$_REQUEST['cenAddress'];
		$candEmail=$_REQUEST['candEmail'];
		$candMob=$_REQUEST['candMob'];
		$candDd=$_REQUEST['candDd'];
		
		$length = 4;
		$characters = "0123456789";
		$string = '';
		for($i=0;$i<$length;$i++)
		{
			$index=mt_rand(0,strlen($characters)-1);
			$string.=$characters[$index];
		}
		$userid='TCE'.$string;
		$sql1="Select * from user_master where Formno='".$userid."'";
		$res1=mysqli_query($con,$sql1);
		if(mysqli_num_rows($res1)==0)
		{
		$sql="Insert into user_master(SName,Address,userid,password,reg_no,Contact_no,Email_id,module,lock_login,DD_Number) values('".$candName."','".$cenAddress."','".$userid."','".$userid."','".$userid."','".$candMob."','".$candEmail."','6','N','".$candDd."')";
		//echo $sql;
		mysqli_query($con,$sql);
		header("location:index.php?un=".$userid);
		}
		else
		{
			$msg="Try again !!!";
		}
		//echo 'Username = '.$userid;
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
				<h2>:: Candidate Registration Form ::</h2>
				<form role="form" action="" method="post">
                <div class="row">
					<div class="form-group col-lg-4">
				<input type="text" class="form-control" name="candName" placeholder="Candidate Full Name" required>
					</div>
                </div>
<?php

?>
                <div class="row">
					<div class="form-group col-lg-4">
                <select class="form-control" name="cenAddress">
                	<option value="">Select Institute</option>
<?php
$centre="SELECT * FROM `center_master` Order By `center_address` ASC";
$resCentre=mysqli_query($con,$centre);
while($rowCentre=mysqli_fetch_array($resCentre))
{
?>
					<option value="<?php echo $rowCentre['center_address'];?>">
					<?php echo $rowCentre['center_address'];?>
                    </option>
<?php
}
?>
                </select>
					</div>
                </div>
                <div class="row">
					<div class="form-group col-lg-4">
				<input type="email" class="form-control" name="candEmail" placeholder="Email id" required>
					</div>
                </div>
                <div class="row">
                	<div class="form-group col-lg-4">
				<input type="text" class="form-control" name="candMob" placeholder="Mobile No." required>
					</div>
                </div>
                <div class="row">
                	<div class="form-group col-lg-4">
				<input type="text" class="form-control" name="candDd" placeholder="Demand Draft No." required>
					</div>
                </div>
                <div class="row">
                	<div class="form-group col-lg-4">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                	</div>
                </div>
                <div class="row">
                	<div class="form-group" style="color:#F00;">
				<b><?php echo $msg;?></b>
                	</div>
                </div>
				</form>
			</div>            
		</div>            
            </div>
            <div class="col-md-12" style="background:#ffab62;width:100%;height:25px;position:absolute;bottom:0;left:0;">
				<?php include 'common/footer.html';?>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
<script type="text/javascript">
	function getCenter(value)
	{
		if(value=='addNewCenter')
		{
			document.getElementById('address').style.display='block';
		}
		if(value!='addNewCenter')
		{
			document.getElementById('address').style.display='none';
		}
		if(value=='')
		{
			alert('Select Center Address');
		}
	}
</script>
</body>
</html>