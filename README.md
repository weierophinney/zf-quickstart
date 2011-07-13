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

This branch (features/zf2-di-runtime) tracks the feature/di branch of Ralph
Schindler's Zend Framework 2 repository
(https://github.com/ralphschindler/zf2/tree/feature%2Fdi); at the time of
release, it uses revision 4b66143; if you are using something earlier or later,
your results may vary. 

It provides a full version of the ZF2 MVC prototype, which utilizes dependency
injection; this branch uses the "Runtime" strategy in order to create and
resolve dependency definitions.

You should symlink the ZF2 library into "library/Zend/" in order to run the
quick start.
