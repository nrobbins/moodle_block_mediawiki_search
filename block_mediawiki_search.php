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
 * Main block code
 *
 * @package    block
 * @subpackage mediawiki_search
 * @copyright  2012 onwards Nathan Robbins
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_mediawiki_search extends block_base {
	
    // Initialize the block
    function init() {
        $this->title = get_string('pluginname', 'block_mediawiki_search');
    }
		public function specialization() {
			global $CFG;
			if (!empty($this->config->title)) {
				$this->title = $this->config->title;
			} else {
				$this->title = get_string('pluginname', 'block_mediawiki_search');
			}
			if (!empty($this->config->showtitle)) {
				$this->showtitle = $this->config->showtitle;
			} else {
				$this->showtitle = 0;
			}
			if (!empty($this->config->address)) {
				$this->address = $this->config->address;
			} else {
				$this->address = 'http://www.mediawiki.org/wiki/MediaWiki';
			}
			if (!empty($this->config->logo)) {
				$this->logo = $this->config->logo;
			} else {
				$this->logo = $CFG->wwwroot.'/blocks/mediawiki_search/Wiki.png';
			}
		}
		public function hide_header() {	
			if ($this->showtitle==1) {
				return false;
			} else {
				return true;
			}
		}
    function applicable_formats() {
        return array(
				'course-view' => true,
				'site-index' => true,
				);
    }
		public function instance_allow_multiple() {
			return true;
		}
    function get_content() {
        global $CFG, $OUTPUT;
        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
				$this->content->text  = '<form action="'.$this->address.'" id="mediawiki_search" target="_blank" method="get">';
				if(isset($this->config->showlogo)&&$this->config->showlogo == 1) {
					$this->content->text .= '<img src="'.$this->logo.'" alt="'.get_string('blocktitle', 'block_mediawiki_search').'" />';
				}
				$this->content->text .= '<input type="text" name="search" id="MWS_text" />';
				$this->content->text .= '<input type="submit" name="submit" value="'.get_string('search', 'block_mediawiki_search').'" id="MWS_search"/>';
				$this->content->text .= '</form>';
        $this->content->footer = '';
				
				return $this->content;
		}
}