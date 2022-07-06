<script>
    const app_vars = {
        base_url: "{{url('')}}"
    }
</script>
<!-- jQuery -->
<script src="{{url('/template/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/template/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/template/admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{url('/template/admin/js/main.js?t=').time()}}"></script>

@yield('footer')
