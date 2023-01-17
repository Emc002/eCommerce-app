@auth()
    @include('admin.layoutsAdmin.navbars.navs.auth')
@endauth

@guest()
    @include('admin.layoutsAdmin.navbars.navs.guest')
@endguest
