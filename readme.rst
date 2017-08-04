###################
What is Space-Prospection
###################

Space-Prospection is my first website built completely in CodeIgniter framework. Content and purpose of this website is completely made up, I just want to demonstrate building website in MVC structure and other OOP related skills and help other Web Developers teaching themselves this awesome PHP framework.

###################
How it looks like
###################

.. figure:: http://link.zlatanstajic.com/images/portfolio/space-prospection.jpg
:align: center

**pace-Prospection Homepage.**

###################
Release Information
###################

This repo contains in-development code. Note that there may be some bugs and unfixed code.

###################
Server Requirements
###################

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but I strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

###################
Installation
###################


You may find website `online <https://space-prospection.zlatanstajic.com/>`_
and compare it with your own copy. 

Just change following:

1. Navigate to application/config/config.php and set $config['base_url'] to your own path. 
2. Navigate to application/config/email.php and add your own email messaging credentials.
3. Navigate to application/config/constants.php and set global EMAIL_ADMIN where all emails would be sent to from contact form.
4. Navigate to root directory and change global variable ENVIRONMENT from development to production.

Please note that website uses SQLite3 database, therefore enable it on your php.ini settings and restart your server. 

###################
License
###################

Free to use and study.