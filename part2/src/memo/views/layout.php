<!DOCKTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <header class="navbar shadow-sm mx-3">
        <h1>
            <a class="text-body text-decoraiton-none" href="index.php">めもめも</a>
        </h1>
    </header>
    <div class="container">
        <?php include $content; ?>
    </div>
</body>