<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Que</title>
<script>
function showHint(str)
{
	if(str.length == 0)
	{ 
		document.getElementById("txtHint").innerHTML = "";
		return;
	}
	else
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getQuestion.php?q="+str,true);
		xmlhttp.send();
	}
}
</script>
</head>

<body>
	<p><b>Start typing a name in the input field below:</b></p>
	<form> 
		First name: <input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>