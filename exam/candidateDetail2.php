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
		$sql="Insert into user_master(SName,Address,userid,password,reg_no,Contact_no,Email_id,module,lock_login,DD_Number) values('".$candName."','".$cenAddress."','".$userid."','".$userid."','".$userid."','".$candMob."','".$candEmail."','1','N','".$candDd."')";
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
                <div class="row">
					<div class="form-group col-lg-4">
                <select class="form-control" name="cenAddress">
                	<option value="">Select Institute</option>
                	<option value="DARSHAN INSTITUTE OF MANAGEMENT & technology Pvt. Ltd.,DIMT-VRCSM,NEXT TO RELIANCE  TOWER,BEHIND GIRLS HIGH SCHOOL,DAUDNAGAR,AURANGABAD-847211
">DARSHAN INSTITUTE OF MANAGEMENT & technology Pvt. Ltd.,DIMT-VRCSM,NEXT TO RELIANCE  TOWER,BEHIND GIRLS HIGH SCHOOL,DAUDNAGAR,AURANGABAD-847211
</option>
                    <option value="IT Vision, In front of A.N.Memorial College, Near Dr. Chandra Sekhar Pd. Clinic Old G.T. Road
">IT Vision, In front of A.N.Memorial College, Near Dr. Chandra Sekhar Pd. Clinic Old G.T. Road
</option>
                    <option value="S.M.P TECHNOLOGY, HIGHTECH COMPUTER, KAMALNATH NAGAR NEAR SUPRIYA CINEMA, BETTIAH.
">S.M.P TECHNOLOGY, HIGHTECH COMPUTER, KAMALNATH NAGAR NEAR SUPRIYA CINEMA, BETTIAH.
</option>
                    <option value="S.M.P TECHNOLOGY,MVD COMPUTER, OPP PETROL PUMP, BHABHUA-821101
">S.M.P TECHNOLOGY,MVD COMPUTER, OPP PETROL PUMP, BHABHUA-821101
</option>
                    <option value="Dyanmic Computers, Old Telephone Office Campus,Katira Road,Ara, Bhojpur.
">Dyanmic Computers, Old Telephone Office Campus,Katira Road,Ara, Bhojpur.
</option>
                    <option value="Galaxy Digitech Computer, Kalawati Complex,Charitravan, Buxar, Ward No.-2, Buxar-802101
">Galaxy Digitech Computer, Kalawati Complex,Charitravan, Buxar, Ward No.-2, Buxar-802101
</option>
                    <option value="Arya Computer Centre, S.M. College Ward No-5, Dumroan,Buxar-802119
">Arya Computer Centre, S.M. College Ward No-5, Dumroan,Buxar-802119
</option>
                    <option value="GROWTH ACADEMY PVT. LTD., Lala Coloney in front on Naka no2/4 Thana Road Bhagwan Bazar Chapra Bihar-841301
">GROWTH ACADEMY PVT. LTD., Lala Coloney in front on Naka no2/4 Thana Road Bhagwan Bazar Chapra Bihar-841301
</option>
                    <option value="AKASH EDUCATIONAL & WELFARE SOCIETY, Raghunathpur,East Champaran,PO-Motihari-845401,
">AKASH EDUCATIONAL & WELFARE SOCIETY, Raghunathpur,East Champaran,PO-Motihari-845401,
</option>
                    <option value="S.M.P TECHNOLOGY,ARYABHAT COMPUTERS,OPP MUFFASIL THANA MANUPUR GAYA-823003
">S.M.P TECHNOLOGY,ARYABHAT COMPUTERS,OPP MUFFASIL THANA MANUPUR GAYA-823003
</option>
                    <option value="Rising Information Technology Academy, Near Ganesh Mandir, New English Barhiya, Post+PS -Barhiya,Lakhisari-811311
">Rising Information Technology Academy, Near Ganesh Mandir, New English Barhiya, Post+PS -Barhiya,Lakhisari-811311
</option>
                    <option value="S.M.P TECHNOLOGY,RAJ INFOTECH COMPUTER CENTRE, GULZARBAGH, MADHEPURA-852113
">S.M.P TECHNOLOGY,RAJ INFOTECH COMPUTER CENTRE, GULZARBAGH, MADHEPURA-852113
</option>
                    <option value="DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD,COMPUTER WELL,INFRONT OF SURI HIGH SCHOOL,MADHUBANI-847211
">DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD,COMPUTER WELL,INFRONT OF SURI HIGH SCHOOL,MADHUBANI-847211
</option>
                    <option value="Samarpit Foundation , Satyanarayan Complex, Goushala, Masjid Chowk, Bela Road,Mithanpura,Muzaffarpur
