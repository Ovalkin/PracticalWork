<form method="post">
    @csrf
    <div class="mb-3">
        <label for="signinEmail" class="form-label">Почта</label>
        <input type="email" class="form-control" id="signinEmail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="signinPassword" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="signinPassword">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="signinCheck">
        <label class="form-check-label" for="signinCheck">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-success w-100">Войти</button>
</form>
