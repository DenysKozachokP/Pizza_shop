<?php
/**
 * @copyright 2025 Denys Kozachok
 * @license GPL-3.0
 * @license MIT
 */

/**@var string  $error_message Повідомлення про помилку*/
$this->Title = 'Регістрація';
?>
<link href="/css/user/register.css" rel="stylesheet">
<div class="container">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center">Регістрація на сайті</h2>
                <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_message ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="InputName" class="form-label">Ім'я</label>
                    <input value="<?= $this->controller->post->name ?>" name="name" type="text" class="form-control" id="InputName">
                </div>
                <div class="mb-3">
                    <label for="InputLastName" class="form-label">Прізвище</label>
                    <input value="<?= $this->controller->post->lastname ?>" name="lastname" type="text" class="form-control" id="InputLastName">
                </div>
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email</label>
                    <input value="<?= $this->controller->post->email ?>" name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Якщо ви хочете отримувати листи з змовленнями на пошту введіть її коректно</div>
                </div>
                <div class="mb-3">
                    <label for="InputNumber" class="form-label">Номер телефону</label>
                    <input value="<?= $this->controller->post->number ?>" name="number" type="text" class="form-control" id="InputNumber">
                </div>
                <div class="mb-3">
                    <label for="InputLogin" class="form-label">Логін</label>
                    <input value="<?= $this->controller->post->login ?>" name="login" type="text" class="form-control" id="InputLogin">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Пароль</label>
                    <input value="<?= $this->controller->post->password1 ?>" name="password1" type="password" class="form-control" id="InputPassword1">
                </div>
                <div class="mb-3">
                    <label for="InputPassword2" class="form-label">Повторіть пароль</label>
                    <input value="<?= $this->controller->post->password2 ?>" name="password2" type="password" class="form-control" id="InputPassword2">
                </div>  
                <button id="ButtonReg" type="submit" class="btn btn-primary">Зареєструватись</button>
            </form>
        </div>
    </div>
    <script src="/scripts/scriptUsers.js"></script>