# Punycode

[![Build Status](https://travis-ci.org/Spomky-Labs/php-punycode.svg)](https://travis-ci.org/Spomky-Labs/php-punycode)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Spomky-Labs/php-punycode/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Spomky-Labs/php-punycode/?branch=master)

[![Coverage Status](https://coveralls.io/repos/Spomky-Labs/php-punycode/badge.svg?branch=master&service=github)](https://coveralls.io/github/Spomky-Labs/php-punycode?branch=master)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d59a9463-ed65-4304-a764-04f62d3fd58c/big.png)](https://insight.sensiolabs.com/projects/d59a9463-ed65-4304-a764-04f62d3fd58c)

[![Latest Stable Version](https://poser.pugx.org/spomky-labs/php-punycode/v/stable.png)](https://packagist.org/packages/spomky-labs/php-punycode)
[![Total Downloads](https://poser.pugx.org/spomky-labs/php-punycode/downloads.png)](https://packagist.org/packages/spomky-labs/php-punycode)
[![Latest Unstable Version](https://poser.pugx.org/spomky-labs/php-punycode/v/unstable.png)](https://packagist.org/packages/spomky-labs/php-punycode)
[![License](https://poser.pugx.org/spomky-labs/php-punycode/license.png)](https://packagist.org/packages/spomky-labs/php-punycode)


A Bootstring encoding of Unicode for Internationalized Domain Names in Applications (IDNA).

## Install

```
composer require spomky-labs/php-punycode:~2.0
```


## Usage

```php
<?php

// Import Punycode
use TrueBV\Punycode;

$Punycode = new Punycode();
var_dump($Punycode->encode('renangonçalves.com'));
// outputs: xn--renangonalves-pgb.com

var_dump($Punycode->decode('xn--renangonalves-pgb.com'));
// outputs: renangonçalves.com
```


## FAQ

### 1. What is this library for?

This library converts a Unicode encoded domain name to a IDNA ASCII form and vice-versa.


### 2. Why should I use this instead of [PHP's IDN Functions](http://php.net/manual/en/ref.intl.idn.php)?

If you can compile the needed dependencies (intl, libidn) there is not much difference.
But if you want to write portable code between hosts (including Windows and Mac OS), or can't install PECL extensions, this is the right library for you.
