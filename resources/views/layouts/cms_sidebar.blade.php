<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Acesso geral</li>

                <!-- CMS GERAL -->
                @if($auth->role->id ==2 )

                    @include('layouts.menus.geral')

                @endif


                <!-- CMS UNIDADES -->
                @if($auth->role->id ==1 )

                    @include('layouts.menus.admin')

                @endif
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->