##ezRPG 1.2.0 

###Warning this version of ezRPG 1.2.0 has substantial code changes from it's previous version (1.0.x). If you are upgrading, make sure you've checked and tested all modules to make sure they conform to the new code.

=====

This engine is destined to be part of the ezRPG legacy 1.x series started by Zeggy. For the new, reimagined version implementing the great new offerings of PHP5, a true MVC structure, PSR-0 compliant, and Smarty-Less, check out ezRPG 2.x series when that development is ready for public release!

=====

##Notes about 1.2.0
```

- Simple Cache System for Menus, Settings, Themes, and Smarty Templates.
- Plugin System to upload, install, and uninstall. Plus plugin integration with Menus and Settings.
- Theme System with templates built for specific themes, modules, etc.
- Menu system allows modules to add and remove items from menu. Menu returns an array to be used in template headers, nav lists, etc. Must be parsed and styled accordingly.
- Hooks are to be added so developers have more native locations to integrate with other than Header/Footer (AdminHeader/AdminFooter).
- Simple stopwatch and percentage info added for Debug_mode to see which area takes the longest. Later better debug information should be used
- PDO Driver added along with MySQLi
- Smarty 3.0
- More password encryptions supported
```
=====
A modular game engine written in PHP.

## Contribute
Contributing to the ezRPG project couldn't be easier!

1. Fork the project
2. Make your changes, and push them to your forked repository
3. Send a pull request with your changes
4. We will review your changes, and accept them if they fix the problem without causing any problems

## Support
Need some help? Check out the [ezRPG Forums](http://www.ezrpgproject.net/)

## Installation

1. [Download latest version of ezRPG](https://github.com/ezrpg/ezRPG-1.2.x/tags)
2. Give read/write permission to:
  * config.php
  * templates/*
3. Visit yourgame.com/path/to/ezrpg/install in your browser and follow the instructions.

## License

ezRPG 1.2.x is open-sourced software licensed under the GNU GPL v3 license.


