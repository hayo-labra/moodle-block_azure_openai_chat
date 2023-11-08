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
 * Block class
 *
 * @package    block_azure_openai_chat
 * @copyright  2022 Bryce Yoder <me@bryceyoder.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_azure_openai_chat extends block_base {
    public function init() {
        $this->title = get_string('azure_openai_chat', 'block_azure_openai_chat');
    }

    public function has_config() {
        return true;
    }

    public function specialization() {
        if (!empty($this->config->title)) {
            $this->title = $this->config->title;
        }
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $sourceoftruth = !empty($this->config) && $this->config->sourceoftruth ? $this->config->sourceoftruth : '';

        $assistantname = get_config('block_azure_openai_chat', 'assistantname') ? get_config('block_azure_openai_chat', 'assistantname') : get_string('defaultassistantname', 'block_azure_openai_chat');
        $username = get_config('block_azure_openai_chat', 'username') ? get_config('block_azure_openai_chat', 'username') : get_string('defaultusername', 'block_azure_openai_chat');

        $this->page->requires->js_call_amd('block_azure_openai_chat/chatlib', 'init', [$sourceoftruth, $username, $assistantname]);        

        // Determine if name labels should be shown.
        $showlabelscss = '';
        if (!empty($this->config) && !$this->config->showlabels) {
            $showlabelscss = '
                .azure_openai_message:before {
                    display: none;
                }
                .azure_openai_message {
                    margin-bottom: 0.5rem;
                }
            ';
        }


        $this->content = new stdClass;
        $this->content->text = '
            <div id="azure_openai_chat_log"></div>
        ';

        $this->content->footer = get_config('block_azure_openai_chat', 'apikey') ? '
            <input id="azure_openai_input" placeholder="' . get_string('askaquestion', 'block_azure_openai_chat') .'" type="text" name="message" />'
        : get_string('apikeymissing', 'block_azure_openai_chat');

        return $this->content;
    }
}
