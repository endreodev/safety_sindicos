<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    require 'vendor/autoload.php';

    // Classe de prenchimento de dados
    class ProtectMail
    {
        //Metodos SET
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setEmail($email){
            $this->email = $email;
        } 
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        } 
        public function setNomeCondominio($nomecondominio){
            $this->nomecondominio = $nomecondominio;
        } 
        public function setMensagem($mensagem){
            $this->mensagem = $mensagem;
        }
      
        //Metodos GET
        public function getNome(){
            $this->nome ;
        }
        public function getEmail(){
            $this->email;
        } 
        public function getTelefone(){
            $this->telefone ;
        } 
        public function getNomeCondominio(){
            $this->nomecondominio;
        } 
        public function getMensagem(){
            $this->mensagem;
        }
    
    
    
        //Adicona Usuario
        function PostEmail(){
    
            $mail = new PHPMailer(true);

            try {
                //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                       //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contato@safetysindicos.com.br';        //SMTP username
                $mail->Password   = 'Delete@1212';                             //SMTP password
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
                        <h1 class="center"> Ola! '.$this->nome.' </h1> <br>
                        <h3 class="center">Estamos muito felizes em poder atendelo</h3><br>
                        <h3 class="center">Logo mais entraremos em contato.</h3>
                        <h3 class="center">
                            Foram enviados os seguintes dados: <br>
                            Nome:               '.$this->nome.'  <br>
                            Email:              '.$this->email.'  <br>
                            Telefone:           '.$this->telefone.'  <br>
                            Nome do condominio: '.$this->nomecondominio.'  <br>
                            Mensagem:           '.$this->mensagem.'  <br>
                        </h3></td></tr></table></body></html>';
            
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Gostariamos de ajudar você';
                    $mail->Body    = $html;
                    $mail->AltBody = 'Tambem prestamos consultoria para sindicos.';
                
                    $mail->send();

                    $this->Alertmsg('success','Envio de email!', 'SEU EMAIL FOI ENVIADO COM SUCESSO.!');
               
                } catch (Exception $e) {

                    $this->Alertmsg('error','Envio de email!', 'Mailer Error: '.$mail->ErrorInfo.'.!');
                 
                }
        }

        
    
        //Gera consulta de Sql em json 
        function GetDataJson($sql){
    
            $object = new stdClass();
    
            $stmt = DB::prepare($sql);
            $stmt->execute();
            $resut = $stmt->fetchAll();
    
            $str = $this->GetResponse( $resut );
            $object = (object) $str;
    
            return json_decode( $object->scalar );
    
        }
    
        //Alerta sem redirecionamento 
        function Alertmsg($type,$title,$msg){
    
            echo "<script type='text/javascript'>
            Swal.fire({
              icon:  '$type',
              title: '$title',
              text: '$msg',
              timer: 2000
            });
            
            </script>";
        }
    
        //Tratamento de retorno json 
        function GetResponse($json){
            return  $o_json = json_encode(  $json, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ); 
        }
    
    }

?>