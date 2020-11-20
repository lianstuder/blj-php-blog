<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Skeleton CSS Framework Stylesheets -->
    <link rel="stylesheet" href="./static/styles/skeleton.css">
    <link rel="stylesheet" href="./static/styles/normalize.css">

    <!-- Custom Stylesheet  -->
    <link rel="stylesheet" href="./static/styles/index.css">
    
    <title>Archwiki</title>
</head>
<body>
    <header>
        <div id="title-bar">
            <h1>Blog</h1>
            <nav>
                <ul>
                    <?php foreach($views as $name => $view): ?>
                    <li><a href="?page=<?= htmlspecialchars($view); ?>"><?= htmlspecialchars($name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php includeView($views, $page); ?>   
    </div> 
</body>
</html>
