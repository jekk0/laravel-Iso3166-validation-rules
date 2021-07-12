# Laravel/ Lumen validation rules for Country Codes - ISO 3166-1
[![Build Status](https://travis-ci.org/jekk0/laravel-iso3166-validation-rules.svg?branch=master)](https://travis-ci.org/jekk0/laravel-iso3166-validation-rules)
[![Coverage Status](https://codecov.io/gh/jekk0/laravel-iso3166-validation-rules/branch/master/graphs/badge.svg)](https://codecov.io/gh/jekk0/laravel-iso3166-validation-rules)
[![Latest Stable Version](https://poser.pugx.org/jekk0/laravel-iso3166-validation-rules/v/stable)](https://packagist.org/packages/jekk0/laravel-iso3166-validation-rules)
[![Total Downloads](https://poser.pugx.org/jekk0/laravel-iso3166-validation-rules/downloads)](https://packagist.org/packages/jekk0/laravel-iso3166-validation-rules)

### Requirements

 * PHP >= 7.2
 * Laravel/Lumen 5.8.x (version 1.0.0)
 * Laravel/Lumen 6.0.x (version 1.1.0)
 * Laravel/Lumen 7.0.x (version 1.2.0)
 * Laravel/Lumen 8.0.x (version 1.3.0)

### Installation

 Install the latest version with
```
 $ composer require jekk0/laravel-iso3166-validation-rules
```

### Quick start.
#### Using in controller
```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Alpha2;

class Test extends Controller
{
    public function index(Request $request)
    {
        $rules = ['country' => ['required', new Iso3166Alpha2()]]; // ISO3166-1 Alpha2 validation rule

        $this->validate($request, $rules);
        
        // etc ...
    }
}

```

#### Available rules
```php
<?php
use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Alpha2;
use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Alpha3;
use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Numeric;

$rules = ['countryAlpha2' => ['required', new Iso3166Alpha2()]]; // ISO3166-1 Alpha2 validation rule
$rules = ['countryAlpha3' => ['required', new Iso3166Alpha3()]]; // ISO3166-1 Alpha3 validation rule
$rules = ['countryNumeric' => ['required', new Iso3166Numeric()]]; // ISO3166-1 Numeric validation rule
```
#### Customise error message
```php
<?php
...
    public function index(Request $request)
    {
        $iso3166Alpha2Rule = (new Iso3166Alpha2())->setErrorMessage('New Custom Error Message :attribute = :input');
        $rules = ['country' => ['required', $iso3166Alpha2Rule]]; // ISO3166-1 Alpha2 validation rule

        $this->validate($request, $rules);

        // etc ...
    }
    
    // Output
    // New Custom Error Message country = ZZZ
```
Laravel/Lument automatically parse error message and replace: 
 * :attribute -> form parameter name 
 * :input     -> form parameter value 

### Docs
 * Country Codes - ISO 3166: https://www.iso.org/iso-3166-country-codes.html
 * ISO 3166-1: https://en.wikipedia.org/wiki/ISO_3166-1