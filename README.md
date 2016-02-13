# Numeral-php
A PHP library for formatting and manipulating numbers. 

This script is still under development and a PHP clone of [Numeral-js](https://github.com/adamwdraper/Numeral-js) by [Adam Draper](https://github.com/adamwdraper).

Chances are it will not even work out of the Box, I litterally copied the code from my Laravel Project.


###Numbers
```
var_dump($numberal->number('85193.456')->format());
var_dump($numberal->number('85193.456')->format('0.00'));
var_dump($numberal->number('85193.456')->format('0,0.00'));
var_dump($numberal->number('-85193.00')->format());
var_dump($numberal->number('-85193')->format('0.00'));
```

###Currency
```
var_dump($numberal->number('85187993.00')->format('$0,0.00'));
var_dump($numberal->number('$85187993.00')->format('$0.00'));
var_dump($numberal->number('85187993.00')->format('$0'));
```

###Percentages

```
var_dump($numberal->number('-0.43')->format('0%'));
var_dump($numberal->number('0.43')->format('0%'));
```

###Time

```
var_dump($numberal->number('25')->format('00:00:00'));
var_dump($numberal->number('238')->format('00:00:00'));
var_dump($numberal->number('63846')->format('00:00:00'));
```

###Unformat
```
var_dump($numberal->number('-43%')->unformat());
var_dump($numberal->number('75%')->unformat());
var_dump($numberal->number('17:44:06')->unformat());
var_dump($numberal->number('$85,187,993.00')->unformat());
var_dump($numberal->number('$85,187,993.00')->unformat('0.00'));
```
