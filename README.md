# PHP Composter PHPCS

This Composer package will start to check your PHP files upon each commit to make sure they comply to the coding standards as specified in a `phpcs.xml` file.

## Installation

Just add as a development requirement to your `composer.json`, and it should work automagically:

```BASH
composer require --dev coenjacobs/php-composter-phpcs
```

The rules for the sniffer will be read from the `phpcs.xml` file in the root of your project.