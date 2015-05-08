<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Display Override
| -------------------------------------------------------------------------

	Override the display for correct testing purpose

*/

$hook['display_override'] = array(
    'class' => 'DisplayHook',
    'function' => 'captureOutput',
    'filename' => 'DisplayHook.php',
    'filepath' => 'hooks'
);