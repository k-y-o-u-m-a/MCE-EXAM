<?php
	include 'classes/Question.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	
	if(isset($_REQUEST['createQueBtn']))
	{
		$modName=$_REQUEST['moduleName'];
		$questionDesc=$_REQUEST['questionDesc'];
		$option1=$_REQUEST['opt1'];
		$option2=$_REQUEST['opt2'];
		$option3=$_REQUEST['opt3'];
		$option4=$_REQUEST['opt4'];
		
		$answerType=$_REQUEST['answerType'];
		$answer=$_REQUEST['answer'];
		$bilingual=$_REQUEST['bilingual'];
		
		$con=new Config;
		$conn=$con->createCon();
		$exam=new Question;
		$exam->createQuestion($conn,$modName,$questionDesc,$option1,$option1,$option1,$option1,$answerType,$answer,$bilingual,$status='N');
		$con->closeCon();
	}
	if(isset($_REQUEST['uploadCandidateData']))
	{	
		$con=new Config;
		$conn=$con->createCon();

		$tempFile=$_FILES['fileToUpload']['tmp_name'];
		$fileName=$_FILES['fileToUpload']['name'];
		$uploadQue=new Question;
		$uploadQue->uploadQuestion($conn,$tempFile);
		$con->closeCon();
		header("location:createQuestion.php?id=".$fileName);
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include bootstrap stylesheets -->
<link rel="stylesheet" href="css/style.css"><title>ETP</title>
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
</head>

<body>
	<div class="container">
    <?php
if(isset($_REQUEST['id']))
{
?>
	<div id="light1" class="white_content1" style="text-align:center;">
	<br>
	<?php echo "Question uploaded successfully."; ?>
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
				<h2>Create/Upload Question Details</h2>
				<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
					<label class="control-label col-sm-3" for="email">Upload File(.csv):</label>
					<div class="col-sm-3">
					<input type="file" class="form-control" required value="" name="fileToUpload">
					</div>
                    <div class="col-sm-3">
					<input type="submit" class="btn btn-primary" value="Upload" name="uploadCandidateData">
					</div>
				</div>
                <div class="form-group" align="center"><b>OR</b></div>
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
<?php
					while($row=mysqli_fetch_assoc($getMod))
					{
?>
			<option value="<?php echo $row['id'];?>"><?php echo $row['module_description'];?></option>
<?php
					}
?>
                    </select>
					</div>
                    <label class="control-label col-sm-3" for="pwd">Question Description:</label>
					<div class="col-sm-3">          
					<textarea class="form-control" name="questionDesc" value="" placeholder="Enter the question here"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Option 1:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 1" value="" name="opt1" class="form-control">
					</div>

					<label class="control-label col-sm-3" for="pwd">Option 2:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 2" value="" name="opt2" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Option 3:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 3" value="" name="opt3" class="form-control">
					</div>

					<label class="control-label col-sm-3" for="pwd">Option 4:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 4" value="" name="opt4" class="form-control">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Answer Type:</label>
					<div class="col-sm-3">          
					<select class="form-control" name="answerType">
                    	<option value="single">Single Select</option>
                        <option value="multi">Multiple Select</option>
                    </select>
					</div>

					<label class="control-label col-sm-3" for="pwd">Correct Answer:</label>
					<div class="col-sm-3">          
					<select class="form-control" name="answer">
                    	<option value="A">Option 1</option>
                        <option value="B">Option 2</option>
                        <option value="C">Option 3</option>
                        <option value="D">Option 4</option>
                    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Bilingual:</label>
					<div class="col-sm-3">          
						<input type="radio" name="bilingual" value="Y">Yes
                        <input type="radio" name="bilingual" value="N">No
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="createQueBtn">Submit</button>
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