">Samarpit Foundation , Satyanarayan Complex, Goushala, Masjid Chowk, Bela Road,Mithanpura,Muzaffarpur
</option>
                    <option value="DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD, SATYAM COMPUTER CAMPUS, ORIENT CLUB,AMGOLA,MUZAFFARPUR-842002
">DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD, SATYAM COMPUTER CAMPUS, ORIENT CLUB,AMGOLA,MUZAFFARPUR-842002
</option>
                    <option value="DURGA MAHILA SHISHU KALYAN SANSTHAN,ROAD NO.14, RAJIV NAGAR,PATNA-800024
">DURGA MAHILA SHISHU KALYAN SANSTHAN,ROAD NO.14, RAJIV NAGAR,PATNA-800024
</option>
                    <option value="VCSA,SHANTI MARKET, 3rd FLOOR, ABOVE ALLAHABAD BANK OPP. PHULWARI SHARIF BLOCK, PATNA-801505
">VCSA,SHANTI MARKET, 3rd FLOOR, ABOVE ALLAHABAD BANK OPP. PHULWARI SHARIF BLOCK, PATNA-801505
</option>
                    <option value="KAYPEE CLASSES, 101, 1st Floor,kumar Tower, Boring Road Crossing,Patna-800001
">KAYPEE CLASSES, 101, 1st Floor,kumar Tower, Boring Road Crossing,Patna-800001
</option>
                    <option value="MAGADH EDUCATIONAL DEVELOPMENT INSTITUTE, Near Mahendru Post Office,Mata Khudi lane, Patna-800006
">MAGADH EDUCATIONAL DEVELOPMENT INSTITUTE, Near Mahendru Post Office,Mata Khudi lane, Patna-800006
</option>
                    <option value="I.T.M.R,Institute of Technology Management & Research
Above Anamika Gas Agencey, North of Panch Shiv Mandir, kankarbagh,Patna">I.T.M.R,Institute of Technology Management & Research
Above Anamika Gas Agencey, North of Panch Shiv Mandir, kankarbagh,Patna</option>
                    <option value="Maxwell computer centre, Infront of zila school statdium, zila school Road, Purnia-854301
">Maxwell computer centre, Infront of zila school statdium, zila school Road, Purnia-854301
</option>
                    <option value="Darshan institute of Management & technology Pvt. Ltd.,Personal Computer  Education Centre,Above on Rohit Traders,2nd Floor,Main Road Raxaul (Bihar) Pin-845305(SUBDIVISION)
">Darshan institute of Management & technology Pvt. Ltd.,Personal Computer  Education Centre,Above on Rohit Traders,2nd Floor,Main Road Raxaul (Bihar) Pin-845305(SUBDIVISION)
</option>
                    <option value="S S Infosys, Near Railway Over Bridge, Gaurakshini, Sasaram-821115
">S S Infosys, Near Railway Over Bridge, Gaurakshini, Sasaram-821115
</option>
                    <option value="SPECIAL TECHNOLOGY BABY KIRAN MEMORIAL,NEAR PHOTO BHAWAN,TIRANGA CHOWK, GANGAJALA, SAHARSA-852201
">SPECIAL TECHNOLOGY BABY KIRAN MEMORIAL,NEAR PHOTO BHAWAN,TIRANGA CHOWK, GANGAJALA, SAHARSA-852201
</option>
                    <option value="DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD, BAZAR SAMITEE ROAD, MUKTAPUR,SAMASTIPUR-848101
">DARSHAN INSTITUTE OF MANAGEMENT  & TECHNOLOGY (P) LTD, BAZAR SAMITEE ROAD, MUKTAPUR,SAMASTIPUR-848101
</option>
                    <option value="S.M.P TECHNOLOGY, COMPUTERS ZONE,NEAR OF ICE FACTORY KAPRAUL ROAD SITAMARHI-843302
">S.M.P TECHNOLOGY, COMPUTERS ZONE,NEAR OF ICE FACTORY KAPRAUL ROAD SITAMARHI-843302
</option>
                    <option value="S.M.P TECHNOLOGY,MANGLAM COMPUTER,MANGLAM INFOTECH, OPP GRAMIN BANK, THANA ROAD, SIWAN-841226
">S.M.P TECHNOLOGY,MANGLAM COMPUTER,MANGLAM INFOTECH, OPP GRAMIN BANK, THANA ROAD, SIWAN-841226
</option>
                    <option value="Novel Institute of Technical & Management Education, Beside Reliance Petrol Pump, Sation Chok, Battiah,west Champaran-845438
