<div id="right-block" class="col-md-4 col-sm-4 hidden-xs">
    <h3>Меню управления</h3>
    <div class="menu-block menu-admin">
        <ul>
            @include('cabinet.menu.right_xs')
            <li>
                <a href="{{ route('button.logout') }}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Выйти
                </a>
            </li>
        </ul>
    </div>
</div>