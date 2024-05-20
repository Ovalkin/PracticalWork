<form method="post" action="/signin">
    @csrf
    <div class="mb-3">
        <label for="signinEmail" class="form-label">Почта</label>
        <input type="email" class="form-control" id="signinEmail" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
        <label for="signinPassword" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="signinPassword" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="signinCheck" name="rememberMe">
        <label class="form-check-label" for="signinCheck">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-success w-100">Войти</button>
</form>
