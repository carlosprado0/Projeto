<?php
require 'vendor/autoload.php';

use Aws\Exception\AwsException;

class AwsSes
{
    private $sesClient;

    public function __construct()
    {
        $this->sesClient = new Aws\Ses\SesClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
               'key' => '',
                'secret' => '',
            ]
        ]);
    }

    public function senEmail($emails, $subject, $body)
    {
        $sender_email = 'ibroonkzz@gmail.com';  // Remetente fixo (pode ser alterado se necessário)
        $char_set = 'UTF-8';

        try {
            $result = $this->sesClient->sendEmail([
                'Destination' => [
                    'ToAddresses' => $emails, 
                ],
                'ReplyToAddresses' => [$sender_email],
                'Source' => $sender_email,
                'Message' => [
                    'Body' => [
                        'Html' => [
                            'Charset' => $char_set,
                            'Data' => $body,  // corpo do e-mail 
                        ],
                        'Text' => [
                            'Charset' => $char_set,
                            'Data' => strip_tags($body),  // texto do corpo
                        ],
                    ],
                    'Subject' => [
                        'Charset' => $char_set,
                        'Data' => $subject,  // 
                    ],
                ],
            ]);

            echo "Email enviado com sucesso.";
        } catch (AwsException $e) {
            // Exibir mensagem de erro se falhar
            echo $e->getMessage();
            echo "\n";
        }
    }
}
?>