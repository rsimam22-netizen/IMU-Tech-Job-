<?php
/**
 * IMU Tech Job
 * Main Configuration File
 *
 * File: includes/config.php
 */

// --------------------------------------------------
// Site Information
// --------------------------------------------------

define('SITE_NAME', 'IMU Tech Job');

// আপনার InfinityFree website URL এখানে বসাবেন।
// উদাহরণ:
// https://imutechjob.rf.gd
//
// এখন আপাতত নিজের URL না জানা থাকলে এই লাইনটি পরে পরিবর্তন করবেন।
define('APP_URL', 'https://YOUR-DOMAIN-HERE');

// --------------------------------------------------
// Database Configuration
// --------------------------------------------------
//
// InfinityFree hosting panel থেকে পাওয়া তথ্য এখানে বসাবেন।
//
// উদাহরণ:
//
// DB_HOST = sqlXXX.infinityfree.com
// DB_NAME = if0_12345678_imutechjob
// DB_USER = if0_12345678
// DB_PASS = আপনার Database Password
//

define('DB_HOST', 'YOUR-DATABASE-HOST');
define('DB_NAME', 'YOUR-DATABASE-NAME');
define('DB_USER', 'YOUR-DATABASE-USER');
define('DB_PASS', 'YOUR-DATABASE-PASSWORD');
define('DB_CHARSET', 'utf8mb4');

// --------------------------------------------------
// Timezone
// --------------------------------------------------

date_default_timezone_set('Asia/Dhaka');

// --------------------------------------------------
// Application Settings
// --------------------------------------------------

define('APP_VERSION', '1.0.0');

define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('UPLOAD_URL', rtrim(APP_URL, '/') . '/uploads/');

// --------------------------------------------------
// Session Settings
// --------------------------------------------------

if (session_status() === PHP_SESSION_NONE) {
    session_name('IMU_TECH_JOB_SESSION');

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}

// --------------------------------------------------
// Error Handling
// --------------------------------------------------
//
// Development environment-এর জন্য true রাখা হয়েছে।
// Website live করার আগে false করা ভালো।
//

define('APP_DEBUG', true);

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// --------------------------------------------------
// Basic Security Headers
// --------------------------------------------------

if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// --------------------------------------------------
// Helper Constants
// --------------------------------------------------

define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024); // 10 MB

define(
    'ALLOWED_IMAGE_TYPES',
    'image/jpeg,image/png,image/webp'
);

define(
    'ALLOWED_DOCUMENT_TYPES',
    'application/pdf'
);
