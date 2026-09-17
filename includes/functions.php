<?php
/**
 * IMU Tech Job
 * Common Application Functions
 *
 * File: includes/functions.php
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// --------------------------------------------------
// HTML Escape
// --------------------------------------------------

function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

// --------------------------------------------------
// Redirect
// --------------------------------------------------

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

// --------------------------------------------------
// Site URL
// --------------------------------------------------

function siteUrl(string $path = ''): string
{
    $base = rtrim(APP_URL, '/');
    $path = ltrim($path, '/');

    if ($path === '') {
        return $base;
    }

    return $base . '/' . $path;
}

// --------------------------------------------------
// Flash Messages
// --------------------------------------------------

function setFlash(string $type, string $message): void
{
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash(): ?array
{
    if (!isset($_SESSION['flash_message'])) {
        return null;
    }

    $flash = $_SESSION['flash_message'];

    unset($_SESSION['flash_message']);

    return $flash;
}

// --------------------------------------------------
// CSRF Protection
// --------------------------------------------------

function csrfToken(): string
{
    if (
        empty($_SESSION['csrf_token']) ||
        !is_string($_SESSION['csrf_token'])
    ) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrfField(): string
{
    return '<input type="hidden" name="csrf_token" value="' .
        e(csrfToken()) .
        '">';
}

function verifyCsrf(): void
{
    $sessionToken = $_SESSION['csrf_token'] ?? '';
    $postedToken = $_POST['csrf_token'] ?? '';

    if (
        !is_string($sessionToken) ||
        !is_string($postedToken) ||
        $sessionToken === '' ||
        $postedToken === '' ||
        !hash_equals($sessionToken, $postedToken)
    ) {
        http_response_code(419);

        exit(
            '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Security Check Failed</title>
                <style>
                    body {
                        margin: 0;
                        min-height: 100vh;
                        display: grid;
                        place-items: center;
                        background: #f8fafc;
                        font-family: Arial, sans-serif;
                        color: #0f172a;
                    }

                    .box {
                        width: min(90%, 500px);
                        padding: 30px;
                        background: #fff;
                        border-radius: 18px;
                        text-align: center;
                        box-shadow: 0 15px 40px rgba(15, 23, 42, .10);
                    }

                    h1 {
                        color: #dc2626;
                    }
                </style>
            </head>
            <body>
                <div class="box">
                    <h1>Security Check Failed</h1>
                    <p>Your request could not be verified.</p>
                    <p>Please go back and try again.</p>
                </div>
            </body>
            </html>'
        );
    }
}

// --------------------------------------------------
// Admin Authentication
// --------------------------------------------------

function isAdminLoggedIn(): bool
{
    return !empty($_SESSION['admin_id']);
}

function requireAdmin(): void
{
    if (!isAdminLoggedIn()) {
        redirect(siteUrl('admin/login.php'));
    }
}

function adminId(): ?int
{
    if (!isAdminLoggedIn()) {
        return null;
    }

    return (int) $_SESSION['admin_id'];
}

function loginAdmin(int $id, string $name, string $email): void
{
    session_regenerate_id(true);

    $_SESSION['admin_id'] = $id;
    $_SESSION['admin_name'] = $name;
    $_SESSION['admin_email'] = $email;
    $_SESSION['admin_logged_in_at'] = time();

    csrfToken();
}

function logoutAdmin(): void
{
    unset(
        $_SESSION['admin_id'],
        $_SESSION['admin_name'],
        $_SESSION['admin_email'],
        $_SESSION['admin_logged_in_at']
    );

    unset($_SESSION['csrf_token']);

    session_regenerate_id(true);
}

function adminName(): string
{
    return (string) ($_SESSION['admin_name'] ?? 'Administrator');
}

function adminEmail(): string
{
    return (string) ($_SESSION['admin_email'] ?? '');
}

// --------------------------------------------------
// Text Helpers
// --------------------------------------------------

function cleanText(string $text): string
{
    $text = trim($text);

    $text = preg_replace('/\s+/u', ' ', $text);

    return $text ?? '';
}

function makeSlug(string $text): string
{
    $text = trim($text);

    $text = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $text);
    $text = preg_replace('/[\s-]+/u', '-', $text);

    $text = trim($text, '-');

    if ($text === '') {
        $text = 'item-' . time();
    }

    return strtolower($text);
}

// --------------------------------------------------
// Date Helpers
// --------------------------------------------------

function formatDate(?string $date): string
{
    if (empty($date)) {
        return '';
    }

    $timestamp = strtotime($date);

    if ($timestamp === false) {
        return '';
    }

    return date('d M Y', $timestamp);
}

function formatDateTime(?string $dateTime): string
{
    if (empty($dateTime)) {
        return '';
    }

    $timestamp = strtotime($dateTime);

    if ($timestamp === false) {
        return '';
    }

    return date('d M Y, h:i A', $timestamp);
}

// --------------------------------------------------
// File Helpers
// --------------------------------------------------

function ensureDirectory(string $directory): bool
{
    if (is_dir($directory)) {
        return true;
    }

    return mkdir($directory, 0755, true);
}

function randomFileName(string $extension): string
{
    $extension = strtolower(ltrim($extension, '.'));

    return bin2hex(random_bytes(16)) . '.' . $extension;
}

function allowedImageExtension(string $extension): bool
{
    $allowed = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];

    return in_array(
        strtolower($extension),
        $allowed,
        true
    );
}

function allowedDocumentExtension(string $extension): bool
{
    return strtolower($extension) === 'pdf';
}

// --------------------------------------------------
// Request Helpers
// --------------------------------------------------

function post(string $key, mixed $default = null): mixed
{
    return $_POST[$key] ?? $default;
}

function get(string $key, mixed $default = null): mixed
{
    return $_GET[$key] ?? $default;
}

// --------------------------------------------------
// JSON Response
// --------------------------------------------------

function jsonResponse(
    array $data,
    int $statusCode = 200
): never {
    http_response_code($statusCode);

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode(
        $data,
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES
    );

    exit;
}

// --------------------------------------------------
// Safe Integer
// --------------------------------------------------

function intValue(mixed $value, int $default = 0): int
{
    if (!is_numeric($value)) {
        return $default;
    }

    return (int) $value;
}

// --------------------------------------------------
// Database Health Check
// --------------------------------------------------

function databaseIsReady(): bool
{
    try {
        db()->query('SELECT 1');

        return true;
    } catch (Throwable $e) {
        return false;
    }
}

// --------------------------------------------------
// App Information
// --------------------------------------------------

function appInfo(): array
{
    return [
        'name' => SITE_NAME,
        'version' => APP_VERSION,
        'timezone' => date_default_timezone_get(),
        'php_version' => PHP_VERSION
    ];
}
