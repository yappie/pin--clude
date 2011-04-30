pin::clude
==========

Currently it's a work-in-progress. 
Basic idea is to try to give PHP ability to manage PHP libraries as simple as `pin::clude('smarty');` and using web interface of some sort to install it (via ftp/ssh/chmods, etc...)

Current functionality
=====================

Download [library](https://github.com/yappie/pin--clude/raw/master/libs/index.php) and `include` it. 
Then you can do:

    pin::clude('https://github.com/yappie/stamp/raw/master/stamps.php', 'stamps');

This will install [Stamps] library to `[path-to-pin::clude]/libs/stamps/pin.php`

Ideas
=====

* "pin file"
* tar.gz support?
* configuration files? setup wizard?
* ftp/ssh
* chmod management via sudo / su -
* local/github repository of popular libraries (so that people can fork and manage their own "pin" files)
* simple test with Stamps, DBix
* more advanced test with Propel, Smarty, Doctrine
* advanced tests - Zend Framework, CodeIgniter, Krumo