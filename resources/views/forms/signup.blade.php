<form method="post">
    @csrf
    <div class="mb-3">
        <label for="signupName" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="signupName" name="signupName">
    </div>
    <div class="mb-3">
        <label for="signupSurname" class="form-label">Имя</label>
        <input type="text" class="form-control" id="signupSurname" name="signupSurname">
    </div>
    <div class="mb-3">
        <label for="signupLastName" class="form-label">Отчетсво</label>
        <input type="text" class="form-control" id="signupLastName" name="signupLastname">
    </div>
    <div class="mb-3">
        <label for="signupEmail" class="form-label">Почта</label>
        <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp"  name="signupEmail">
    </div>
    <div class="mb-3">
        <label for="signupPhone" class="form-label">Телефон</label>
        <input type="tel" maxlength="12" value="+7" class="form-control" id="signupPhone" aria-describedby="phoneHelp" name="signupPhone">
    </div>
    <div class="mb-3">
        <label for="signupPassword" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
    </div>
    <div class="mb-3">
        <label for="signupRePassword" class="form-label">Повторите пароль</label>
        <input type="password" class="form-control" id="signupRePassword" name="signupRePassword">
    </div>
    <button type="submit" class="btn btn-success w-100">Войти</button>
</form>
