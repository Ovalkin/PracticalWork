<header class="position-fixed w-100 z-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container gap-3">
            <a href="/" class="nav-link navbar-brand">Orders</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">Главная</a>
                </li>
            </ul>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Профиль
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                            @if(!session('userData'))
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#signin">
                                        Войти
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#signup">
                                        Зарегестрироваться
                                    </button>
                                </li>
                            @else
                                <li class="dropdown-header">{{session('userData')['surname'].' '.session('userData')['name'].' '. session('userData')['lastname']}}</li>
                                <li><a class="dropdown-item" href="#">Настройки профиля</a></li>
                                @if(session('userData')['role'] == 'admin')
                                    <li><a class="dropdown-item" href="/admin-panel">Админ-панель</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/orders">Мои заказы</a></li>
                                <li><a class="dropdown-item" href="/signout">Выйти</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="modal fade" id="signin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Авторизация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                @include('forms.signin')
            </div>
            <div class="modal-footer d-flex flex-column">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                @include('forms.signup')
            </div>
            <div class="modal-footer d-flex flex-column">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
