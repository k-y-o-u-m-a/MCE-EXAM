<?php
	session_start();
	include 'classes/Question.php';
	include 'classes/Config.php';
	include 'classes/Module.php';
	
	if(isset($_REQUEST['updateQueBtn']))
	{
		$modName=$_REQUEST['moduleName'];
		$questionDesc=$_REQUEST['questionDesc'];
		$option1=$_REQUEST['opt1'];
		$option2=$_REQUEST['opt2'];
		$option3=$_REQUEST['opt3'];
		$option4=$_REQUEST['opt4'];
		
		$answerType=$_REQUEST['answerType'];
		$answer=$_REQUEST['answer'];
		$status=$_REQUEST['status'];
		
		$con=new Config;
		$conn=$con->createCon();
		$exam=new Question;
		$exam->updateQuestion($conn,$modName,$questionDesc,$option1,$option2,$option3,$option4,$answerType,$answer,$status,$_REQUEST['id']);
		$con->closeCon();
		header("location:editQuestion.php?msg=".$modName);
	}
	$con=new Config;
	$conn=$con->createCon();
	$que=new Question;
	$getQue=$que->getQuestionDetail($conn,$_REQUEST['id']);
	//$que="";
	while($row=mysqli_fetch_array($getQue))
	{
		$que=$row['que_desc'];
		$opt1=$row['option1'];
		$opt2=$row['option2'];
		$opt3=$row['option3'];
		$opt4=$row['option4'];
		$queMod=$row['module'];
		$ansType=$row['answer_type'];
		$correctAns=$row['correct_answer'];
		$status=$row['status'];
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
if(isset($_REQUEST['msg']))
{
?>
	<div id="light1" class="white_content1" style="text-align:center;">
	<br>
	<?php echo "Question updated successfully."; ?>
	<br>
	<input type="button" class="btn btn-primary" value="Ok" name="" onClick="window.location='manageQuestion.php';">
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
				<h2>Edit Question</h2>
				<form class="form-horizontal" role="form" action="" method="post">
				<div class="form-group">
					<label class="control-label col-sm-3" for="email">Module Name:</label>
<?php
					//$con=new Config;
					//$conn=$con->createCon();
					$mod=new Module;
					$getMod=$mod->getModule($conn);
?>
					<div class="col-sm-3">
					<select class="form-control" name="moduleName">
<?php
					while($row=mysqli_fetch_assoc($getMod))
					{
?>
			<option value="<?php echo $row['id'];?>" <?php if($row['id']==$queMod) echo 'selected';?>>
				<?php echo $row['module_description'];?>
            </option>
<?php
					}
?>
                    </select>
					</div>
					<label class="control-label col-sm-3" for="pwd">Question Description:</label>
					<div class="col-sm-3">          
					<textarea class="form-control" name="questionDesc" value="<?php echo $que;?>" placeholder="Enter the question here"><?php echo $que;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Option 1:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 1" value="<?php echo $opt1;?>" name="opt1" class="form-control">
					</div>

					<label class="control-label col-sm-3" for="pwd">Option 2:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 2" value="<?php echo $opt2;?>" name="opt2" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Option 3:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 3" value="<?php echo $opt3;?>" name="opt3" class="form-control">
					</div>
				
					<label class="control-label col-sm-3" for="pwd">Option 4:</label>
					<div class="col-sm-3">          
					<input type="text" placeholder="Option 4" value="<?php echo $opt4;?>" name="opt4" class="form-control">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Answer Type:</label>
					<div class="col-sm-3">          
					<select class="form-control" name="answerType">
                    	<option value="single" <?php if($ansType=='single') echo 'selected';?>>Single Select</option>
                        <option value="multi" <?php if($ansType=='multi') echo 'selected';?>>Multiple Select</option>
                    </select>
					</div>

					<label class="control-label col-sm-3" for="pwd">Correct Answer:</label>
					<div class="col-sm-3">          
					<select class="form-control" name="answer">
                    <option value="A" <?php if($correctAns=='A') echo 'selected';?>>Option 1</option>
					<option value="B" <?php if($correctAns=='B') echo 'selected';?>>Option 2</option>
					<option value="C" <?php if($correctAns=='C') echo 'selected';?>>Option 3</option>
					<option value="D" <?php if($correctAns=='D') echo 'selected';?>>Option 4</option>
                    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Status:</label>
					<div class="col-sm-3">          
						<input type="radio" name="status" value="Y" <?php if($status=='Y') echo 'checked';?>>Yes
                        <input type="radio" name="status" value="N" <?php if($status=='N') echo 'checked';?>>No
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="updateQueBtn">Update</button>
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