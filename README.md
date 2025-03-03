[![Latest Stable Version](https://img.shields.io/packagist/v/phpcompatibility/phpcompatibility-magento?label=stable)](https://packagist.org/packages/phpcompatibility/phpcompatibility-magento)
[![Latest Unstable Version](https://img.shields.io/badge/unstable-dev--develop-e68718.svg?maxAge=2419200)](https://packagist.org/packages/phpcompatibility/phpcompatibility-magento)
[![License](https://img.shields.io/github/license/PHPCompatibility/PHPCompatibilityMagento?color=00a7a7)](https://github.com/PHPCompatibility/PHPCompatibilityMagento/blob/main/LICENSE)
[![Build Status](https://github.com/PHPCompatibility/PHPCompatibilityMagento/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/PHPCompatibility/PHPCompatibilityMagento/actions/workflows/ci.yml)

# PHPCompatibilityMagento

Using PHPCompatibilityMagento, you can analyse the codebase of a Magento-based project for PHP cross-version compatibility.


## What's in this repo ?

A ruleset for PHP_CodeSniffer to check for PHP cross-version compatibility issues in projects based on the Magento CMS.

This Magento specific ruleset prevents false positives from the [PHPCompatibility standard](https://github.com/PHPCompatibility/PHPCompatibility) by excluding back-fills and poly-fills which are provided by Magento.


## Requirements

* [PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer).
    * PHP 5.3+ for use with [PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer) 2.3.0+.
    * PHP 5.4+ for use with [PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer) 3.0.2+.

    Use the latest stable release of PHP_CodeSniffer for the best results.
    The minimum _recommended_ version of PHP_CodeSniffer is version 2.6.0.
* [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility) 9.0.0+.
* [PHPCompatibilityParagonie](https://github.com/PHPCompatibility/PHPCompatibilityParagonie) 1.0.0+.


## Installation instructions

The only supported installation method is via [Composer](https://getcomposer.org/).

[Composer](http://getcomposer.org/) will automatically install the project dependencies and register the external rulesets with PHP_CodeSniffer using the [Composer PHPCS plugin].

Run the following from the root of your project:
```bash
composer config allow-plugins.dealerdirect/phpcodesniffer-composer-installer true
composer require --dev dealerdirect/phpcodesniffer-composer-installer:"^0.7" phpcompatibility/phpcompatibility-magento:"*"
```

Next, run:
```bash
vendor/bin/phpcs -i
```
If all went well, you will now see that the `PHPCompatibility`, `PHPCompatibilityMagento`  and some more PHPCompatibility standards are installed for PHP_CodeSniffer.


## How to use

Now you can use the following command to inspect your code:
```bash
vendor/bin/phpcs -p . --standard=PHPCompatibilityMagento
```

By default, you will only receive notifications about deprecated and/or removed PHP features.

To get the most out of the PHPCompatibilityMagento standard, you should specify a `testVersion` to check against. That will enable the checks for both deprecated/removed PHP features as well as the detection of code using new PHP features.

The minimum PHP requirement of the Magento project at this time is PHP 7.3.0. If you want to enforce this, either add `--runtime-set testVersion 7.3-` to your command-line command or add `<config name="testVersion" value="7.3-"/>` to your [custom ruleset](https://github.com/PHPCompatibility/PHPCompatibility#using-a-custom-ruleset).

For example:
```bash
# For a project which should be compatible with PHP 7.3 and higher:
vendor/bin/phpcs -p . --standard=PHPCompatibilityMagento --runtime-set testVersion 7.3-
```

For more detailed information about setting the `testVersion`, see the README of the generic [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility#sniffing-your-code-for-compatibility-with-specific-php-versions) standard.


### Testing PHP files only

By default PHP_CodeSniffer will analyse PHP, JavaScript and CSS files. As the PHPCompatibility sniffs only target PHP code, you can make the run slightly faster by telling PHP_CodeSniffer to only check PHP files, like so:
```bash
vendor/bin/phpcs -p . --standard=PHPCompatibilityMagento --extensions=php --runtime-set testVersion 7.3-
```

## License

All code within the PHPCompatibility organisation is released under the GNU Lesser General Public License (LGPL). For more information, visit https://www.gnu.org/copyleft/lesser.html


## Changelog

### Unreleased

...

[Composer PHPCS plugin]: https://github.com/PHPCSStandards/composer-installer
