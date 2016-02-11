<div class="{{$config['divClass']}} @if($errors)f-error @endif">
    @if($label) <label for="{{$name}}">{{$label}} @if($required)<i class="f-required">*</i>@endif</label>@endif
    <textarea
        type="{{$type}}"
        id="{{$name}}"
        name="{{$name}}"
        @if($value)value="{{$value}}" @endif
        @if($required)required @endif
        @if($placeholder)placeholder="{{$placeholder}}"@endif
        @foreach($attr as $key => $value) {{$key}}="{{$value}}" @endforeach
    >{{$value}}</textarea>
    @if($errors)
    <ul class="{{$config['errorMessageClass']}}">
        @foreach ($errors as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>