<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/feedback.css">
    <title>Feedback</title>
</head>
<body>
    <div class="main">
        <h1>Feedback</h1>
        <form action="../PHP/feedback.php" method="POST">
            <input name="name" type="text" placeholder="Name">
            <input name="subject" type="text" placeholder="Subject">
            <textarea name="textarea" rows="4" cols="50" placeholder="Please write your valuable feedback here and help us to grow..."></textarea>
            <input name="Submit" type="submit" value="Send Feedback">
        </form>
    </div>
</body>
</html>