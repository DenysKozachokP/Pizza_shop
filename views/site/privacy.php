<?php
$this->Title = 'Privacy Policy';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { color: #333; }
        .container { max-width: 800px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
        <h1>Політика конфіденційності</h1>
        <p>Дата набуття чинності: [Вкажіть дату]</p>
        
        <h2>1. Збір інформації</h2>
        <p>Ми збираємо такі дані користувачів: ім'я, email, файли cookie, інформацію про пристрій та інші дані, необхідні для покращення сервісу.</p>
        
        <h2>2. Використання інформації</h2>
        <p>Зібрана інформація використовується для забезпечення функціональності сайту, персоналізації контенту, покращення сервісу та аналітики.</p>
        
        <h2>3. Захист даних</h2>
        <p>Ми впроваджуємо сучасні засоби захисту даних, щоб запобігти несанкціонованому доступу, зміні або розголошенню інформації.</p>
        
        <h2>4. Права користувачів</h2>
        <p>Користувачі мають право на доступ, виправлення, видалення своїх даних та відкликання згоди на їх обробку.</p>
        
        <h2>5. Зміни до політики</h2>
        <p>Ми можемо змінювати цю політику конфіденційності. Оновлення будуть публікуватися на цій сторінці.</p>
        
        <h2>6. Контакти</h2>
        <p>Якщо у вас є питання щодо цієї політики, зв'яжіться з нами: [Email або контактна інформація]</p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#252e39"
            },
            "button": {
                "background": "#14a7d0"
            }
        },
        "content": {
            "message": "This website uses cookies to ensure you get the best experience.",
            "dismiss": "Accept",
            "link": "Learn more",
            "href": "/site/privacy"
        }
    });
});
</script>
</html>