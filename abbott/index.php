<?php

 		$conn = NULL;

        try{
            $conn = new PDO("mysql:host=localhost;dbname=suppository;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root");
            } catch(PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }
            $stmt = $conn->prepare('SELECT * FROM quotes ORDER BY RAND() LIMIT 1');
            $stmt->execute();
            $row  =  $stmt->fetch();
?>

<html>
  <head>
<link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
<title>Tony Abbott: The suppository of all wisdom</title>
<style>
	body{
		margin: 0px;
		padding:0px;
		font-family: 'News Cycle', sans-serif;
		background-color: #006fb9;
	}
	.image{
		background-image: url('http://resources1.news.com.au/images/2010/10/12/1225937/407685-tony-abbott.jpg');
		background-position: -70px 0;
		background-size: cover;
		width:200px;
		height:200px;
		border-radius: 150px;
		-webkit-border-radius: 150px;
		-moz-border-radius: 150px;
		float:left;
		margin-right: 35px;
		margin-top:5px;
	}
	div{
		
	}
	.quote{
		width:400px;
		font-size: 24px;
		font-style: italic;
		text-align: center;
		color:#DFDFDF;
		padding-top: 50px;
		float:left;
		min-height: 200px;
	}

	.quotemark{
		font-size: 100px;
		color:999999;
		vertical-align: text-top;
		float:left;
	}
	.main{
		width:700px;
		height:300px;
		margin-left:auto;
		margin-right:auto;
		margin-top: 200px;

	}
	.button {
	clear:both;
	font-weight: bold;
	border-radius: 12px;
	background: #ffc20e;
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,#ffc20e 0%,#e3aa00 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#ffc20e),color-stop(100%,#e3aa00));
	background: -webkit-linear-gradient(top,#ffc20e 0%,#e3aa00 100%);
	background: -o-linear-gradient(top,#ffc20e 0%,#e3aa00 100%);
	background: -ms-linear-gradient(top,#ffc20e 0%,#e3aa00 100%);
	background: linear-gradient(to bottom,#ffc20e 0%,#e3aa00 100%);
	display:inline-block;
	color:#ffffff;
	font-size:24px;
	font-weight:100;
	font-style:normal;
	height:65px;
	line-height:65px;
	width:200px;
	text-decoration:none;
	text-align:center;
	margin-top:30px;
	margin-left: 250px;
}

.button:hover {
	background: #e3aa00;
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,#e3aa00 0%,#ffc20e 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#e3aa00),color-stop(100%,#ffc20e));
	background: -webkit-linear-gradient(top,#e3aa00 0%,#ffc20e 100%);
	background: -o-linear-gradient(top,#e3aa00 0%,#ffc20e 100%);
	background: -ms-linear-gradient(top,#e3aa00 0%,#ffc20e 100%);
	background: linear-gradient(to bottom,#e3aa00 0%,#ffc20e 100%);
}
.refer{
	color:#C3C4A3;
	font-size: 10px;
	text-align:right;
}
	
</style>
  	</head>
  	<body>
  		<div class='main'>
  			<div class= 'image'> </div>
  			<div class='quotemark'>"</div>
  			<div class='quote'><?php echo $row['QUOTE']; ?> </br></br><a href='<?php echo $row['REF']; ?>' target='blank' class='refer'>Reference</a></div>
  			<div class='quotemark'>"
  			</div>
  			
  			<a href="" class="button">More Wisdom</a>
  		</div>
  	</body>
</html>