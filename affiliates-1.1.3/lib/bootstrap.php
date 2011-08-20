<?php /*

Copyright (c) 2008, 2009 Metathinking Ltd.

This file is part of Affiliates For All.

Affiliates For All is free software: you can redistribute it and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

Affiliates For All is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with Affiliates For All.  If not, see
<http://www.gnu.org/licenses/>.

*/

require_once '../config.inc';

session_name($session_cookie_name);
session_start();
ini_set('include_path',
    '../lib' . PATH_SEPARATOR .
    '../templates' . PATH_SEPARATOR .
    ini_get('include_path'));

set_magic_quotes_runtime(FALSE);
if(ini_get('magic_quotes_gpc') || get_magic_quotes_runtime()
        || ini_get('magic_quotes_sybase')) {

    trigger_error('Affiliates for All requires the following PHP settings: '
      . 'magic_quotes_gpc off, magic_quotes_runtime off, '
      . 'magic_quotes_sybase off', E_USER_ERROR);
}

$https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' &&
    $_SERVER['HTTPS'] != '';

if(isset($logging_out))
    unset($_SESSION['affiliate_id']);

if(!isset($logon_not_required)) {
    if(!isset($_SESSION['affiliate_id'])) {
        $redirect = '';
    } else if(isset($admin_required) && !$_SESSION['administrator']) {
        $redirect = '';
    } else if(!isset($wizard_not_required) &&
            isset($_SESSION['wizard_incomplete'])) {

        $redirect = 'account.php';
    }

    if(isset($redirect)) {
        $dir = dirname($_SERVER['PHP_SELF']);
        if($dir != '/') $dir .= '/';
        $protocol = $https ? 'https' : 'http';
        header("Location: $protocol://${_SERVER['HTTP_HOST']}$dir$redirect");
        exit();
    }
}

require_once 'Database.php';
require_once 'Editor.php';
require_once 'Notification.php';
require_once 'Pager.php';
require_once 'Template.php';
require_once 'Trigger.php';