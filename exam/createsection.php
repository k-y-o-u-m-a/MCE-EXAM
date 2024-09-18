<?php
	include 'classes/Examination.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	include 'classes/Batch.php';
	if(isset($_REQUEST['createExamBtn']))
	{
		$con=new Config;
		$conn=$con->createCon();
		$mod=$_REQUEST['examModule'];
		$secName=$_REQUEST['sec_name'];
		$secWeight=$_REQUEST['sec_weight'];
		if($secWeight < 0)
			$secWeight=intval($secWeight*-1);
		$sql1="SELECT * FROM `module` WHERE `module_description`=".$mod;
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($res1);
		$tot=$row1['tot_que'];
		
		$sql2="SELECT SUM(`weightage`) FROM `module_section` WHERE `module`=".$mod;
		$res2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($res2);
		$saved1=$row2['SUM(`weightage`)'];
		$saved=$row2['SUM(`weightage`)']+$secWeight;
		
		if($tot >= $saved)
		{
		$sql="SELECT count(*) FROM `module_section` WHERE `module`=".$mod;
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res);
		$num=$row['count(*)']+1;
		
		$ins="INSERT INTO `module_section`(`module`,`section_name`,`section`,`weightage`) VALUES (".$mod.",'".$secName."','".$num."','".$secWeight."')";
		mysqli_query($conn,$ins);
		$con->closeCon();
		header("location:createSection.php?id=".$secName);
		}
		else
		{
			$weightage=$tot-$saved1;
			$msg='You cannt assign weightage greater than '.$weightage;
			header("location:createSection.php?msg=".$msg);
		}
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
	<?php echo "Section successfully submitted."; ?>
    <br>
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='createSection.php';">
    
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
    <input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='createSection.php';">
    
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
				<h2>Create Section</h2>
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
					<select class="form-control" name="examModule" onChange="findTotQues(this.value);">
                    <option disabled value="" selected>Select Module</option>
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
                	<label class="control-label col-sm-3" for="email">Question Assigned:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="0" name="tot_que" id="tot_que" readonly>
					</div>
				</div>

				<div class="form-group">
                	<label class="control-label col-sm-3" for="email">Section Name:</label>
					<div class="col-sm-3">
					<input type="text" class="form-control" required value="" name="sec_name" placeholder="Enter Section Name">
					</div>
				</div>
                <div class="form-group">
                	<label class="control-label col-sm-3" for="email">Weightage:</label>
					<div class="col-sm-3">
					<input type="number" class="form-control" min="0" max="200" required value="" name="sec_weight" placeholder="Sectionwise No. Of Question">
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