">Novel Institute of Technical & Management Education, Beside Reliance Petrol Pump, Sation Chok, Battiah,west Champaran-845438
</option>
<option value="Anjuman Taraqqui">Anjuman Taraqqui</option>
<option value="Sri Maa Laxmi Computech (Pvt.) Ltd., Katihar">Sri Maa Laxmi Computech (Pvt.) Ltd., Katihar</option>
<option value="STS Computer Education C/o Arya Computer Center, Buxar">STS Computer Education C/o Arya Computer Center, Buxar</option>
<option value="Om Infocom Technology (Pvt.) Ltd., Muzaffarpur">Om Infocom Technology (Pvt.) Ltd., Muzaffarpur</option>
<option value="Tirhut Samagra Vikas Parishad, Muzaffarpur">Tirhut Samagra Vikas Parishad, Muzaffarpur</option>
<option value="Beedi College, Vaishali">Beedi College, Vaishali</option>
<option value="Friendship Computer Education, Vaishali">Friendship Computer Education, Vaishali</option>
<option value="STS Computer, C/o NITME, Bettiah">STS Computer, C/o NITME, Bettiah</option>
<option value="STS Computer, Buxar">STS Computer Buxar</option>
<option value="STS Computer, BHAGALPUR">STS Computer BHAGALPUR</option>
<option value="Maxwell Computer Center, Bhagalpur">Maxwell Computer Center, Bhagalpur</option>
<option value="Maxwell Computer Center, Banka">Maxwell Computer Center, Banka</option>
<option value="SMP Technology, Madhepura">SMP Technology, Madhepura</option>

<option value="Mishra Microtek Darbhanga">Mishra Microtek Darbhanga</option>
<option value="Vidya Vihar College Chapra">Vidya Vihar College Chapra</option>

<option value="The Saviours, C/o Global Carrer Development Organisation, Nawada">The Saviours, C/o Global Carrer Development Organisation, Nawada</option>
<option value="The Saviours, C/o BPCRS sogt Institute of Technology, Supaul">The Saviours, C/o BPCRS sogt Institute of Technology, Supaul</option>
<option value="The Saviours, C/o Indian Computer Center, Saharsha">The Saviours, C/o Indian Computer Center, Saharsha</option>
<option value="The Saviours, C/o Tally Point Computer Center, Nalanda">The Saviours, C/o Tally Point Computer Center, Nalanda</option>
<option value="The Saviours, C/o AIIT Computer Center (Block), West Champaran">The Saviours, C/o AIIT Computer Center (Block), West Champaran</option>
<option value="The Saviours, C/o Recent Computer Center, West Champaran">The Saviours, C/o Recent Computer Center, West Champaran</option>
<option value="The Saviours, C/o Arterial Infotech (Sub-Div),Patna">The Saviours, C/o Arterial Infotech (Sub-Div),Patna</option>
<option value="The Saviours, C/oComputer Zone, Patna">The Saviours, C/oComputer Zone, Patna</option>
<option value="The Saviours, C/o Global Carrer Development Organisation(Block), Gaya">The Saviours, C/o Global Carrer Development Organisation(Block), Gaya</option>
<option value="The Saviours, C/o IICT (Sub-Div), Samastipur">The Saviours, C/o IICT (Sub-Div), Samastipur</option>
<option value="The Saviours, C/o Yogmaya Computer Center, Samastipur">The Saviours, C/o Yogmaya Computer Center, Samastipur</option>
<option value="The Saviours, C/o Prabhat Computer (sub-Div), Samastipur">The Saviours, C/o Prabhat Computer (sub-Div), Samastipur</option>
<option value="The Saviours, C/o Bandana Computer Center, Saran">The Saviours, C/o Bandana Computer Center, Saran</option>
<option value="S.M.P Technology, C/o APT Computer, Gopalganj">S.M.P Technology, C/o APT Computer, Gopalganj</option>
<option value="SMP Technology, Sitamarhi">SMP Technology, Sitamarhi</option>

<option value="Vidya Vihar College, Saran">Vidya Vihar College, Saran</option>
<option value="STS Computer Education, C/o-Academy Of computer Education,Bhagalpur">STS Computer Education, C/o-Academy Of computer Education,Bhagalpur</option>
<option value="Mishra Microtech, (O level Accrediated), Darbhanga">Mishra Microtech, (O level Accrediated), Darbhanga</option>
<option value="New Govt. Polytechnic,Patna  (O level Accrediated), Patna">New Govt. Polytechnic,Patna  (O level Accrediated), Patna</option>
<option value="Inerica">Inerica</option>
<option value="GTECH">GTECH</option>
<option value="VCC">VCC</option>

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