<?php
$success = false;

if(isset($_REQUEST['q'])){
    $domain = $_REQUEST['q'];
    if(preg_match('/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/', $domain)){
        $host = gethostbyname($domain);
        if($host != $domain){
            // ip is here
            $success = true;
        } else {
            //doesn't point anywhere
            $errorMsg = "No address found";
        }
    } else {
        // attempt to parse the url
        $parsed = parse_url($domain);
        if(isset($parsed['host'])){
            $domain = $parsed['host'];
            $host = gethostbyname($parsed['host']);
            if($host != $domain){
                // ip is here
                $success = true;
            } else {
                //doesn't point anywhere
                $errorMsg = "No address found";
            }
        } else {
            // malformed as fuck
            $errorMsg = "Cannot parse Url";
        }
    }
    $domain = htmlentities($domain);
} else {
    $domain = "";
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url to IP</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,400' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="header-container">
    <div id="title">Url to IP</div>
</div>
<div id="form-container">
    <form id="url-form" name="url" action="index.php" method="get">
        <input id="search-text" type="text" name="q" value="<?php echo $domain; ?>" data-placeholder="Url to search">
        <input id="search-btn" type="submit" value="Submit">
    </form>
</div>
<div id="output">
    <?php
    if($success)
        echo $host;
    else
        echo $errorMsg;
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>