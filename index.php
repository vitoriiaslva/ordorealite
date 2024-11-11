<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega o valor do e-mail do formulário
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Verifica se o e-mail é válido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Seu e-mail (onde você deseja receber o e-mail)
        $to = "ordorealite@gmail.com";  // Substitua por seu e-mail

        // Assunto do e-mail
        $subject = "Novo Participante no Ordo Realite";

        // Corpo do e-mail
        $message = "Alguém acabou de se registrar no Ordo Realite com o e-mail: " . $email;

        // Cabeçalhos do e-mail
        $headers = "From: noreply@ordorealite.com" . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Envia o e-mail
        if (mail($to, $subject, $message, $headers)) {
            echo "Seu e-mail foi enviado com sucesso.";
        } else {
            echo "Houve um erro ao enviar seu e-mail.";
        }
    } else {
        echo "E-mail inválido.";
    }
}
?>
