<?php
	include 'classes/Examination.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	include 'classes/Batch.php';
	if(isset($_REQUEST['createExamBtn']))
	{
		$con=new Config;
		$conn=$con->createCon();
		$ins="INSERT INTO `log_user`(`user`,`password`,`type`) VALUES ('".$_REQUEST['username']."','".md5($_REQUEST['password'])."','staff')";
		mysqli_query($conn,$ins);
		header("location:createUser.php?id=".$_REQUEST['username']);
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
<script language="javascript" type="text/javascript">

function getXMLHTTP() 
{
	//fuction to return the xml http object
	var xmlhttp=false;	
	try
	{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)	
	{		
		try
		{			
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e1)
			{
				xmlhttp=false;
			}
		}
	}
	return xmlhttp;
}
	
function findTotQues(mod) 
{		
	var strURL="findTotQue.php?mod="+mod;
	var req = getXMLHTTP();
	if (req) 
	{
		req.onreadystatechange = function() 
		{
		if (req.readyState == 4) 
		{
			// only if "OK"
			if (req.status == 200) 
			{			
				//alert(req.responseText);			
				document.getElementById('tot_que').value=req.responseText;						
			} 
			else 
			{
				alert("There was a problem while using XMLHTTP:\n" + req.statusText);
			}
		}				
	}			
		req.open("GET", strURL, true);
		req.send(null);
	}
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
	<?php echo "User Created Successfully."; ?>
    <br>
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='createUser.php';">
    
    </div>
	<div id="fade1" class="black_overlay1"></div>
<?php
}

if(isset($_REQUEST['msg']))
{
?>
	<div id="light1" class="white_content1" style="text-align:center;">
    <br>
	<?php echo $_REQUEST['msg']; ?>
    <br>
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='createUser.php';">
    
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
				<h2>Create User</h2>
				<form class="form-horizontal" role="form" action="" method="post">
				
				<div class="form-group">
                	<label class="control-label col-sm-3" for="email">Username:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="" name="username" placeholder="Enter User Name">
					</div>
				</div>
                <div class="form-group">
                	<label class="control-label col-sm-3" for="email">Password:</label>
					<div class="col-sm-3">
					<input type="password" class="form-control" required value="" name="password" placeholder="Enter Password">
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
            <h3>List Of User</h3>
			<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			<tr>
				<th>Sl no.</th>
                <th>User Id</th>
                <th>Password</th>
			</tr>
			</thead>
			<tbody>
            <?php
$sql="Select * from log_user where type='staff'";
$con=new Config;
$conn=$con->createCon();
$getExam=mysqli_query($conn,$sql);
$i=1;
while($row=mysqli_fetch_array($getExam))
{
?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['user'];?></td>
                <td><?php echo $row['password'];?></td>
			</tr>
<?php
	$i++;
}
?>
    </tbody>
  </table>
			</div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bsjquery.js"></script>
</body>
</html>