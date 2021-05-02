<?php
if($_POST)
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
    
    $to_Email       = "james_28@outlook.com"; 
    $subject        = 'Message from contact form';
    
    
    if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMessage"])) {
        die();
    }

   
    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
    
   
    if(strlen($user_Name) < 4) {
        header('HTTP/1.1 500 Name is too short or empty!');
        exit();
    }
    if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
        header('HTTP/1.1 500 Please enter a valid email!');
        exit();
    }
    if(strlen($user_Message) < 5) {
        header('HTTP/1.1 500 Too short message! Please enter something.');
        exit();
    }
    
   
    $headers = 'From: '.$user_Email.'' . "rn" .
    'Reply-To: '.$user_Email.'' . "rn" .
    'X-Mailer: PHP/' . phpversion();
    
    $sentMail = @mail($to_Email, $subject, $user_Message .'  -'.$user_Name, $headers);
    
    if(!$sentMail)  {
        header('HTTP/1.1 500 Could not send mail! Sorry..');
        exit();
    } else {
        echo 'Hi '.$user_Name .', Thank you for your email! ';
        echo 'Your email has been delivered.';
    }
}
?>