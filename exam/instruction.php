<?php
	session_start();
	include 'classes/Config.php';
	$con=new Config;
	$conn=$con->createCon();
	$lockedSql="Select * from exam_result where candidate_id='".$_SESSION['id']."'";
	$res=mysqli_query($conn,$lockedSql);
	if($row=mysqli_fetch_array($res))
	if($row['lock_exam']=='Y')
	{
		header("location:examDetail.php");
	}
	
	$lockedSql="Select * from user_master where userid='".$_SESSION['id']."'";
	$res=mysqli_query($conn,$lockedSql);
	if($row=mysqli_fetch_array($res))
		$_SESSION['exam_module']=$row['module'];
		
	$lockedSql="Select * from exam where module='".$_SESSION['exam_module']."'";
	$res=mysqli_query($conn,$lockedSql);
	if($row=mysqli_fetch_array($res))
		$_SESSION['exam_name']=$row['exam_name'];

include("common/header.php");

?>
<script>
	function changeStat()
	{
		if(document.getElementById('agree').checked == true)
			document.getElementById('agree_btn').style.display='block';
		if(document.getElementById('agree').checked == false)
			document.getElementById('agree_btn').style.display='none';
		
	}
</script>
<style>
input[type="checkbox"]
{
  -webkit-appearance:checkbox;
  width:20px;
}

</style>
  <body>
<table width="100%" align="center"><tr><td align="center">
<img src="image/BELTRON.jpg"></td></tr></table>
    <div class="form1" style="margin-top:-5px;">
      
     <!-- <ul class="tab-group">
        <li class="tab active" style="width:1050px;"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>-->
      
      <div class="tab-content">
        <div id="signup">   
          <h1 style="color:#F00;"><strong>Instructions</strong></h1>
         <form action="startExam.php" method="post">  
          <table class="table" align='center'>
	<tbody>
		<tr>
			<td><font color="#FFFFFF">1.</font>&nbsp; &nbsp;&nbsp;</td>
            <td><font color="#FFFFFF"><b>Total no. of question is 100.<br>
			  कुल प्रश्नों की संख्या : 100</b></font></td>
		</tr>
        <tr>
			<td><font color="#FFFFFF">2.</font>&nbsp; &nbsp;&nbsp; </td><td><font color="#FFFFFF"><b>Time 90 minutes.<br>
			  <b>समय: 90 मिनट </b></font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">3. </font>&nbsp; &nbsp;&nbsp;</td>
			<td><font color="#FFFFFF"><b>Each question carry 2 mark. <br>
		    प्रत्येक प्रश्न 2 अंक  का है </b></font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">4.</font> &nbsp; &nbsp;&nbsp;</td>
            <td><font color="#FFFFFF"><b>There is no negative marks.<br>नकारात्मक अंकन  नहीं है |</b></font></td>
		</tr>
        <!--<tr>
			<td><font color="#FFFFFF">5.</font> </td><td><font color="#FFFFFF"><b>In case of any differences in english and hindi version of question english version will be considered as original.</b>
			  <p style="font-size:16px;"><b>अंग्रेजी एवं हिन्दी वर्जन में अंतर होने पर अंग्रेजी वर्जन को मान्य माना जाएगा |</b></p></td>
		</tr>-->
        
        <tr><td>&nbsp;</td></tr>
        <tr style="display:none;">
			<td><input type="checkbox"  class="form-check-input form-control"  name="agree" id="agree"  onClick="changeStat1();" ></td>
            <td><font color="#009966">I agree to all terms and conditions as per guidelines.</font></td>
		</tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        	<td></td>
			<td>
            <button id="agree_btn" type="submit" name="iAgree" class="button button-block" />I Agree</button>
           </td>
		</tr>
	</tbody>
</table>
</form>
        </div>
        
        <div id="login">   
          <h1>Validate Mobile!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Mobile No <span class="req">*</span>
            </label>
            <input type="tel"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              OTP<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off"/>
          </div>
          
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
<?php include("common/footer.php"); ?>
