<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <nav>
                <ul>
                    <?php foreach($menu as $item): ?>
                        <li><a href="<?= $item['link'] ?>" <?= ($item['class'] != '') ? 'class="'.$item['class'].'"' : '' ?>   <?= ($item['id'] != '') ? 'id="'.$item['id'].'"' : '' ?>><?= $item['text'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <!-- container -->
    </div>
    <!-- header -->
    <div class="container">
        