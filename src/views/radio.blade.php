<div class="{{$config['divClass']}} {{$wrapperClass}} @if($errors){{$config['errorClass']}} @endif">
    <label>{!!$label!!} @if($required) <i class="{{$config['requiredClass']}}">*</i> @endif</label>
    @if($errors)
    <ul class="{{$config['errorMessageClass']}}">
        @foreach ($errors as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    @foreach($radios as $radio)
    <label for="{{$radio['id']}}">
        <input
        type="{{$type}}"
        id="{{$radio['id']}}"
        name="{{$name}}"
        @if($value !== null && $value == $radio['value']) checked @endif
        value="{{$radio['value']}}"
        @if($required)required @endif
        @foreach($radio['attr'] as $key => $val)
        @if(is_int($key)){{$val}}@else{{$key}}="{{$val}}"@endif
        @endforeach
        >
        {{$radio['label']}} @if($required)@endif
    </label>
    @endforeach
</div>
