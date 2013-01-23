<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This plugin is used to access rackspace cloud files
 *
 * @since 2.0
 * @package    repository_rackspace_cloud_files
 * @copyright  2013 Chris Brucks
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot . '/repository/lib.php');
require_once($CFG->dirroot . '/repository/cf.php');


public class repository_rackspace_cloud_files extends repository {

    function __constuct($repositoryid, $context = SYSCONTEXTID, $options = array()) {
	    parent::__contstruct($repositoryid, $context, $options);
	}
	
	
    /**
     * Youtube plugin doesn't support global search
     */
    public function global_search() {
        return false;
    }
	
	
    function get_listing() {
        return array('list' => array());
    }
	
	/**
     * Generate search form
     */
    public function print_login($ajax = true) {
        $ret = array();
        $search = new stdClass();
        $search->type = 'text';
        $search->id   = 'youtube_search';
        $search->name = 's';
        $search->label = get_string('search', 'repository_rackspace_cloud_files').': ';
        $ret['login'] = array($search);
        $ret['login_btn_label'] = get_string('search', 'repository_rackspace_cloud_files');
        $ret['login_btn_action'] = 'search';
        $ret['allowcaching'] = true; // indicates that login form can be cached in filepicker.js
        return $ret;
    }
	
	/**
     * File types supported
     * @return array
     */
    public function supported_filetypes() {
        return array('*'); // Indicates that all types are supported
    }

    /**
     * Plugin only return external links
     * @return int
     */
    public function supported_returntypes() {
        return FILE_EXTERNAL;
    }
}