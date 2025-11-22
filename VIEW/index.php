<?php

$assets_address = "../ASSETS/";
$css_address = $assets_address ."STYLES/root.css";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHAS</title>
    <link rel="stylesheet" href="<?php echo $css_address;?>">
</head>
<body>
    <header>
        <h1>SHAS</h1>
        <h2>Self Hosted Assesment System</h2>
    </header>
    <main>
        <h1>Available Quizes:</h1>
        <div class="card">
            <h1>Quiz ABC</h1>
            <p>Duration: </p>
            <p>Start: </p>
            <p>End: </p>
            <a>Go to quiz</a>
        </div>
    </main>
</body>

</html>