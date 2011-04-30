pin::clude
==========

Currently it's a work-in-progress. 
Basic idea is to try to give PHP ability to manage PHP libraries as simple as `pin::clude('smarty');` and using web interface of some sort to install it (via ftp/ssh/chmods, etc...)

Ideas
=====

* "pin file"
* tar.gz support?
* ftp/ssh
* chomd management via sudo / su -
* local/github repository of popular libraries (so that people can fork and manage their own "pin" files)
* simple test with Stamps, DBix
* more advanced test with Propel, Smarty, Doctrine
* advanced tests - Zend Framework, CodeIgniter