<div class="{{$config['divClass']}} {{$wrapperClass}} @if($errors)f-error @endif">
    @if($label) <label for="{{$name}}">{!! $label !!} @if($required)<i class="f-required">*</i>@endif</label>@endif
    <select
    id="{{$name}}"
    name="{{$name}}"
    @if($value)value="{{$value}}" @endif
    @if($required)required @endif
    @if($placeholder)placeholder="{{$placeholder}}"@endif
    @foreach($attr as $key => $value)
    @if(is_int($key)){{$value}}@else{{$key}}="{{$value}}"@endif
    @endforeach
    >
    @if($placeholder !== null)<option disabled selected>Choisir une valeur</option>@endif
    @foreach($options as $option)
    <option value="{{$option['value']}}" @if($option['value'] == $value)selected @endif >{{$option['label']}}</option>
    @endforeach
    </select>
    @if($errors)
    <ul class="{{$config['errorMessageClass']}}">
        @foreach ($errors as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
