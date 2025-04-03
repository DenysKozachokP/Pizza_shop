<?php
$page = $_GET['page'] ?? 'welcome';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Storybook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="storybook-nav">
        <h1>Storybook</h1>
        <ul>
            <li><a href="?page=welcome">Welcome</a></li>
            <li><a href="?page=product-card">Product Card</a></li>
            <li><a href="?page=basket-item">Basket Item</a></li>
        </ul>
    </nav>
    
    <main class="storybook-main">
        <?php
        switch ($page) {
            case 'product-card':
                require 'stories/ProductCard.stories.php';
                break;
            case 'basket-item':
                require 'stories/BasketItem.stories.php';
                break;
            default:
                echo '<h1>Welcome to Storybook</h1>';
                echo '<p>Select a component from the navigation to view its stories.</p>';
                break;
        }
        ?>
    </main>
</body>
</html>