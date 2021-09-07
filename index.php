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


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/faicon42.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/faicon42.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/faicon42.ico">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <meta name="msapplication-TileImage" content="assets/img/favicons/faicon42.ico">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
          <div class="row align-items-center g-2">
            
            <div class="col-md-5 col-lg-6 order-0 order-md-1  text-center flex-center">
              <img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/hero-header.gif" alt="hero-header" />
            </div>
            
            <div class="col-md-7 col-lg-6 flex-center">

 
              <img class="col-10" src="assets/img/gallery/logo.png" alt=""/>
              <br><br><br><br><br>
              
              <a class="btn hover-top btn-collab col-sm-10" target="_blank" href="https://api.whatsapp.com/send?phone=556581212085&text=Ola%2C%20Gostaira%20de%20saber%20mais%20" >
                <i class="fas fa-play me-2"></i>
                 FALE CONOSCO
              </a>
            
            </div>
          
          </div>
        </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6">

        <div class="container">
          <div class="row flex-center">
            
            <div class="col-md-6 col-lg-6 text-center mb-6 mb-md-0 order-0 p-5">
              <img class="shadow-lg col-sm-10" src="assets/img/banner1.png" style="border-radius:3rem;padding: 10px;" />
            </div>
            
            <div class="col-md-6 text-center text-md-start mb-6 offset-0">
              <h6 class="fs-0 text-uppercase fw-bold text-primary">Safety sindicos</h6>
              <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">
                Conheça nossos serviços
              </h6>
              <p style="font-size: 18pt;">
              Na Safety Síndico Profissionais atuamos na gestão de condomínios residenciais e comerciais. <br>
              Buscamos estabelecer uma relação transparente e de confiança com os nossos clientes, oferecendo suporte e atendimento diferenciados. <br>
              Assim, podemos contribuir de forma positiva em seu condomínio, sempre prezando pelos interesses dos condôminos. <br>
              </p>
            </div>
          
          </div>

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6" style="background:linear-gradient(180deg, #FFFEFC -54.51%, #FFF8F0 99.98%);">

        <div class="container">
          <div class="row flex-center">
            <div class="col-md-8 col-lg-6 text-center mb-6 mb-md-0 order-0 order-md-1  p-8">
              <img class="shadow-collab col-sm-12" src="assets/img/banner2.png" style="border-radius:3rem;padding: 15px;" />
            </div>
            
            <div class="col-md-4 text-center text-md-start">
              <h6 class="fs-0 text-uppercase fw-bold text-primary">SAFETY SINDICOS</h6>
              <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">Conheça nossos serviços</h6>
              <p style="font-size: 18pt;">
                 Você não consegue diminuir a inadimplência em seu condomínio? Não se preocupe, nós zeramos ela pra você!
              </p>
            </div>
          </div>
          <div class="row flex-center text-center">
            <br>
            <h1 style="font-Weigt: bold">Para maior agilidade</h1>
            <br><br>
            <div class="col-md-6 text-center text-md-start  flex-center ">
              <div class="badge bg-white p-3 rounded-3  flex-center "><img class="w-100 h-100" src="assets/img/icons/video.svg" alt="..." /></div>
              <h4 class="mt-5 mb-3 fw-bold">Vídeo conferência </h4>
              <p class="fs-1 lh-sm"><span class="text-900">
                Para comodidade e agilidade de pequenos assuntos podemos agendar video chamadas caso seja necessário.
              </p>
            </div>
            <div class="col-md-6 text-center text-md-start  flex-center ">
              <div class="badge bg-white p-3 rounded-3   flex-center ">
                <img class="w-100 h-100 " src="assets/img/icons/chat.svg" alt="..." /></div>
              <h4 class="mt-5 mb-3 fw-bold">Ligações e Mensagem</h4>
              <p class="fs-1 lh-sm"><span class="text-900">
                Estaremos 24/7 disponiveis para atendimento por ligações e para mensagens das 06:00Hrs até as 22:00Hrs 
              </p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
                <img src="assets/img/gallery/testimonial-2.png" class="rounded mx-auto d-block col-sm-5 p-1 " alt="...">
                <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                <h6 class="mb-1 fw-bold fs-2">Edifício Três Marias</h6>
                <h6 class="fs-0">  <a  target="_blank" href="https://goo.gl/maps/9bDVMfMPV1cgNpCU8">Localização</a>  </h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
              <img src="assets/img/gallery/testimonial-1.png" class="rounded mx-auto d-block col-sm-5  p-1 " alt="...">
              <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                  <h6 class="mb-1 fw-bold fs-2">Condomínio Edifício San Marco</h6>
                  <h6 class="fs-0">  <a  target="_blank" href="https://www.google.com/search?q=residencial%20san%20marco%20varzea%20grande&sxsrf=AOaemvLocAjlbvbPi_ZneuQx7Ln3xtDhVQ:1630902044418&ei=F5c1YayYCqnV1sQPiMOq8AQ&oq=residencial+san+marco+varzea+grande&gs_lcp=Cgdnd3Mtd2l6EAM6CggjEK4CELADECdKBAhBGAFQ1h1Y1h1gjiJoAXAAeACAAYoBiAGKAZIBAzAuMZgBAKABAcgBAcABAQ&sclient=gws-wiz&ved=2ahUKEwje5JTIv-nyAhU0qJUCHSruAzMQvS4wAHoECAYQIQ&uact=5&tbs=lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1&tbm=lcl&rflfq=1&num=10&rldimm=3314119027148735276&lqi=CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA&rlst=f#rlfi=hd:;si:3314119027148735276,l,CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA;mv:[[-15.6232486,-56.1361037],[-15.6552004,-56.1587757]];tbs:lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1">Localização</a>  </h6>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
                <img src="assets/img/banner4.png" class="rounded mx-auto d-block col-sm-5 p-1 " alt="...">
                <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                <h6 class="mb-1 fw-bold fs-2">Edifício Village Tropica</h6>
                <h6 class="fs-0">  <a  target="_blank" href="https://goo.gl/maps/9bDVMfMPV1cgNpCU8">Localização</a>  </h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
              <img src="assets/img/gallery/testimonial-1.png" class="rounded mx-auto d-block col-sm-5  p-1 " alt="...">
              <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                  <h6 class="mb-1 fw-bold fs-2">Condomínio Edifício San Marco</h6>
                  <h6 class="fs-0">  <a  target="_blank" href="https://www.google.com/search?q=residencial%20san%20marco%20varzea%20grande&sxsrf=AOaemvLocAjlbvbPi_ZneuQx7Ln3xtDhVQ:1630902044418&ei=F5c1YayYCqnV1sQPiMOq8AQ&oq=residencial+san+marco+varzea+grande&gs_lcp=Cgdnd3Mtd2l6EAM6CggjEK4CELADECdKBAhBGAFQ1h1Y1h1gjiJoAXAAeACAAYoBiAGKAZIBAzAuMZgBAKABAcgBAcABAQ&sclient=gws-wiz&ved=2ahUKEwje5JTIv-nyAhU0qJUCHSruAzMQvS4wAHoECAYQIQ&uact=5&tbs=lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1&tbm=lcl&rflfq=1&num=10&rldimm=3314119027148735276&lqi=CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA&rlst=f#rlfi=hd:;si:3314119027148735276,l,CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA;mv:[[-15.6232486,-56.1361037],[-15.6552004,-56.1587757]];tbs:lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1">Localização</a>  </h6>
                </div>
              </div>
            </div>


            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
                <img src="assets/img/gallery/testimonial-2.png" class="rounded mx-auto d-block col-sm-5 p-1 " alt="...">
                <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                <h6 class="mb-1 fw-bold fs-2">Edifício Três Marias</h6>
                <h6 class="fs-0">  <a  target="_blank" href="https://goo.gl/maps/9bDVMfMPV1cgNpCU8">Localização</a>  </h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-6">
              <div class="d-flex flex-column flex-sm-row align-items-start">
              <img src="assets/img/gallery/testimonial-1.png" class="rounded mx-auto d-block col-sm-5  p-1 " alt="...">
              <img class="me-sm-3 my-2 my-sm-0 align-self-center align-self-sm-start" src="assets/img/icons/quot.svg" alt="..." />
                <div class="flex-1 text-center text-sm-start">
                  <h6 class="mb-1 fw-bold fs-2">Condomínio Edifício San Marco</h6>
                  <h6 class="fs-0">  <a  target="_blank" href="https://www.google.com/search?q=residencial%20san%20marco%20varzea%20grande&sxsrf=AOaemvLocAjlbvbPi_ZneuQx7Ln3xtDhVQ:1630902044418&ei=F5c1YayYCqnV1sQPiMOq8AQ&oq=residencial+san+marco+varzea+grande&gs_lcp=Cgdnd3Mtd2l6EAM6CggjEK4CELADECdKBAhBGAFQ1h1Y1h1gjiJoAXAAeACAAYoBiAGKAZIBAzAuMZgBAKABAcgBAcABAQ&sclient=gws-wiz&ved=2ahUKEwje5JTIv-nyAhU0qJUCHSruAzMQvS4wAHoECAYQIQ&uact=5&tbs=lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1&tbm=lcl&rflfq=1&num=10&rldimm=3314119027148735276&lqi=CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA&rlst=f#rlfi=hd:;si:3314119027148735276,l,CiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZVorIiNyZXNpZGVuY2lhbCBzYW4gbWFyY28gdmFyemVhIGdyYW5kZSoECAMQAJIBE2NvbmRvbWluaXVtX2NvbXBsZXiqAR0QASoZIhVyZXNpZGVuY2lhbCBzYW4gbWFyY28oDA;mv:[[-15.6232486,-56.1361037],[-15.6552004,-56.1587757]];tbs:lrf:!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:1">Localização</a>  </h6>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-md-0 bg-warning-gradient">

        <div class="container">
          <div class="row flex-center">
            <div class="col-md-6"> <img class="w-100 w-lg-75 d-none d-md-block" src="assets/img/gallery/cta.png" width="320" alt="cta" /></div>
            <div class="col-md-6">
              <h1 class="fw-bold fs-4 fs-lg-5 fs-xl-6 mb-4 text-primary"> 
               Sempre dispostos ao atendimento
              </h1>
            </div>
          </div>
        </div>
        <!-- end of .container-->


      <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center mb-3">
              <h6 class="fw-bold fs-4 display-3 lh-sm mb-5">Perguntas Frequentes</h6>
            </div>
          </div>
          <div class="row flex-center">
            <div class="col-lg-9">
              <div class="accordion" id="accordionExample">

                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading2">
                  <a target="_blank" class="btn hover-top btn-collab col-sm-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                      Solicite uma proposta
                  </a>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">

                      <form action="#" method="post" name="formpost" id="formpost">

                        <div class="form-row">
                          <div class="form-group col-sm-12">
                            <label for="inputEmail4">Nome</label>
                            <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Nome" require>
                          </div>
                        </div>  
                        <br>
                        <div class="form-row">
                          <div class="form-group col-sm-12">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" require>
                          </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="inputAddress">Telefone</label>
                          <input type="text" class="form-control" name="telefone" id="inputAddress" placeholder="65 9 8899-9999" require>
                        </div>
                        <br>
                        <div class="form-group"> 
                          <label for="inputAddress2">Nome do condominio</label>
                          <input type="text" class="form-control" name="nomecondominio" id="inputAddress2" placeholder="Edificio Maria Bonita" require>
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="inputAddress2">Cidade</label>
                          <input type="text" class="form-control" name="cidade" id="inputAddress2" placeholder="Cuiabá,Varzea Grande,São Paulo," require>
                        </div>

                        <br>
                        <div class="form-group">
                          <button type="submit" name="enviar" class=" form-control btn hover-top btn-collab btn-sm-12">Enviar Solicitação</button>
                        </div>
                      
                      </form>
                   
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      <!-- ============================================-->

      <section class="pb-md-10" id="faq">
      <!-- <section> begin ============================
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center mb-3">
              <h6 class="fw-bold fs-4 display-3 lh-sm mb-5">Perguntas Frequentes</h6>
            </div>
          </div>
          <div class="row flex-center">
            <div class="col-lg-9">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1"><span class="mb-0 fw-bold text-start fs-1 text-1000">Who should use the app?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">All our users like the amazing features and illustration of our app and it effective working procedure. Most of them are highly satisfied with our support and collaboration ideas which are counted as quite an essential in the tech business. With a team of highly creative and lively developers and manager, all our issues are promised to be solved in no time at all.</div>
                  </div>
                </div>
                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button px-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="mb-0 fw-bold text-start fs-1 text-1000">What is the working procedure of the app?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">You can issue either partial or full refunds. There are no fees to refund a charge, but the fees from the original charge are not returned.</div>
                  </div>
                </div>
                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button px-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3"><span class="mb-0 fw-bold text-start fs-1 text-1000">How is the app helpful?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse3" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">Disputed payments (also known as chargebacks) incur a $15.00 fee. If the customer’s bank resolves the dispute in your favor, the fee is fully refunded.</div>
                  </div>
                </div>
                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading4">
                    <button class="accordion-button px-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4"><span class="mb-0 fw-bold text-start fs-1 text-1000">Is the app workable while you got no internet?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse4" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">There are no additional fees for using our mobile SDKs or to accept payments using consumer wallets like Apple Pay or Google Pay.</div>
                  </div>
                </div>
                <div class="accordion-item border-top">
                  <h2 class="accordion-header" id="heading5">
                    <button class="accordion-button px-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5"><span class="mb-0 fw-bold text-start fs-1 text-1000">What are the security measure of the app?</span></button>
                  </h2>
                  <div class="accordion-collapse collapse" id="collapse5" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-0 px-2">There are no additional fees for using our mobile SDKs or to accept payments using consumer wallets like Apple Pay or Google Pay.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-md-0">
        <div class="bg-holder" style="background-image:url(assets/img/gallery/cta-2-bg.png);background-position:center;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-3 text-center">
                <img class="mt-n8 d-none d-md-block w-100" src="assets/img/banner3.png" alt="cta" />
            </div>
            <div class="col-md-7 col-lg-8 offset-lg-1">
              <h3 class=" text-white">
                Viaje tranquilo sabendo que seu condomínio está seguro! Com a Safety Síndicos Profissionais você conta com uma equipe de excelência. 
              </h3>
              <p style="font-size:18pt">
              Você tem receio do síndico profissional? Entenda que o síndico profissional está à disposição de um condomínio 24 horas por dia, pois, ele responde criminalmente e juridicamente pelo condomínio.⠀
              </p>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
          <div class="row flex-center mt-12">
            <div class="col-lg-6">
              <h4 class="fw-bold">Receba nossas novidades</h4>
              <p class="fs-1">Conteudo atualizado sobre condominios e areas afins</p>
            </div>
          </div>

          <!--
          <hr class="text-200" />
          <div class="row justify-content-lg-between circle-blend-right circle-danger">
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">WHY US</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Channel</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Engagement</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Scale</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Watch Demo</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">PRODUCT</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Features</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Integrations</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Enterprise</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Solutions</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">RESOURCES</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Partners</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Developers</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Apps</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Blogs</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">COMPANY</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">About Us</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Leadership</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Investor Relations</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">News</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">PRICING</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Plans</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Paid vs. Free</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">FOLLOW</h6>
              <ul class="list-unstyled list-inline my-3">
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/facebook.svg" alt="" /></a></li>
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/twitter.svg" alt="" /></a></li>
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/instagram.svg" alt="" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/snapchat.svg" alt="" /></a></li>
              </ul>
            </div>
          </div>
             -->
        </div>
     

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
  </body>

</html>


