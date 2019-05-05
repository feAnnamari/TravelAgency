<?php
if(isset($_POST['email'])) {

    $email_to = "fe.annamari@gmail.com";
    $email_subject = "Valaki üzenetet küldött!";
 
    function died($error) {
        echo "Valami hiba történt az üzenet küldése során.";
        echo $error."<br /><br />";
        echo "Kérjük lépjen vissza, és próbálja újra!";
        die();
    }
 

    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Valami hiba történt az üzenet küldése során.');       
    }
 
     
 
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name'];
    $email_from = $_POST['email'];
    $telephone = $_POST['telephone'];
    $comments = $_POST['comments'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Nem valós email címet adott meg.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'A keresztnév mező nem megfelelően lett kitötve.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'A vezetéknév mező nem megfelelően lett kitötve.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'Az üzenet mező nem megfelelően lett kitötve.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

Köszönjük üzenetét, hamarosan kapcsolatba lépünk önnel.
 
<?php
 
}
?>