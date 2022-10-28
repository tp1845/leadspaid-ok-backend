<link rel="stylesheet" href="{{ asset('assets/admin/css/iziToast.min.css') }}">
<script src="{{ asset('assets/admin/js/iziToast.min.js') }}"></script>

@if(session()->has('notify'))
    @foreach(session('notify') as $msg)
        <script type="text/javascript">  iziToast.{{ $msg[0] }}({message:"{{ $msg[1] }}", position: "topRight"}); </script>
    @endforeach
@endif

@if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp
    <script>
        @foreach ($errors as $error)
        iziToast.error({
            message: '{{ $error }}',
            position: "topRight"
        });
        @endforeach
    </script>
@endif
<script>

    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>
