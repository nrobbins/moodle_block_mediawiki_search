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
 * Edit form
 *
 * @package    block
 * @subpackage mediawiki_search
 * @copyright  2012 onwards Nathan Robbins
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_mediawiki_search_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
				global $CFG;
        //$context = $this->page->context;
        // Section header title according to language file.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block_mediawiki_search'));

        // Give the block a title
				$mform->addElement('text', 'config_title', get_string('blocktitle', 'block_mediawiki_search'));
				$mform->setDefault('config_title', get_string('pluginname', 'block_mediawiki_search'));
				$mform->setType('config_title', PARAM_MULTILANG);
				
				$mform->addHelpButton('config_title', 'blocktitle', 'block_mediawiki_search');
        
        //Select address of the MediaWiki installation
        $mform->addElement('text', 'config_address', get_string('blockaddress', 'block_mediawiki_search'), 'size="64"');
        $mform->setDefault('config_address', 'http://www.mediawiki.org/wiki/MediaWiki');
        $mform->setType('config_address', PARAM_MULTILANG);

				$mform->addHelpButton('config_address', 'blockaddress', 'block_mediawiki_search');

				//Enable a logo?
				$mform->addElement('checkbox', 'config_showlogo', get_string('showlogo', 'block_mediawiki_search'));
				
        //Select address of the MediaWiki logo
        $mform->addElement('text', 'config_logo', get_string('blocklogo', 'block_mediawiki_search'), 'size="64"');
        $mform->setDefault('config_logo', $CFG->wwwroot.'/blocks/mediawiki_search/Wiki.png');
        $mform->setType('config_logo', PARAM_MULTILANG);
				
				$mform->addHelpButton('config_logo', 'blocklogo', 'block_mediawiki_search');

				$mform->disabledIf('config_logo', 'config_showlogo');
    }
}
