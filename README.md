# laravel-form

## Install

### Step 1: Install via Composer

``` bash
$ composer require webup/laravel-form
```

### Step 2: Add the Service Provider

Add this line to config/app.php:

``` php
'providers' => [
    //...
    Webup\LaravelForm\FormServiceProvider::class
]
```

### Step 3: Use Facade (optional)

For shorter code, you can use the facade by adding this line to config/app.php:

``` php
'aliases' => [
    //...
    'Form'      => Webup\LaravelForm\Facades\Form::class,
]
```

You can now use Laravel Form directly into your views (check some examples bellow)

### Step 4: Publish config

You can publish config and override it in config/form.php:

```
 php artisan vendor:publish
```

## Using

### Methods

These methods can be used with any type of elements:

* label($label = null, $escape = true)
* value($value = null)
* placeholder($placeholder = null)
* name($name = null)
* required()
* errors($errors = [])
* attr(array $attr = [])
* wrapperClass($wrapperClass)

### Generated HTML


``` php
{!! Form::create('text', 'name')
    ->label('Name')
    ->value('Barney')
    ->required()
    ->attr('maxlenght' => '50')
    ->wrapperClass('f-custom-class') !!}
```

Without errors:

``` html
<div class="f-group f-custom-class">
    <label for="name">Name <i class="f-required">*</i></label>    
    <input type="text" id="name" name="name" value="Barney" maxlength="50">
</div>
```

With errors (retrieve from Laravel validation):
``` html
<div class="f-group f-custom-class f-error">
    <label for="name">Name <i class="f-required">*</i></label>    
    <input type="text" id="name" name="name" value="Barney" maxlength="50">
    <ul class="f-error-message">
        <li>Name is required</li>
    </ul>
</div>
```

You can override default CSS class in config/form.php.  

**Important**: Laravel Form can handle HTML generation and client side  validation only. You need to manage server side validation on your own.

### Elements
#### input

``` php
{!! Form::create('email', 'name')
    ->label('Email')
    ->value('homer.simpson@example.com')
    ->placeholder('example@adresse.com')
    ->required()
    ->wrapperClass('custom-class') !!}
```

#### textarea

``` php
{!! Form::create('textarea', 'name')
    ->label('Name')
    ->value('Nullam id dolor id nibh ultricies vehicula ut id elit.') !!}
```

#### radio

``` php
{!! Form::create('radio', 'gender')->label('Gender')
    ->addRadio(1, 'Male', 'male')
    ->addRadio(0, 'Female', 'female')
    ->wrapperClass('custom-class')
    ->value(0) !!}
```

Specific methods :

* addRadio($value, $label, $id, $attr = [])

#### select

``` php
{!! Form::create('select', 'fruits')
    ->label("Fruits")
    ->placeholder("What's your favorite?")
    ->addOptions(['apple' => 'Apple', 'strawberry' => 'Strawberry', 'melon' => 'Melon'])
    ->value('apple') !!}
```

with optgroup (Groups aren't selectable) :

``` php
{!! Form::create('select', 'fruits')
    ->label("Fruits")
    ->placeholder("What's your favorite?")
    ->addOptions(['Apple' => ['lady' => 'Lady', 'mcintosh' => 'McIntosh'], 'strawberry' => 'Strawberry', 'Melon' => ['watermelon' => 'Watermelon', 'charentais_melon' => 'Charentais Melon']])
    ->value('charentais_melon') !!}
```

Specific methods :

* addOptions(array $options)

#### checkbox

``` php
{!! Form::create('checkbox', 'cgu')
    ->label("I accept the general terms and conditions")
    ->value(true) !!}
```

## Styling

Bellow, you will find default styles that can work with Laravel Form.

``` css

.f-group {
  margin-bottom: 1rem;
}

.f-group label {
  margin-bottom: .5rem;    
}

.f-required {
  color: #c0392b;
  font-weight: bold;
}

.f-error input {
  border: 1px solid #c0392b;
}

.f-error-message {
  margin-top: 4px;
  color: #c0392b;
}

```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

Developed by [Agence Webup](https://github.com/agence-webup)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
