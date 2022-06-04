<?php //Backend part
    if(isset($_POST["Submit"]))
    {
        $temp = $_POST["textarea"];
        $subject = $_POST["subject"];
        $name = $_POST["name"];

        $message = "\n\n"."         Hello CODER... my name is ".$name."\n\n\n       $temp";

        $sender_email = "from: osfeedback1980@gmail.com";
                
        if(mail("<manavpatel14072002@gmail.com>,<vaidesai171202@gmail.com>,<nisargeeraval0402@gmail.com>,<prachidchauhan02@gmail.com>",$subject,$message,$sender_email))
        {
            header("location: ../HTML/feedback.php");   
        }
        else
        {
            header("location: ../HTML/feedback.php");  
        }
    }
?>