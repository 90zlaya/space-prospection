# What is Space Prospection

Space Prospection is my first website built completely in [CodeIgniter](https://codeigniter.com/) framework. Content and purpose of this website is completely made up, I just want to demonstrate building website in MVC structure and other OOP related skills and help other Web Developers teaching themselves this awesome [PHP](https://www.php.net/) framework.

# How it looks like

<img src="https://link.zlatanstajic.com/images/portfolio/space-prospection.jpg?clear_cache=1" alt="Homepage of Space Prospection website" width="350"/>

But have in mind that this image might stay few commits behind.

# Server Requirements

PHP version 7.1 or newer is recommended.

# Installation

You may find [Space Prospection website](https://space-prospection.zlatanstajic.com) online and compare it with your own copy. 

When installing on a server just change following:

1. Navigate to the [config.php](application/config/config.php) and set `$config['base_url']` to your own path.
1. Navigate to the [email.php](application/config/email.php) and add your own email messaging credentials.
1. Navigate to the [constants.php](application/config/constants.php) and set global `EMAIL_ADMIN` where all emails would be sent to from *contact form*.
1. Navigate to the root directory and change global variable `ENVIRONMENT` from development to production (for production install only).

After all changes are commited, you have to update [Composer](https://getcomposer.org/) vendors.

```bash
$ composer update
```

Please note that website uses [SQLite3](https://www.sqlite.org) database, therefore enable it on your `php.ini` settings and restart your server.

# Unit testing

All unit tests are stored inside `application/tests` folder. To successfully setup and run PHPUnit tests, run following commands:

```
$ composer update
$ php application/vendor/kenjis/ci-phpunit-test/install.php
$ rm application/tests/controllers/Welcome_test.php
$ phpunit -c application/tests
```

Please note that you need PHPUnit installed on your machine. `apt-get install phpunit` will do the work for [Linux](https://www.linux.org/)-based operating systems. 

# Automatic tests

You can run all possible automatic tests at once with one simple command.

```bash
$ bash autotest
```

* Coding standard with [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* Running unit tests with [PHPUnit](https://phpunit.de/)

Precondition for running all tests above is having Composer vendors installed/updated.

# Acknowledgements

Copyright © 2017-2021 | [Zlatan Stajic](https://www.zlatanstajic.com/) | Released under the [MIT License](http://www.opensource.org/licenses/mit-license.php)
