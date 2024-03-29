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
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['migration_none_found'] = 'No migrations were found.';
$lang['migration_not_found'] = 'No migration could be found with the version number: %s.';
$lang['migration_sequence_gap'] = 'There is a gap in the migration sequence near version number: %s.';
$lang['migration_multiple_version'] = 'There are multiple migrations with the same version number: %s.';
$lang['migration_class_doesnt_exist'] = 'The migration class "%s" could not be found.';
$lang['migration_missing_up_method'] = 'The migration class "%s" is missing an "up" method.';
$lang['migration_missing_down_method'] = 'The migration class "%s" is missing a "down" method.';
$lang['migration_invalid_filename'] = 'Migration "%s" has an invalid filename.';
