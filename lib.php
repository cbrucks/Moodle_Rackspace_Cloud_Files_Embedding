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
 * This plugin is used to access youtube videos
 *
 * @since 2.0
 * @package    repository_youtube
 * @copyright  2010 Dongsheng Cai {@link http://dongsheng.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot . '/repository/lib.php');

/**
 * repository_youtube class
 *
 * @since 2.0
 * @package    repository_youtube
 * @copyright  2009 Dongsheng Cai {@link http://dongsheng.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class repository_rackspace_cloud_files extends repository {

    /**
     * Youtube plugin constructor
     * @param int $repositoryid
     * @param object $context
     * @param array $options
     */
    public function __construct($repositoryid, $context = SYSCONTEXTID, $options = array()) {
        parent::__construct($repositoryid, $context, $options);
		
        $this->api_key = get_config('s3', 'api_key');
        $this->secret_key = get_config('s3', 'secret_key');
    }

    public function check_login() {
        return true;
    }

    /**
     * Return search results
     * @param string $search_text
     * @return array
     */
    public function search($search_text, $page = 0) {
    }


    /**
     * Youtube plugin doesn't support global search
     */
    public function global_search() {
        return false;
    }

    public function get_listing($path='', $page = '') {
        return array();
    }

    /**
     * Generate search form
     */
    public function print_login($ajax = true) {
	    // This is where the user interaction happens
        
    }
	
	public static function type_config_form($mform, $classname = 'repository') {
        parent::type_config_form($mform);
        $strrequired = get_string('required');
		$ah = $mform->addElement('select', 'auth_host', get_string('auth_host','repository_rackspace_cloud_files'), array(get_string('US','repository_rackspace_cloud_files'), get_string('UK','repository_rackspace_cloud_files')));
		$ah->setMultiple(false);
		$ah->setSelected(get_string('US','repository_rackspace_cloud_files'));
        $strrequired = get_string('required');
		$v = $mform->addElement('select', 'version', get_string('version','repository_rackspace_cloud_files'), array(get_string('v1','repository_rackspace_cloud_files'), get_string('v2','repository_rackspace_cloud_files')));
		$v->setMultiple(false);
		$v->setSelected(get_string('v1','repository_rackspace_cloud_files'));
        $mform->addElement('text', 'username', get_string('username', 'repository_rackspace_cloud_files'));
        $mform->addElement('text', 'api_key', get_string('api_key', 'repository_rackspace_cloud_files'));
        $mform->addElement('static', 'instructions', '', get_string('instruct', 'repository_rackspace_cloud_files'));
        $mform->addRule('auth_host', $strrequired, 'required', null, 'client');
        $mform->addRule('username', $strrequired, 'required', null, 'client');
        $mform->addRule('api_key', $strrequired, 'required', null, 'client');
    }

    /**
     * file types supported by youtube plugin
     * @return array
     */
    public function supported_filetypes() {
        return '*';
    }

    /**
     * Youtube plugin only return external links
     * @return int
     */
    public function supported_returntypes() {
        return FILE_EXTERNAL;
    }
}
