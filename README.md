# Space Prospection
> Simple [CodeIgniter](https://codeigniter.com/) framework website 

## Table of Contents

* [Description](#description)
* [Look and Feel](#look-and-feel)
* [Build Setup](#build-setup)
* [Testing](#testing)

You may find [Space Prospection website](https://space-prospection.zlatanstajic.com) online and compare it with your own copy. 

## Description

Space Prospection is simple website built completely in CodeIgniter framework. Content and purpose of this website is completely made up, I just want to demonstrate building website in MVC structure and other OOP related skills and help other Web Developers teaching themselves this awesome [PHP](https://www.php.net/) framework.

[⬆ back to top](#table-of-contents)

## Look and Feel

<img src="https://link.zlatanstajic.com/images/portfolio/space-prospection.jpg?clear_cache=1" alt="Homepage of Space Prospection website" width="350"/>

Currently home page looks like this, but have in mind that this image might stay few commits behind.

[⬆ back to top](#table-of-contents)

## Build Setup

PHP version 7.1 or newer is recommended. Website uses [SQLite3](https://www.sqlite.org) database, therefore install/enable it in your `php.ini` settings and restart your server.

```bash
# Check if your machine is setup properly
composer run check

# Setup project
composer run setup

# Run website
composer run serve
```

When installing on a server just change following:

1. Navigate to the [config.php](application/config/config.php) and set `$config['base_url']` to your own path.
1. Navigate to the [email.php](application/config/email.php) and add your own email messaging credentials.
1. Navigate to the [constants.php](application/config/constants.php) and set global `EMAIL_ADMIN` where all emails would be sent to from *contact form*.
1. Navigate to the [index.php](index.php) and change global variable `ENVIRONMENT` from `development` to `production`.

[⬆ back to top](#table-of-contents)

## Testing

Please note that you need PHPUnit installed on your machine. Running `apt-get install phpunit` will do the work for [Linux](https://www.linux.org/)-based operating systems. All unit tests are stored inside [application/tests](application/tests) folder.

```bash
# Run unit tests
composer run phpunit

# Run all tests
composer run autotest
```

Running all tests will check following:

* Coding standard with [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* Unit tests with [PHPUnit](https://phpunit.de/)

Unit tests coverage report will be created in [coverage](application/tests/build/coverage) folder.

[⬆ back to top](#table-of-contents)
