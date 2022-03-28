<div id="{{ $name."_container" }}" class="f-group">
    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off" tabindex="-1">
    <script>
      document.querySelector('#{{ $name }}_container').style.display = "none";
      document.querySelector('#{{ $name }}_container').setAttribute('aria-hidden', 'true');
    </script>
</div>


@if($errors)
<div class="{{$config['divClass']}} @if($errors){{$config['errorClass']}} @endif">
    <ul class="{{$config['errorMessageClass']}}">
        @foreach ($errors as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
