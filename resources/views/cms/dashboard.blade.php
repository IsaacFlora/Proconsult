<!-- CMS GERAL -->
@if($auth->role->id ==2 )

    @include('cms.dashboards.geral')

@endif


<!-- CMS UNIDADES -->
@if($auth->role->id ==1 )

    @include('cms.dashboards.admin')

@endif