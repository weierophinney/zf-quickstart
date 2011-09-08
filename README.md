ZEND FRAMEWORK QUICK START
==========================

This repository tracks the Zend Framework QuickStart, found here:

* http://framework.zend.com/manual/en/learning.quickstart.html

The purpose of this repository is several:

* Support ongoing changes and development of the quick start code base
* Provide a snapshot of how the quick start might evolve in ZF2
* Provide baselines for benchmarking different MVC prototypes for ZF2

Notes
-----

This branch (features/zf2-mvc-module) tracks the prototype/mvc-module branch of
my own ZF2 repository (https://github.com/weierophinney/zf2); at the time of
release, it uses revision 0c20e7c; if you are using something earlier or later,
your results may vary. 

I've imported the Zf2Mvc module from that prototype into this repository. The
repository also includes "site" and "Guestbook" modules; the former provides the
home page and error pages, and the latter the actual "Guestbook" functionality
of the QuickStart.

As the prototype utilizes dependency injection, this is wired into the Bootstrap
class. It uses the Runtime strategy only at this time; a later revision may
switch to a compiled strategy for benchmarking purposes.

You should symlink the ZF2 library into "library/Zend/" in order to run the
quick start.
