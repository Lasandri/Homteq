<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign up</h1>
    <h2>This is header two</h2>
    
    <?php
    echo "This is php logic interpretation embeded into HTML web pagr";
    ?>
    <hr>
    <?php
    echo "This is the second section of PHP";
    echo "<hr/>";

    $marks = 50;
    if($marks >75){
        ?>
        <div id = "true_sec">
            <?php echo "<h1 style = 'color:green'> $marks </h1>" ?>
            <h1 style = "color:green">This is the true section </h1>
        </div>
        <br/>   
    <?php } else { ?>
        <div id = "false_sec">
            <?php echo "<h1 style = 'color:red'> $marks </h1>" ?>
            <h1 style = "color:red"> This is the false section </h1>
        </div>
    <?php } ?>
    
</body>
</html>