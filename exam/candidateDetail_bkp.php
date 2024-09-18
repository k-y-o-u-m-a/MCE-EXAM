<?php
	session_start();
	include 'classes/Config.php';	
	$conn=new Config;
	$con=$conn->createCon();
	if(isset($_REQUEST['save']))
	{
		$candName=$_REQUEST['candName'];
		if(isset($_REQUEST['pre_center_address']))
			$address=$_REQUEST['pre_center_address'];
		if(isset($_REQUEST['post_center_address']))
			$address=$_REQUEST['post_center_address'];
		$mobile=$_REQUEST['mobile'];
		$altMobile=$_REQUEST['altMobile'];
		if(isset($altMobile))
			$mobile.=','.$altMobile;
		$emailId=$_REQUEST['emailId'];
		$sql="Insert into user_master(SName,Address,Contact_no,Email_id) values('".$candName."','".$address."','".$mobile."','".$emailId."')";
		mysqli_query($con,$sql);
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
				<h2>:: Candidate Entry Form ::</h2>
				<form role="form" action="" method="post">
				<div class="form-group">
				<input type="text" class="form-control" name="candName" placeholder="Candidate Full Name" required>
				</div>
				<div class="form-group">
                <select name="pre_center_address" class="form-control" required onChange="getCenter(this.value);" onBlur="getCenter(this.value);">
                <option value="" selected>Select Center Address</option>
                <?php
                	$sql="Select Distinct Address from user_master where Address!='' Order By Address ASC";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
				?>
                	<option value="<?php echo $row['Address'];?>"><?php echo $row['Address'];?></option>
				<?php
					}
				?>
                <option value="addNewCenter">Add New Center</option>
                </select>
                </div>
                <div class="form-group" id="address" style="display:none;">
				<textarea class="form-control" name="post_center_address" placeholder="Enter Center Address" value="" required>

                </textarea>
				</div>
                <div class="form-group">
				<input type="text" class="form-control" name="emailId" placeholder="Email Address" required>
				</div>
                <div class="form-group">
				<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." required>
				</div>
                <div class="form-group">
				<input type="text" class="form-control" name="altMobile" placeholder="Enter Alternate Mobile No." required>
				</div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
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