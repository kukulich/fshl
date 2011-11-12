<?php

/**
 * FSHL 2.0.1                                  | Fast Syntax HighLighter |
 * -----------------------------------------------------------------------
 *
 * LICENSE
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

// Class search path
set_include_path(
	realpath(__DIR__ . '/..') . PATH_SEPARATOR .   // Library
	__DIR__ . PATH_SEPARATOR .   // Library tests
	get_include_path()
);

// Autoload
spl_autoload_register(function($className) {
	// Don't load cache to enforce generating
	if (false !== strpos($className, 'Cache')) {
		return;
	}

	$file = strtr($className, '\\_', DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR) . '.php';
	if (!function_exists('stream_resolve_include_path') || false !== stream_resolve_include_path($file)) {
		require_once $file;
	}
});
