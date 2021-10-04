# discord-response-bundle
[![Packagist Version](https://img.shields.io/packagist/v/mrgoodbytes8667/discord-response-bundle?logo=packagist&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/discord-response-bundle)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mrgoodbytes8667/discord-response-bundle?logo=php&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/discord-response-bundle)
![Symfony Version](https://img.shields.io/endpoint?url=https%3A%2F%2Fshields.goodbytes.live%2Fshield%2Fsymfony%2F%255E5.3%2520%257C%2520%255E6.0&logoColor=FFF&style=flat)
![Discord API Version](https://img.shields.io/badge/discord-v6%20%7C%20v8%20%7C%20v9-lightgrey?logo=discord&logoColor=FFF&style=flat)  
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/discord-response-bundle/release?label=stable&logo=github&logoColor=FFF&style=flat)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/discord-response-bundle/tests?logo=github&logoColor=FFF&style=flat)
[![codecov](https://img.shields.io/codecov/c/github/mrgoodbytes8667/discord-response-bundle?logo=codecov&logoColor=FFF&style=flat)](https://codecov.io/gh/mrgoodbytes8667/discord-response-bundle)
![Packagist License](https://img.shields.io/packagist/l/mrgoodbytes8667/discord-response-bundle?logo=creative-commons&logoColor=FFF&style=flat)  
A Symfony bundle for Discord API response objects and enums

## Discord API Support
Starting with release 0.7, there will be mixed support for the Discord API version 6 along with Discord API version 8. **Not all models are currently fully compatible with v8.**
Starting with release 0.10, there will also be mixed support for Discord API version 9. **Not all models are currently fully compatible with v9.**

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
$ composer require mrgoodbytes8667/discord-response-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require mrgoodbytes8667/discord-response-bundle
```
Note: this bundle depends on the [Enum-Serializer-Bundle](https://github.com/mrgoodbytes8667/enum-serializer-bundle) as well, but Flex should take care of this for you.

#### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Bytes\EnumSerializerBundle\BytesEnumSerializerBundle::class => ['all' => true],
    Bytes\DiscordResponseBundle\BytesDiscordResponseBundle::class => ['all' => true],
];
```
Note: this bundle depends on the [Enum-Serializer-Bundle](https://github.com/mrgoodbytes8667/enum-serializer-bundle) and [setup instructions](https://github.com/mrgoodbytes8667/enum-serializer-bundle/blob/main/README.md#applications-that-dont-use-symfony-flex) for it must be followed as well.

## License
[![License](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)]("http://creativecommons.org/licenses/by-nc/4.0/)  
discord-response-bundle by [MrGoodBytes](https://www.goodbytes.live) is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](http://creativecommons.org/licenses/by-nc/4.0/).  
Based on a work at [https://github.com/mrgoodbytes8667/discord-response-bundle](https://github.com/mrgoodbytes8667/discord-response-bundle).