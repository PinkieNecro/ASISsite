<?php
if( empty(session_id()) && !headers_sent()){
    session_start();
}
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/libs/helpers.php';
require_once __DIR__ . '/libs/flash.php';
require_once __DIR__ . '/libs/sanitization.php';
require_once __DIR__ . '/libs/validation.php';
require_once __DIR__ . '/libs/filter.php';
require_once __DIR__ . '/libs/connection.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../../shop/auth.php';