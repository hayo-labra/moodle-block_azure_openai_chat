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
 * Plugin settings
 *
 * @package    block_azure_openai_chat
 * @copyright  2022 Bryce Yoder <me@bryceyoder.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$settings->add(new admin_setting_configcheckbox(
    'block_azure_openai_chat/restrictusage',
    get_string('restrictusage', 'block_azure_openai_chat'),
    get_string('restrictusagedesc', 'block_azure_openai_chat'),
    1
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/endpoint',
    get_string('endpoint', 'block_azure_openai_chat'),
    get_string('endpointdesc', 'block_azure_openai_chat'),
    '{your-resource-name}.openai.azure.com',
    PARAM_TEXT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/apikey',
    get_string('apikey', 'block_azure_openai_chat'),
    get_string('apikeydesc', 'block_azure_openai_chat'),
    '',
    PARAM_TEXT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/model',
    get_string('model', 'block_azure_openai_chat'),
    get_string('modeldesc', 'block_azure_openai_chat'),
    '',
    PARAM_TEXT
));

$settings->add(new admin_setting_configtextarea(
    'block_azure_openai_chat/prompt',
    get_string('prompt', 'block_azure_openai_chat'),
    get_string('promptdesc', 'block_azure_openai_chat'),
    "Below is a conversation between a user and a support assistant for a Moodle site, where users go for online learning.",
    PARAM_TEXT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/assistantname',
    get_string('assistantname', 'block_azure_openai_chat'),
    get_string('assistantnamedesc', 'block_azure_openai_chat'),
    'Assistant',
    PARAM_TEXT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/username',
    get_string('username', 'block_azure_openai_chat'),
    get_string('usernamedesc', 'block_azure_openai_chat'),
    'User',
    PARAM_TEXT
));

$settings->add(new admin_setting_configtextarea(
    'block_azure_openai_chat/sourceoftruth',
    get_string('sourceoftruth', 'block_azure_openai_chat'),
    get_string('sourceoftruthdesc', 'block_azure_openai_chat'),
    '',
    PARAM_TEXT
));

// Advanced Settings //

$settings->add(new admin_setting_heading(
    'block_azure_openai_chat/advanced',
    get_string('advanced', 'block_azure_openai_chat'),
    get_string('advanceddesc', 'block_azure_openai_chat'),
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/temperature',
    get_string('temperature', 'block_azure_openai_chat'),
    get_string('temperaturedesc', 'block_azure_openai_chat'),
    0.5,
    PARAM_FLOAT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/maxlength',
    get_string('maxlength', 'block_azure_openai_chat'),
    get_string('maxlengthdesc', 'block_azure_openai_chat'),
    500,
    PARAM_INT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/topp',
    get_string('topp', 'block_azure_openai_chat'),
    get_string('toppdesc', 'block_azure_openai_chat'),
    1,
    PARAM_FLOAT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/frequency',
    get_string('frequency', 'block_azure_openai_chat'),
    get_string('frequencydesc', 'block_azure_openai_chat'),
    1,
    PARAM_FLOAT
));

$settings->add(new admin_setting_configtext(
    'block_azure_openai_chat/presence',
    get_string('presence', 'block_azure_openai_chat'),
    get_string('presencedesc', 'block_azure_openai_chat'),
    1,
    PARAM_FLOAT
));
