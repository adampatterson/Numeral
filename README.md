# Numeral PHP
![PHP Composer](https://github.com/adampatterson/Numeral/workflows/PHP%20Composer/badge.svg?branch=main)

A PHP library for formatting and manipulating numbers. 

This script is still under development and a PHP clone of [Numeral-js](https://github.com/adamwdraper/Numeral-js) by [Adam Draper](https://github.com/adamwdraper).


## Install from [Packagist](https://packagist.org/packages/adampatterson/numeral)

```
composer require adampatterson/numeral
```

## For use in Laravel Views ( Blade files )

Open `config/app.php` and add Numeral to the aliases array.

```
'Numeral'      => Numeral\Numeral::class
```

`{{ \Numeral::number(85193.456)->format('0.00') }}`


## Usage
```
use Numeral\Numeral;

class SomeController extends Controller
{
    public function myMethod(Numeral $numeral){
        $numeral->number('85193.456')->format()
    }
    
    // OR

    public function myOtherMethod(){
        Numeral::number('85193.456')->format()
    }
}
```

### Numbers
```
var_dump(Numeral::number('85193.456')->format()); // 85193
var_dump(Numeral::number('85193.456')->format('0.00')); // 85193.46
var_dump(Numeral::number('85193.456')->format('0,0.00')); // 85,193.46
var_dump(Numeral::number('-85193.00')->format()); // -85193
var_dump(Numeral::number('-85193')->format('0.00')); // -85193.00
```

### Currency
```
var_dump(Numeral::number('85187993.00')->format('$0,0.00')); // $85,187,993.00
var_dump(Numeral::number('85187993.00')->format('$0,0')); // $85,187,993
var_dump(Numeral::number('$85187993.00')->format('$0.00')); // $85187993.00
var_dump(Numeral::number('85187993.00')->format('$0')); // $85187993
```

### Percentages

```
var_dump(Numeral::number('-0.43')->format('0%')); // -43%
var_dump(Numeral::number('0.75')->format('0%')); // 75%
```

### Time

```
var_dump(Numeral::number('25')->format('00:00:00')); // 0:00:25
var_dump(Numeral::number('238')->format('00:00:00')); // 0:03:58
var_dump(Numeral::number('63846')->format('00:00:00')); // 17:44:06
```

### Un-format 

**Work in progress.**


## Tests

```
$ composer global require phpunit/phpunit
$ export PATH=~/.composer/vendor/bin:$PATH
$ which phpunit
~/.composer/vendor/bin/phpunit
```

`composer run-script test`

## Local Dev
`ln -s ~/Sites/personal/_packages/Numeral/ ~/Sites/personal/projectName/vendor/adampatterson/Numeral`
