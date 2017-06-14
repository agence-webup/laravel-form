<div class="{{$config['divClass']}} {{$wrapperClass}} @if($errors){{$config['errorClass']}} @endif">
    @if($label) <label for="{{$name}}">{!! $label !!} @if($required)<i class="{{$config['requiredClass']}}">*</i>@endif</label>@endif
    <select
    id="{{$name}}"
    name="{{$name}}"
    @if($value !== null)value="{{$value}}" @endif
    @if($required)required @endif
    @if($placeholder)placeholder="{{$placeholder}}"@endif
    @foreach($attr as $key => $val)
    @if(is_int($key)){{$val}}@else{{$key}}="{{$val}}"@endif
    @endforeach
    >
    @if($placeholder !== null)<option disabled selected>Choisir une valeur</option>@endif
    @foreach($options as $option)
    <option value="{{$option['value']}}" @if($option['value'] == $value || in_array($option['value'],$values))selected @endif >{{$option['label']}}</option>
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
