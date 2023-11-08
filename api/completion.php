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
 * API endpoint for retrieving GPT completion
 *
 * @package    block_azure_openai_chat
 * @copyright  2022 Bryce Yoder <me@bryceyoder.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use \block_azure_openai_chat\completion;

require_once('../../../config.php');
require_once($CFG->libdir . '/filelib.php');

if (get_config('block_azure_openai_chat', 'restrictusage') !== "0") {
    require_login();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: $CFG->wwwroot");
    die();
}

$body = json_decode(file_get_contents('php://input'), true);
$message = clean_param($body['message'], PARAM_NOTAGS);
$history = clean_param_array($body['history'], PARAM_NOTAGS, true);
$localsourceoftruth = clean_param($body['sourceOfTruth'], PARAM_NOTAGS);

if (!$message) {
    http_response_code(400);
    echo "'message' not included in request";
    die();
}

$engine = 'chat';

$model = get_config('block_azure_openai_chat', 'model');
if (!$model) {
    http_response_code(400);
    echo "'model' not defined";
    die();
}

$engine_class = '\block_azure_openai_chat\completion\\' . $engine;
$completion = new $engine_class(...[$model, $message, $history, $localsourceoftruth]);
$response = $completion->create_completion();

echo $response;
