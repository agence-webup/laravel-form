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
    @foreach($options as $key => $option)
        @if(!isset($option['value']) && !isset($option['label']))
            <optgroup label="{{ $key }}">
                @foreach($option as $subOption)
                    <option value="{{$subOption['value']}}" @if($subOption['value'] == $value)selected @endif >{{$subOption['label']}}</option>
                @endforeach
            </optgroup>
        @else
            <option value="{{$option['value']}}" @if($option['value'] == $value)selected @endif >{{$option['label']}}</option>
        @endif
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
