<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<style>
	body{
		background: url("background.png");
		background-repeat: repeat-y;
		background-size: 100% auto;
	}
	.alternate tr:nth-child(even){
			background: #FFFFFF;
		}
	.alternate tr:nth-child(even){
			background: #f2f2f2;
		}
	</style>
</head>
	<body>
		<script>
		var template = window.location.href;
		var code = -1;
		if(template.length > 26 && parseInt(template.substring(template.length-5,template.length)) > 9999 && parseInt(template.substring(template.length-5,template.length)) < 100000)
		{
			code = parseInt(template.substring(template.length-5,template.length));
		}
		
		
		
		function post()
		{
			if(document.getElementById("inputByUser").value.length > 0)
			{
			
				var request = new XMLHttpRequest();
				request.onreadystatechange = function()
				{
					if(request.readyState == 4 && request.status == 200)
					{
						//document.getElementById("statusOfPost").innerHTML = request.responseText;
					}
				}
				request.open("POST","handlePost.php?i=" + document.getElementById("inputByUser").value + "&c=" + code,true);
				request.send();
				document.getElementById("inputByUser").value = "";
				
			}
		}
		function refresh()
		{
			if(document.getElementById("inputByUser").value.length > 0)
			{
				
			}
			var request = new XMLHttpRequest();
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					document.getElementById("clipboard").innerHTML = request.responseText;
					var objDiv = document.getElementById("clipboard");
					objDiv.scrollTop = objDiv.scrollHeight;
				}
			}
			request.open("POST","refresh.php?i=" + code,true);
			request.send();
		}

		function favorite(a, b)
		{
			var request = new XMLHttpRequest();
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
					document.getElementById("statusOfPost").innerHTML = request.responseText;
				}
			}
			request.open("POST","favorite.php?i=" + a + "&u=" + b,true);
			request.send();
		}
		
		function refreshGroup()
		{
			if(document.getElementById("groupCode").value > 9999 && document.getElementById("groupCode").value < 1000000)
			{
				code = document.getElementById("groupCode").value;
				document.getElementById("linkToShare").value = "http://localhost/pennlabs/index.php?" + (document.getElementById("groupCode").value).toString();		
				var url = "http://localhost/pennlabs/index.php?" + (document.getElementById("groupCode").value).toString();
				window.location = url;
				document.getElementById("groupCode").value = "";
			}
			
		}

		var refreshing = setInterval(refresh, 500);
		</script>
		<center>
			<img style="width:30%;" src="header.png"/><br>
			<span style="color:white;">Welcome! On this site you can post anonymously. You will start on the default chat and you can enter a 5-digit group code to enter a new chat. All messages will update upon entrance.</span>
			<div id="clipboard" style="background: #FFFFFF; text-align:left; position:relative; top: 10vh; height:35vh; width:80vh; border: solid 1px black; border-radius: 5px; overflow-y: scroll">
			</div>
		</center>
		<center>
			<div style="position: relative; top: 15vh; ">
				<span style="color:white;">Message:</span>
				<br>
				<input type="text" id="inputByUser" style="border: 1px black solid;"/>
				<button id="submit" style="background:white; border:black solid 1px;" onclick="post()">Post</button>
				<br>
				<br>
				<span style="color:white;">Group Code: (5 Digits)</span>
				<br>
				<input type="text" id="groupCode" style="border: 1px black solid;"/>
				<button id="codeUpdate" style="background:white; border:black solid 1px;" onclick="refreshGroup()">Update</button>
				<br>
				<br>
				<span style="color:white">Want to Share this discussion? Use this link:</span>
				<br>
				<input style="border: 1px black solid;" id="linkToShare"/>
				<p id="statusOfPost"></p>
			</div>
		</center>
	<br>
	<script>
		document.getElementById("linkToShare").value = window.location.href;
	</script>

	</body>
</html>