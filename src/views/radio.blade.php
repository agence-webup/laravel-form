<div class="{{$config['divClass']}} {{$wrapperClass}} @if($errors)f-error @endif">
    <label>{!!$label!!}</label>
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
        @if($value == $radio['value']) checked @endif
        value="{{$radio['value']}}"
        @if($required)required @endif
        @foreach($radio['attr'] as $key => $value)
        @if(is_int($key)){{$value}}@else{{$key}}="{{$value}}"@endif
        @endforeach
        >
        {{$radio['label']}} @if($required)<i class="f-required">*</i>@endif
    </label>
    @endforeach
</div>
