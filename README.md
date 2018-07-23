# Millipixels Referral Program

With 
Laravel Share you can generate these links in just seconds in a way tailored for Laravel.

### Available services

* Facebook share
* Twitter share
* Google Plus share
* Linkedin share
* Email share

## Installation

You can install the package via composer:

``` bash
composer require millipixels/evantivreferral "dev-master"
```


If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
// config/app.php
'providers' => [
    ...
    Jorenvh\Share\Providers\ShareServiceProvider::class,
];
```

And optionally add the facade in config/app.php

```php
// config/app.php
'aliases' => [
    ...
    'Share' => Jorenvh\Share\ShareFacade::class,
 	'Referral' => millipixels\evantivreferral\Referral::class
];
```


```Update autoload by adding in psr-4
//composer.json
"millipixels\\evantivreferral\\": "vendor/millipixels/evantivreferral/src/"
	will look like below
	 "autoload": {
	        "classmap": [
	            "database"
	        ],
	        "psr-4": {
	            "App\\": "app/",
	            "millipixels\\evantivreferral\\": "vendor/millipixels/evantivreferral/src/"
	        }
	    }
```



Publish the package config & resource files.

```bash
php artisan vendor:publish --provider="Jorenvh\Share\Providers\ShareServiceProvider"
```

Publish the migrations.

```bash
php artisan vendor:publish --provider="millipixels\evantivreferral\ReferralServiceProvider" --tag="migrations"
```

Publish the config.

```bash
php artisan vendor:publish --provider="millipixels\evantivreferral\ReferralServiceProvider" --tag="config"

```



### Fontawesome

Since this package relies on Fontawesome, you will have to require it's css, js & fonts in your app.
You can do that by requesting a embed code [via their website](http://fontawesome.io/get-started/) or by installing it locally in your project.

Laravel share supports Font Awesome v4 and v5, by default v4 is used. You can specify the version you want to use in ```config/laravel-share.php```

### Javascript

Load jquery.min.js & share.js by adding the following lines to your template files.

```html
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
```

## Usage

### Creating one share link

## Security

If you discover any security related issues, please email gaurav.sethi@millipixels.com instead of using the issue tracker.

## Credits

- [Gaurav sethi](https://github.com/MilliPixels)
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.