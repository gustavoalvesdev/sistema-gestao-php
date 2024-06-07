<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Estoque - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE_URL.'assets/css/login.css'; ?>">
    </head>
    <body>
        <div class="loginarea">
            <h1>Sistema de Gestão</h1>
            <form method="POST">
                Seu e-mail:<br />
                <input type="email" name="email" /><br /><br />
            
                Sua senha:<br />
                <input type="password" name="senha" /><br /><br />
            
                <input type="submit" value="Entrar" />
            </form>
            
            <?php if (! empty($mensagem)): ?>
            
                <h2><?= $mensagem ?></h2>
            
            <?php endif; ?>

        </div>
        <!-- loginarea -->
    </body>
</html>