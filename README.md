# What is Space Prospection

Space Prospection is my first website built completely in CodeIgniter framework. Content and purpose of this website is completely made up, I just want to demonstrate building website in MVC structure and other OOP related skills and help other Web Developers teaching themselves this awesome PHP framework.

# How it looks like

<img src="https://link.zlatanstajic.com/images/portfolio/space-prospection.jpg?clear_cache=1" alt="Homepage of Space Prospection website" width="350"/>

But have in mind that this image might stay few commits behind.

# Server Requirements

PHP version 7.1 or newer is recommended.

# Installation

You may find [Space Prospection website](https://space-prospection.zlatanstajic.com) online and compare it with your own copy. 

Just change following:

1. Navigate to application/config/config.php and set $config['base_url'] to your own path. 
1. Navigate to application/config/email.php and add your own email messaging credentials.
1. Navigate to application/config/constants.php and set global EMAIL_ADMIN where all emails would be sent to from contact form.
1. Navigate to root directory and change global variable ENVIRONMENT from development to production.

After all changes are commited, you have to update Composer vendors.

```bash
$ composer update
```

Please note that website uses SQLite3 database, therefore enable it on your php.ini settings and restart your server.

# Unit testing

All unit tests are stored inside application/tests folder. To successfully setup and run PHPUnit, run following commands:

```
$ composer update
$ php application/vendor/kenjis/ci-phpunit-test/install.php
$ rm application/tests/controllers/Welcome_test.php
$ phpunit -c application/tests
```

# Automatic tests

You can run all possible automatic tests at once with one simple command.

```bash
$ bash autotest
```

* Coding standard with PHP_CodeSniffer
* Running unit tests with PHPUnit

Precondition for running all tests above is having Composer vendors updated.

# Acknowledgements

Copyright © 2017-2020 | [Zlatan Stajic](https://www.zlatanstajic.com/) | Released under the [MIT License](http://www.opensource.org/licenses/mit-license.php)
