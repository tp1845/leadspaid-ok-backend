 @if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp
    <script>
        "use strict";
        @foreach ($errors as $error)
            $('#errors_message').html('<div class="alert alert-danger" role="alert"> {!! $error !!} </div>');
        @endforeach
    </script>
@endif
