<?php   
    $nombre=$_POST["nombre"];
    $email=$_POST["email"];
    $mensaje=$_POST["mensaje"];

    $contenido="Nombre: " . $nombre . "<br>Correo: " .  $email . "<br>Mensaje:" . $mensaje;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php'; 
 
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '*************@gmail.com';                     // SMTP username
        $mail->Password   = '***************';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for

        //Recipients
        $mail->setFrom('paginapropia123@gmail.com', $nombre );
        $mail->addAddress('paginapropia123@gmail.com');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Pagina web';
        $mail->Body    = $contenido;

        $mail->send();
        echo '<script>
            alert("El mensaje se envio correctamente");
            window.history.go(-1);
        </script>';
    } catch (Exception $e) {
        echo "Hubo un error: {$mail->ErrorInfo}";
    }
?>