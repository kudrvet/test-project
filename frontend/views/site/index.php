<h1 class='h1-center'> Форма обратной связи </h1>
    <form class="contact-form-container" action="/index" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <div class="form-inputs-item">
                <p>Name </p>
                <input type="text" name="UserForm[name]" aria-required="true"
                       value= "<?= htmlspecialchars($userForm['name']) ?>" placeholder="Name">
                <div class="error">
                    <label class=error-msg> <?= $errors['name'] ?? "" ?></label>
                </div>
            </div>
            <div class="form-inputs-item">
                <p>Surname </p>
                <input type="text" name="UserForm[surname]" aria-required="true"
                       value= "<?= htmlspecialchars($userForm['surname']) ?>" placeholder = "Surname ">
                <div class="error">
                    <label class=error-msg> <?= $errors['surname'] ?? "" ?></label>
                </div>
            </div>
            <div class="form-inputs-item">
                <p>Phone </p>
                <input type="text" name="UserForm[phone]" placeholder="+7(999)-999-99-99" aria-required="true"
                       value= "<?= htmlspecialchars($userForm['phone']) ?>" placeholder = "Phone" >
                <div class="error">
                    <label class=error-msg> <?= $errors['phone'] ?? "" ?></label>
                </div>

            </div>
            <div class="form-inputs-item">
                <p>Email </p>
                <input type="text" name="UserForm[email]" aria-required="true"
                       value= "<?= htmlspecialchars($userForm['email']) ?>" placeholder = "Email">
                <div class="error">
                    <label class=error-msg> <?= $errors['email'] ?? "" ?></label>
                </div>
            </div>
            <div class="form-inputs-item">
                <p>Text</p>
                <textarea aria-required="true" rows ='8'
                          name=" UserForm[text]"> <?= htmlspecialchars($userForm['text']) ?> </textarea>
                <div class="error">
                    <label class=error-msg> <?= $errors['text'] ?? "" ?></label>
                </div>
            </div>
            <div class="form-inputs-item">
                <div class="button-block">
                    <button>Отправить</button>
                </div>
            </div>
    </form>