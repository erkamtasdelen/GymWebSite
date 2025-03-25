<?php




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPKeepAlive = true;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->CharSet = 'UTF-8';


$mailb = $_GET["mail"];
$isim = $_GET["isim"];
$telefon =$_GET["tel"];





$mail->Port = 465;
$mail->Host = "altunspor.com";



$mail->Username = "info@altunspor.com";
$mail->Password = "pas78k78k78";

$mail->setFrom("info@altunspor.com", "AltunSpor");


$mail->addAddress ($mailb,$isim); 

$mail->Subject = "Fiyat Broşürü";
$msg = "Fiyatlar-->\n\nErkek Fitness Fiyatları\n Aylık - 130₺\n3 Aylık : 350₺\n6 Aylık : 650₺\n1 Yıllık: 1000₺\n\nBayan Fitness Fiyatları\nAylık - 100₺\n3 Aylık : 250₺\n6 Aylık :450₺\n1 Yıllık: 800₺\n\nKick Boks Fiyatları \nAylık - 130₺\n3 Aylık : 350₺\n6 Aylık : 600₺\n1 Yıllık: 1000₺\n\n\n*Öğrenci indirimimizle erkek fitness ücreti 3 Aylık - 300₺ Olmaktadır. \n*İlk kayıtta ekstradan 20₺ kart ve kayıt ücreti alınmaktadır.";

$mail->Body = $msg;
if ($mail->send()) {
    
}else {
    echo $mail->ErrorInfo;
}


$mails = new PHPMailer();
$mails->isHTML(true);
$mails->isSMTP();
$mails->SMTPKeepAlive = true;
$mails->SMTPAuth = true;
$mails->SMTPSecure = "ssl";
$mails->CharSet = 'UTF-8';



$mails->Port = 465;
$mails->Host = "altunspor.com";



$mails->Username = "info@altunspor.com";
$mails->Password = "pas78k78k78";

$mails->setFrom("info@altunspor.com", "AltunSpor");


$mails->addAddress ("altunspor@gmail.com","AltunSpor"); 

$mails->Subject = "Fiyat Broşürü Verildi";
$mails->Body = "Bilgiler \n". $isim . "\n" . $mailb . "\n" . $telefon;

if ($mails->send()) {
    
}else {
    echo $mails->ErrorInfo;
}





$servername = "79.98.129.101";
$username = "altunspo";
$password = "RatHdx1935";
$dbname = "altunspo_Kayit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Bilgiler (isim, mail, tel)
VALUES ('$isim', '$mailb', '$telefon')";

if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başarılı</title>
    <link rel="stylesheet" href="mail.css">

</head>
<body>
    <div>
        <section id="text">

            <h1>Başarılı</h1>
            <p>Bizi tercih etiğiniz için teşşekürler. Tüm bilgiler <?= $mailb ?>'a gönderilmiştir. </p>
            
            
            
        </section>
        
    </div>
    
</body>
</html>


