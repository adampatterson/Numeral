# Numeral-php
A PHP library for formatting and manipulating numbers. 

This script is still under development and a PHP clone of [Numeral-js](https://github.com/adamwdraper/Numeral-js) by [Adam Draper](https://github.com/adamwdraper).

## Install

```
composer require nesbot/carbon
```


## Ussage
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

###Numbers
```
var_dump(Numeral::number('85193.456')->format()); // 85193
var_dump(Numeral::number('85193.456')->format('0.00')); // 85193.46
var_dump(Numeral::number('85193.456')->format('0,0.00')); // 85,193.46
var_dump(Numeral::number('-85193.00')->format()); // -85193
var_dump(Numeral::number('-85193')->format('0.00')); // -85193.00
```

###Currency
```
var_dump(Numberal::number('85187993.00')->format('$0,0.00')); // $85,187,993.00
var_dump(Numberal::number('85187993.00')->format('$0,0')); // $85,187,993
var_dump(Numberal::number('$85187993.00')->format('$0.00')); // $85187993.00
var_dump(Numberal::number('85187993.00')->format('$0')); // $85187993
```

###Percentages

```
var_dump(Numberal::number('-0.43')->format('0%')); // -43%
var_dump(Numberal::number('0.75')->format('0%')); // 75%
```

###Time

```
var_dump(Numberal::number('25')->format('00:00:00')); // 0:00:25
var_dump(Numberal::number('238')->format('00:00:00')); // 0:03:58
var_dump(Numberal::number('63846')->format('00:00:00')); // 17:44:06
```

###Unformat 
**Work in progress.**
