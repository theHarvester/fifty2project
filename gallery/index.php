<?php

if (file_exists('image-list.xml')) {
    $xml = simplexml_load_file('image-list.xml');
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SVG - fifty2project</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<main class="bs-docs-masthead" id="content" role="main">
    <div class="container">
         <h1>SVG Gallery</h1>
        <p class="lead">New SVGs regularly, completely free</p>
    </div>
</main>
<?php
$counter = 0;
$isDivOpen = false;
$totalImages = count($xml->image);
$remainingSpaces = 3 - ($totalImages % 3);

foreach($xml->image as $image){
    if($counter % 3 == 0){
        if($isDivOpen) {
            echo '</div>';
        }
    }

    if($counter % 3 == 0){
        $isDivOpen = true;
        echo '<div class="row">';
    }

    echo '<div class="col-md-4"><span class="helper"></span><img src="' . $image->url . '" alt="' . $image->title . '" /></div>';

    $counter++;
}

for($i = 0; $i < $remainingSpaces; $i++){
    echo '<div class="col-md-4"><span class="helper">&nbsp;</span>&nbsp;</div>';
}

if($isDivOpen) {
    echo '</div>';
}

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>