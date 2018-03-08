What is Space-Prospection
=======

Space-Prospection is my first website built completely in CodeIgniter framework. Content and purpose of this website is completely made up, I just want to demonstrate building website in MVC structure and other OOP related skills and help other Web Developers teaching themselves this awesome PHP framework.

How it looks like
=======

![Homepage of space-prospection website](http://link.zlatanstajic.com/images/portfolio/space-prospection.jpg)

Release Information
=======

This repo contains in-development code. Note that there may be some bugs and unfixed code.

Server Requirements
=======

PHP version 7.0 or newer is recommended.

Installation
=======

You may find website [online] and compare it with your own copy. 

Just change following:

1. Navigate to application/config/config.php and set $config['base_url'] to your own path. 
2. Navigate to application/config/email.php and add your own email messaging credentials.
3. Navigate to application/config/constants.php and set global EMAIL_ADMIN where all emails would be sent to from contact form.
4. Navigate to root directory and change global variable ENVIRONMENT from development to production.

After all changes are commited, you have to update Composer vendors.

```
$ composer update
```

Please note that website uses SQLite3 database, therefore enable it on your php.ini settings and restart your server.

Unit testing
=======

All unit tests are stored inside application/tests/unit folder. To successfully setup PHPUnit, run following commands:

```
$ composer update
$ php application/vendor/kenjis/ci-phpunit-test/install.php
$ cd application/tests
$ phpunit unit/*
```

Acknowledgements
=======

Copyright © 2017 | [Zlatan Stajic] | Released under the [MIT License]

[online]: https://space-prospection.zlatanstajic.com