<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h3>Contact Page</h3>
    <p>
        <?php echo $data; echo $script; ?>
    </p>
    <p>
        PHP => <?php echo htmlentities($script); ?> <br/>
        Laravel => {{$script}}
    </p>
</body>
</html>