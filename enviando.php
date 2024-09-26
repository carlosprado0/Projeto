<?php 

require 'vendor/autoload.php';
require './AwsSes.php';

// Verificar se o formulário foi enviado e pegar os dados
if (isset($_POST['enviar_email'])) {
    // valores do formulário
    $emails = $_POST['emails']; // Pode ser um ou mais e-mails separados por vírgula
    $subject = $_POST['email_subject'];
    $body = $_POST['email_body'];

    // Verificar se os campos estão preenchidos
    if (!empty($emails) && !empty($subject) && !empty($body)) {
        // Separar os e-mails por vírgula e remover espaços extras
        $emails = array_map('trim', explode(',', $emails));

        // Instanciar a classe AwsSes e enviar o e-mail
        $serviceEmail = new AwsSes();
        $serviceEmail->senEmail($emails, $subject, $body);
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>