## FizzBuzz API

FizzBuzz is a small project that exposes the fizzbuzz endpoint /: min /: max. 
:Min and:max are integers.

The endpoint must print all integers between these 2, but with the following conditions:
1. If the number is multiples of 3 -> print "Fizz"
2. If the number is multiples of 5 -> print "Buzz"
3. If multiple of both -> print "FizzBuzz"

Request Example:
GET / fizzbuzz / 1/5
1
2
Fizz
4
Buzz

The API returns a JSON.

## Instalation

### Server Requirements

PHP >= 5.5.9 
OpenSSL PHP Extension 
PDO PHP Extension 
Mbstring PHP Extension 
  
### Installing

1. Composer must be installed first

2. Then move to the root of the project and execute:

```bash
composer install
```

3. and finally

```php
php -S localhost:8080 -t public/
```

The application runs at http://localhost:8080/fizzbuzz/1/5

## Run Unit Tests

At the root of the project run:

```bash
vendor/bin/phpunit
```

## License

The FizzBuzz API is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
