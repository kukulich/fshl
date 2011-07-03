# Welcome to FSHL #

FSHL is a free, open source universal syntax highlighter written in PHP. A very fast parser performs syntax highlighting for few languages and produces a HTML output.

FSHL library is a simple, easy to use syntax highlighter. Its API provides only two methods that are really need to highlight sources.

FSHL core is very flexible and it is very easy to add new languages. Feel free to do so and do not forget to share them with the rest of the world.


## Installation ##

FSHL should be installed using the [PEAR Installer](http://pear.php.net/). This installer is the backbone of PEAR, which provides a distribution system for PHP packages, and is shipped with every release of PHP since version 4.3.0.

The PEAR channel (`pear.kukulich.cz`) that is used to distribute FSHL needs to be registered with the local PEAR environment.

```
	pear channel-discover pear.kukulich.cz
```

This has to be done only once. Now the PEAR Installer can be used to install packages from the kukulich channel:

```
	pear install kukulich/FSHL
```

After the installation you can find the FSHL source files inside your local PEAR directory.


## Example ##

```
	$highlighter = new \FSHL\Highlighter(new \FSHL\Output\Html());
	$highlighter->setLexer(new \FSHL\Lexer\Php());
	echo '<pre>';
	echo $highlighter->highlight('<?php echo "Hello world!"; ?>');
	echo '</pre>';
```

Or

```
	$highlighter = new \FSHL\Highlighter(new \FSHL\Output\Html(), \FSHL\Highlighter::OPTION_TAB_INDENT | \FSHL\Highlighter::OPTION_LINE_COUNTER);
	echo '<pre>';
	echo $highlighter->highlight('<?php echo "Hello world!"; ?>', new \FSHL\Lexer\Php());
	echo '</pre>';
```

## Stylesheet example ##

A nice default stylesheet is located in the `style.css` file.


## Requirements ##

FSHL requires PHP 5.3 or later.


## Authors ##

### Original FSHL ###
* Juraj 'hvge' Durech

### New FSHL ###
* [Jaroslav Hanslík](https://github.com/kukulich)
