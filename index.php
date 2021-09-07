<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  require 'vendor/autoload.php';

  $mail = new PHPMailer(true);
?>


<?php

//Create an instance; passing `true` enables exceptions
if(isset($_POST['enviar'])){

try {
    //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato@safetysindicos.com.br';        //SMTP username
    $mail->Password   = 'caloi157';                             //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato@safetysindicos.com.br', 'Safety Sindicos Proficionais');
    $mail->addAddress($_POST['email'], 'Safety Sindicos Proficionais');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('endreo.cba@gmail.com');
    $mail->addCC('contato@safetysindicos.com.br');
    //$mail->addBCC('bcc@example.com');
    $html = '
    <!doctype html>
    <html lang="pt-br">
      <head>
      <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
        <title>Safety Sindicos</title>
        <style type="text/css">
          .layout{width: 500px;height: 300px;border-radius: 15pt;}
          .layout1{width: 500px;height: 150px;border-radius: 15pt;}
          .center{text-align: center;}
          .orange{background: darkorange;}
        </style>
      </head> <body><table>
        <tr class="layout1"><td> 
              </td></tr><tr> <td class="layout orange">
              <h1 class="center"> Ola! '.$_POST['nome'].' </h1> <br>
              <h3 class="center">Estamos muito felizes em poder atendelo</h3><br>
              <h3 class="center">Logo mais entraremos em contato.</h3>
              <h3 class="center">
                Foram enviados os seguintes dados: <br>
                Nome:               '.$_POST['nome'].'  <br>
                Email:              '.$_POST['email'].'  <br>
                Telefone:           '.$_POST['telefone'].'  <br>
                Nome do condominio: '.$_POST['nomecondominio'].'  <br>
                Cidade:             '.$_POST['cidade'].'  <br>
              </h3></td></tr></table></body></html>';
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gostariamos de ajudar você';
    $mail->Body    = $html;
    $mail->AltBody = 'Tambem prestamos consultoria para sindicos.';

    $mail->send();
    echo '<br>
    <div class="alert alert-success text-center" role="alert">
      <br>
          SEU EMAIL FOI ENVIADO COM SUCESSO.
      <br>
    </div>';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>


<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Safety Sindicos</title>

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <!--img class="me-1 d-inline-block img-top" src="assets/img/gallery/logo.png" alt=""/>-->
        </div>
      </nav>
      <section id="home">
        <div class="container">
            <div class="row">
              <div class="col-sm-3"></div>
              <img class="col-sm-6" src="assets/img/gallery/logo.png" alt=""/>
              <div class="col-sm-3"></div>
              </div>
              <br><br><br><br><br>
              
              <a class="btn hover-top btn-collab col-sm-12" target="_blank" href="https://api.whatsapp.com/send?phone=556581212085&text=Ola%2C%20Gostaira%20de%20saber%20mais%20" >
                <i class="fas fa-play me-2"></i>
                 FALE CONOSCO
              </a>
            
        </div>
      </section>

    </body>

</html>


