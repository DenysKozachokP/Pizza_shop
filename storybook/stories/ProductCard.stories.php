<?php
require_once '../components/ProductCard.php';

$stories = [
    'Default Product Card' => [
        'id' => 1,
        'name' => 'Fishing Rod Pro',
        'description' => 'High quality fishing rod for professionals',
        'price' => 1200,
        'discount' => 0,
        'imgPath' => '/img/fishing/rod.jpg',
        'isLoggedIn' => false
    ],
    'Product with Discount' => [
        'id' => 2,
        'name' => 'Fishing Reel Elite',
        'description' => 'Premium fishing reel with smooth mechanism',
        'price' => 800,
        'discount' => 15,
        'imgPath' => '/img/fishing/reel.jpg',
        'isLoggedIn' => false
    ],
    'Logged In User View' => [
        'id' => 3,
        'name' => 'Fishing Lure Set',
        'description' => 'Set of 10 professional fishing lures',
        'price' => 350,
        'discount' => 10,
        'imgPath' => '/img/fishing/lures.jpg',
        'isLoggedIn' => true
    ]
];
?>

<div class="storybook">
    <h1>Product Card Stories</h1>
    <?php foreach ($stories as $title => $props): ?>
        <div class="story">
            <h2><?= $title ?></h2>
            <div class="component">
                <?= renderProductCard($props) ?>
            </div>
            <div class="props">
                <h3>Properties:</h3>
                <pre><?= htmlspecialchars(json_encode($props, JSON_PRETTY_PRINT)) ?></pre>
            </div>
        </div>
    <?php endforeach; ?>
</div>