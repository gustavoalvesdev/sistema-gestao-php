<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Estoque - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= BASE_URL.'assets/css/login.css'; ?>">
    </head>
    <body>
        <div class="loginarea">
            <form method="POST">
                Seu email:<br />
                <input type="email" name="email" /><br /><br />
            
                Sua senha:<br />
                <input type="password" name="password" /><br /><br />
            
                <input type="submit" value="Entrar" />
            </form>
            
            <?php if (! empty($msg)): ?>
            
                <h2><?= $msg ?></h2>
            
            <?php endif; ?>
        </div>
        <!-- loginarea -->
    </body>
</html>