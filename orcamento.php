<?php

$nome=$_POST['nome'];
 $email=$_POST['email'];
 $telefone=$_POST['telefone'];
 $celular=$_POST['celular'];
 $whatsapp=$_POST['whatsapp'];
 $mensagem=$_POST['texto'];
#
# Exemplo de envio de e-mail SMTP PHPMailer - www.secnet.com.br
#
# Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require_once("class.phpmailer.php");
require_once("class.smtp.php");
# Inicia a classe PHPMailer
$mail = new PHPMailer();

# Define os dados do servidor e tipo de conexão
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "mail.tritonengenharia.com.br"; # Endereço do servidor SMTP
$mail->Port = 587; // Porta TCP para a conexão
$mail->SMTPAutoTLS = true; // Utiliza TLS Automaticamente se disponível
$mail->SMTPAuth = false; # Usar autenticação SMTP - Sim
$mail->Username = 'dispara@tritonengenharia.com.br'; # Usuário de e-mail
$mail->Password = 'senha do email'; // # Senha do usuário de e-mail

# Define o remetente (você)
$mail->From = "dispara@tritnengenharia.com.br"; # Seu e-mail
$mail->FromName = "Orçamento da Triton Engenharia"; // Seu nome

# Define os destinatário(s)
$mail->AddAddress('andregds85@gmail.com', 'dispara@tritnengenharia.com.br'); # Os campos podem ser substituidos por variáveis
$mail->AddAddress('dispara@tritnengenharia.com.br'); # Caso queira receber uma copia
$mail->AddCC('dispara@tritnengenharia.com.br', 'Triton Engenharia '); # Copia
#$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); # Cópia Oculta

# Define os dados técnicos da Mensagem
$mail->IsHTML(true); # Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; # Charset da mensagem (opcional)

# Define a mensagem (Texto e Assunto)
$mail->Subject = "Solicito orçamento Triton Engenharia"; # Assunto da mensagem
$mail->Body = "Corpo da Mensagem Triton Engenharia, </b>! :)";
$mail->Body = '
  <table>
    <tr>
      <p>Solicito Orçamento Triton Engenharia.</p>
    </tr>
    <tr>
      
      <td>Nome: </td>
      <td>' . $_POST['nome'] . '</td>
    </tr>
    <tr>
      <td>Email: </td>
      <td>' . $_POST['email'] . '</td>
    </tr>
    <tr>
      <td>Telefone: </td>
      <td>' . $_POST['telefone'] . '</td>
    </tr>
    <tr>
      <td>Mensagem: </td>
      <td>' . $_POST['texto'] . '</td>
    </tr>
  </table>
';



$mail->AltBody = "Este é o corpo da mensagem de teste, somente Texto! \r\n :)";

# Define os anexos (opcional)
#$mail->AddAttachment("c:/temp/documento.pdf", "documento.pdf"); # Insere um anexo
#$mail->AddAttachment("envia.php");
# Envia o e-mail
$enviado = $mail->Send();

# Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

# Exibe uma mensagem de resultado (opcional)
if ($enviado) {
 echo "E-mail enviado com sucesso!";
 echo "<script language= 'JavaScript'>
location.href='http://www.tritonengenharia.com.br'
</script>";
    
} else {
 echo "Não foi possível enviar o e-mail.";
 echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}
?>