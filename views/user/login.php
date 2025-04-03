<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

/**@var string  $error_message Повідомлення про помилку*/
$this->Title = 'Вхід На сайт';
?>
<link href="/css/user/login.css" rel="stylesheet">

<div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <h2 class="text-center">Вхід на сайт</h2>
                <?php if (!empty($error_message)) :?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_message ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Логін</label>
                    <input value="<?= $this->controller->post->login ?>" name="login" type="text" class="form-control" id="InputEmail1">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Пароль</label>
                    <input value="<?= $this->controller->post->password ?>" name="password" type="password" class="form-control" id="InputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Зайти</button>
            </form>
        </div>
    </div>