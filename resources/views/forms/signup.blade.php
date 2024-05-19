<form method="post" action="/signup">
    @csrf
    <div class="mb-3">
        <label for="signupName" class="form-label">Имя</label>
        <input type="text" class="form-control" id="signupName" name="name">
    </div>
    <div class="mb-3">
        <label for="signupSurname" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="signupSurname" name="surname">
    </div>
    <div class="mb-3">
        <label for="signupLastName" class="form-label">Отчетсво</label>
        <input type="text" class="form-control" id="signupLastName" name="lastname">
    </div>
    <div class="mb-3">
        <label for="signupEmail" class="form-label">Почта</label>
        <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp"  name="email">
    </div>
    <div class="mb-3">
        <label for="signupPhone" class="form-label">Телефон</label>
        <input type="tel" maxlength="12" value="+7" class="form-control" id="signupPhone" aria-describedby="phoneHelp" name="phone">
    </div>
    <div class="mb-3">
        <label for="signupPassword" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="signupPassword" name="password">
    </div>
    <div class="mb-3">
        <label for="signupRePassword" class="form-label">Повторите пароль</label>
        <input type="password" class="form-control" id="signupRePassword" name="rePassword">
    </div>
    <button type="submit" class="btn btn-success w-100">Зарегестрироваться</button>
</form>
