<form method="post" action="/setting/changedata" class="w-50">
    @csrf
    <div class="mb-3">
        <label for="exampleName" class="form-label">Имя</label>
        <input type="text" class="form-control" id="exampleName"
               value="{{session('userData')['name']}}" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleSurname" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="exampleSurname"
               value="{{session('userData')['surname']}}" name="surname">
    </div>
    <div class="mb-3">
        <label for="exampleLastname" class="form-label">Отчество</label>
        <input type="text" class="form-control" id="exampleLastname"
               value="{{session('userData')['lastname']}}" name="lastname">
    </div>
    <div class="mb-3">
        <label for="examplePhone" class="form-label">Номер телефона</label>
        <input type="text" class="form-control" id="examplePhone"
               value="{{session('userData')['phone']}}" name="phone">
    </div>
    <div class="mb-3">
        <label for="exampleEmail" class="form-label">Почта</label>
        <input type="text" class="form-control" id="exampleEmail"
               value="{{session('userData')['email']}}" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleEmail" class="form-label"></label>
        <button type="button" class="btn btn-success form-control" data-bs-toggle="modal"
                data-bs-target="#changePassword">Сменить пароль
        </button>
    </div>
    <button type="submit" class="mt-2 btn btn-success form-control">Применить изменения</button>
</form>
