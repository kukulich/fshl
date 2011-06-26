# Welcome to FSHL #

FSHL is a free, open source universal syntax highlighter written in PHP. Very fast FSHL parser performs syntax highlighting for few languages (HTML with embeded PHP and CSS, PHP, CSS, JAVA, CPP, PYTHON) and produces HTML output.

FSHL library is just only syntax highlighter. Its API provides only one method, which is really need to highlight sources.

FSHL core is very flexible and when you want add any new languages, send any suggestions.


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
	$highlighter = new \Fshl\Highlighter(new \Fshl\Output\Html(), \Fshl\Highlighter::OPTION_TAB_INDENT | \Fshl\Highlighter::OPTION_LINE_COUNTER);
	echo '<pre>';
	echo $highlighter->highlight(\Fshl\Highlighter::LEXER_PHP, '<?php echo "Hello world!"; ?>');
	echo '</pre>';
```

## Stylesheet example ##

Nice default stylesheet is located in the `style.css` file.


## Requirements ##

FSHL requires PHP 5.3 or later.


## Authors ##

### Original FSHL ###
* Juraj 'hvge' Durech

### New FSHL ###
* [Jaroslav Hanslík](https://github.com/kukulich)
