<?php 
function contatoController(){
    $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($uri === '/contato/send' || $uri === '/contato')) {
        contatoSend();
        return;
    }

    render("contatoView", "Contato");
}

function contatoSend(){
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    $errors = [];
    if ($nome === '') {
        $errors[] = 'O nome é obrigatório.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'E-mail inválido.';
    }
    if ($mensagem === '') {
        $errors[] = 'A mensagem não pode ficar vazia.';
    }

    if (!empty($errors)) {
        $data = [
            'errors' => $errors,
            'old' => [
                'nome' => htmlspecialchars($nome),
                'email' => htmlspecialchars($email),
                'assunto' => htmlspecialchars($assunto),
                'telefone' => htmlspecialchars($telefone),
                'mensagem' => htmlspecialchars($mensagem),
            ]
        ];
        render('contatoView', 'Contato', $data);
        return;
    }

    $to = 'gbplinioq@gmail.com';
    $subject = $assunto ?: 'Mensagem de contato - TechFit';
    $body = "Nome: $nome\nEmail: $email\nTelefone: $telefone\n\nMensagem:\n$mensagem";
    $headers = "From: $nome <$email>\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $sent = false;
    if (function_exists('mail')) {
        $sent = mail($to, $subject, $body, $headers);
    }

    if ($sent) {
        flash('Mensagem enviada com sucesso!', 'success');
    } else {
        flash('Recebemos sua mensagem. Em servidores sem mail configurado, ela não será enviada por email.', 'success');
    }

    header('Location: /contato');
    exit;
}