# Numeral-php
A PHP library for formatting and manipulating numbers. 

This script is still under development and a PHP clone of [Numeral-js](https://github.com/adamwdraper/Numeral-js) by [Adam Draper](https://github.com/adamwdraper).

###Numbers
```
var_dump($numeral->number('85193.456')->format()); // 85193
var_dump($numeral->number('85193.456')->format('0.00')); // 85193.46
var_dump($numeral->number('85193.456')->format('0,0.00')); // 85,193.46
var_dump($numeral->number('-85193.00')->format()); // -85193
var_dump($numeral->number('-85193')->format('0.00')); // -85193.00
```

###Currency
```
var_dump($numeral->number('85187993.00')->format('$0,0.00')); // $85,187,993.00
var_dump($numeral->number('85187993.00')->format('$0,0')); // $85,187,993
var_dump($numeral->number('$85187993.00')->format('$0.00')); // $85187993.00
var_dump($numeral->number('85187993.00')->format('$0')); // $85187993
```

###Percentages

```
var_dump($numeral->number('-0.43')->format('0%')); // -43%
var_dump($numeral->number('0.75')->format('0%')); // 75%
```

###Time

```
var_dump($numeral->number('25')->format('00:00:00')); // 0:00:25
var_dump($numeral->number('238')->format('00:00:00')); // 0:03:58
var_dump($numeral->number('63846')->format('00:00:00')); // 17:44:06
```

###Unformat 
**Work in progress.**
