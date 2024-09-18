<?php
	session_start();
	include 'classes/Config.php';
	include 'classes/Login.php';
	include 'classes/Session.php';

	if(isset($_SESSION['id']))
	{
		$sql="Select userid,module from user_master where userid='".$_SESSION['id']."'";
		$res=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($res))
		{
			header("location:candidateHome.php?moda=".$row['module'].'&&regNo='.$_SESSION['id'].'&&sessionId='.md5($_SESSION['id']));
		}
		else
		{
			session_unset();
			session_destroy();
			header("location:index.php");
		}
	}
	
	if(isset($_REQUEST['login']))
	{
		$obj=new Config;
		$conn=$obj->createCon();
		$log=new Login;
		if($log->userAuthentication($conn,$_REQUEST['user'],$_REQUEST['password']))
		{
					session_start();
					$_SESSION['id']=strtoupper($_REQUEST['user']);
					//header("location:startExam.php");
					$lockLogin="Update user_master SET lock_login='Y',online='Y' where userid='".$_SESSION['id']."'";
					$resUser=mysqli_query($conn,$lockLogin);
					header("location:instruction.php");
		}
		else
		{
			header("location:index.php");
			echo "Wrong Username or Password !!!";
		}
	}

include("common/header.php");

?>

<table width="100%" align="center"><tr><td align="center">
<img src="image/BELTRON.jpg"></td></tr></table>
  
    <div class="form" style="margin-top:-5px;">
      
     <!-- <ul class="tab-group">
        <li class="tab active" style="width:1050px;"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>-->
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Online Examination</h1>
          
          <form role="form" action="" method="post">
          
         <div class="field-wrap">
            <label>
              <!--Roll No.<span class="req">*</span>-->
            </label>
            <input value="<?php if(isset($_REQUEST['un'])){echo $_REQUEST['un'];}?>" type="text" name="user" required autocomplete="off" />
           <!-- <input value="<?php if(isset($_REQUEST['un'])){echo $_REQUEST['un'];}?>" type="text" name="user" required maxlength="10" pattern=".{10,10}" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>-->
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input value="" type="password" name="password" required />
            <!--<input value="" type="password" name="password" required pattern=".{4,4}" maxlength="4" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>-->
          </div>
          
          <button type="submit" name="login" class="button button-block"/>Submit</button>
          
          </form>

        </div>
        
        <div id="login">   
          <!--<h1>Validate Mobile!</h1>
          
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
          
          </form>-->

        </div>
        
      </div><!-- tab-content -->
     
      
<?php include("common/footer.php"); ?>
