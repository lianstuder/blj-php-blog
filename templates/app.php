<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Skeleton CSS Framework Stylesheets -->
    <link rel="stylesheet" href="./static/styles/skeleton.css">
    <link rel="stylesheet" href="./static/styles/normalize.css">

    <!-- Browser favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./static/images/favicon.ico" />

    <!-- Custom Stylesheet  -->
    <link rel="stylesheet" href="./static/styles/index.css">
    
    <title>Archwiki</title>
</head>
<body>
    <header>
        <div id="title-bar">
            <img src="./static/images/favicon_64.png" alt="Archwiki" />
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
        <main>
            <?php 
            // Include view
            foreach ($views as $index => $view) {
                if ($page === $view) {
                    include "./views/$view";
                    break;
                }
            }
            ?>
        </main>  
    </div>
    <footer>
        <ul>
        </ul>
    </footer>
</body>
</html>
