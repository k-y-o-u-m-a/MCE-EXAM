<?php
	include 'classes/Config.php';
	include 'classes/Candidate.php';
	if(isset($_REQUEST['uploadCandidateData']))
	{	
		$con=new Config;
		$conn=$con->createCon();
		
		$tempFile=$_FILES['fileToUpload']['tmp_name'];
		$fileName=$_FILES['fileToUpload']['name'];
		$uploadQue=new Candidate;
		$uploadQue->uploadCandidate($conn,$tempFile);
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
				<h2>Upload Candidate Data(<a href="Candidate_Format.csv">Candidate Format</a>)</h2>
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