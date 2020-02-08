<!--PRELOADER-->
<div id="preloader">
    <div id="status">
        <img alt="logo" src="{{asset('images/grey-logo.svg')}}">
    </div>
</div>
<!--/.PRELOADER END-->

@section('scripts')
    <script type="text/javascript">

        function hidePreloader() {
            $("#status").fadeOut();
            $("#preloader").delay(450).fadeOut();
        };
        window.onload = hidePreloader();
    </script>
@endsection