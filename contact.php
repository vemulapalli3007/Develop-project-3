<?php

// Receiving for form details to php variables
$reason = $_POST["reason"];
$email = $_POST["email"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];


// Checking all fields are entered or not
if ($name == NULL || $email == NULL || $reason == NULL || $subject == NULL || $message == NULL) {
    if($name==NULL){
        header('Location: contactStatus.php?Message=Please Enter Name');
    }else if($email == NULL){
        header('Location: contactStatus.php?Message=Please Enter Email');
    }else if($reason == NULL){
        header('Location: contactStatus.php?Message=Please Enter Reason');
    }else if($subject == NULL){
        header('Location: contactStatus.php?Message=Please Enter Subject');
    }else if($message == NULL){
        header('Location: contactStatus.php?Message=Please Enter Message');
    }
    
} else {
    $email = checkEmail($email);
    // Checking email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: contactStatus.php?Message=Invalid Email Address');
    } else {
        // creating connection with local mysql
        $conn = mysqli_connect("localhost", "root", "root", "Profile");
        $sql = "insert into enquiry(name,email,reason,subject,message,enquiryDate) values('" . $name . "','" . $email . "','" . $reason . "','" . $subject . "','" . $message . "',now())";
        if ($conn->query($sql) === TRUE) {
           
            // Forming the message to send
            $message = "<h1>" . $name . " is Enqired for Your Profile The Person Details are :</h1><br><h2>";
            $message .= "Name                :" . $name . "<br>";
            $message .= "Email               :" . $email . "<br>";
            $message .= "Reason              :" . $reason . "<br>";
            $message .= "Subject             :" . $subject . "<br>";
            $message .= "Message             :" . $message . "<br><br>";

            // This Header to send email
            $header = "From:vemulapallisai92@gmail.com\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            // This mail function will send email
            $retval = mail($email, $subject, $message, $header);

            if ($retval == TRUE) {
                header('Location: contactStatus.php?Message=Your Enquiry Submitted Successfully');
            } else {
                header('Location: contactStatus.php?Message=Mail Sending Failed');
            }
        } else {
            header('Location: contactStatus.php?Message=Wrong Query');
        }
    }
}

// This function will check wheather email is formatted or not
function checkEmail($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



