<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
    
 *
 * @package	CodeIgniter
 *     	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 2.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Utf8 Class
 *
 * Provides support for UTF-8 environments
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	UTF-8
 *     		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/utf8.html
 */
class CI_Utf8 {

	/**
	 * Class constructor
	 *
	 * Determines if UTF-8 support is to be enabled.
	 *
	 * @return	void
	 */
	public function __construct()
	{
		if (
			defined('PREG_BAD_UTF8_ERROR')				// PCRE must support UTF-8
			&& (ICONV_ENABLED === TRUE OR MB_ENABLED === TRUE)	// iconv or mbstring must be installed
			&& strtoupper(config_item('charset')) === 'UTF-8'	// Application charset must be UTF-8
			)
		{
			define('UTF8_ENABLED', TRUE);
			log_message('debug', 'UTF-8 Support Enabled');
		}
		else
		{
			define('UTF8_ENABLED', FALSE);
			log_message('debug', 'UTF-8 Support Disabled');
		}

		log_message('info', 'Utf8 Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Clean UTF-8 strings
	 *
	 * Ensures strings contain only valid UTF-8 characters.
	 *
	 * @param	string	$str	String to clean
	 * @return	string
	 */
	public function clean_string($str)
	{
		if ($this->is_ascii($str) === FALSE)
		{
			if (MB_ENABLED)
			{
				$str = mb_convert_encoding($str, 'UTF-8', 'UTF-8');
			}
			elseif (ICONV_ENABLED)
			{
				$str = @iconv('UTF-8', 'UTF-8//IGNORE', $str);
			}
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Remove ASCII control characters
	 *
	 * Removes all ASCII control characters except horizontal tabs,
	 * line feeds, and carriage returns, as all others can cause
	 * problems in XML.
	 *
	 * @param	string	$str	String to clean
	 * @return	string
	 */
	public function safe_ascii_for_xml($str)
	{
		return remove_invisible_characters($str, FALSE);
	}

	// --------------------------------------------------------------------

	/**
	 * Convert to UTF-8
	 *
	 * Attempts to convert a string to UTF-8.
	 *
	 * @param	string	$str		Input string
	 * @param	string	$encoding	Input encoding
	 * @return	string	$str encoded in UTF-8 or FALSE on failure
	 */
	public function convert_to_utf8($str, $encoding)
	{
		if (MB_ENABLED)
		{
			return mb_convert_encoding($str, 'UTF-8', $encoding);
		}
		elseif (ICONV_ENABLED)
		{
			return @iconv($encoding, 'UTF-8', $str);
		}

		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Is ASCII?
	 *
	 * Tests if a string is standard 7-bit ASCII or not.
	 *
	 * @param	string	$str	String to check
	 * @return	bool
	 */
	public function is_ascii($str)
	{
		return (preg_match('/[^\x00-\x7F]/S', $str) === 0);
	}

}
