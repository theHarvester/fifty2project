<?php

 		$conn = NULL;
 		$quote;
 		$image;

        try{
            $conn = new PDO("mysql:host=localhost;dbname=suppository;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root");

            $stmt = $conn->prepare('SELECT * FROM quotes ORDER BY RAND() LIMIT 1');
            $stmt->execute();
            $quote  =  $stmt->fetch();

           	$stmt = $conn->prepare('SELECT * FROM images ORDER BY RAND() LIMIT 1');
            $stmt->execute();
            $image  =  $stmt->fetch();

            } catch(PDOException $e){
 				$quote = array('QUOTE'=> 'No one. However smart, however well-educated, however experienced is the suppository of all wisdom', 'REF' => 'http://edition.cnn.com/2013/08/12/world/asia/australia-abbott-suppository-gaffe/');
 				$image = array('HREF' => 'resources/images/abbott1.jpg', 'POSITION' => '0 0');
            }
            
?>

<html>
  <head>
<link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
<link href='resources/style.css' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/ico" href="resources/favicon.ico" />
<title>Tony Abbott: The suppository of all wisdom</title>
<style>

</style>
  	</head>
  	<body>
  		<div class='main'>
  			<div class= 'image' style="background-image: url(<?php echo $image['HREF'] ?>); background-position:<?php echo $image['POSITION'] ?>;"> </div>
  			<div class='quotemark'>"</div>
  			<div class='quote'><?php echo $quote['QUOTE']; ?> </br></br><a href='<?php echo $quote['REF']; ?>' target='blank' class='refer'>Reference</a></div>
  			<div class='quotemark'>"
  			</div>
  			<a href="" class="button">More Wisdom</a>
  		</div>
  		<footer>Built as part of <a href='http://fifty2project.com'>fifty2</a> </footer>
  	</body>
</html>