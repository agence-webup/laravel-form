<div class="{{$config['divClass']}} {{$wrapperClass}} @if($errors){{$config['errorClass']}} @endif" @foreach($wrapperAttr as $key => $val) @if(is_int($key)){{$val}}@else{{$key}}="{{$val}}"@endif @endforeach>
    @if($label)
    <label for="{{$name}}">{!!$label!!} @if($requiredStar)<i class="{{$config['requiredClass']}}">*</i>@endif</label>
    @endif
    <textarea
    type="{{$type}}"
    id="{{$name}}"
    name="{{$name}}"
    @if($required)required @endif
    @if($placeholder)placeholder="{{$placeholder}}"@endif
    @foreach($attr as $key => $val)
    @if(is_int($key)){{$val}}@else{{$key}}="{{$val}}"@endif
    @endforeach
    >{{$value}}</textarea>
    @if($errors)
    <ul class="{{$config['errorMessageClass']}}">
        @foreach ($errors as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
