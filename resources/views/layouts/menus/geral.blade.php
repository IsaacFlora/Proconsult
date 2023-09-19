<li @if(Route::is('dashboard')) class="active" @endif>
    <a href="{{route('dashboard')}}" class="waves-effect">
        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
    </a>
</li>



<li @if(Route::is('meuschamados.index') || Route::is('meuschamados.create') ) class="active" @endif>
    <a href="javascript:void(0)" class="waves-effect"><i class="fa fa-list-ul" aria-hidden="true"></i> <span> Meus Chamados <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span> </a>
    <ul class="submenu">
        <li><a href="{{route('meuschamados.index')}}">Listar chamados</a></li>
        <li><a href="{{route('meuschamados.create')}}">Abrir chamado</a></li>
    </ul>
</li>