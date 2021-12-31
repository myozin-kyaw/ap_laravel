<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{$post->name}} has successfully created</h2>
    <h3>Subject - {{$post->description}}</h3>
    <p>
    Occasionally, you may need to send a mailable to a list of recipients by iterating over an array of recipients / email addresses. However, since the to method appends email addresses to the mailable's list of recipients, each iteration through the loop will send another email to every previous recipient. Therefore, you should always re-create the mailable instance for each recipient:
    </p>
</body>
</html>