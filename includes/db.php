<?php
/**
 * IMU Tech Job
 * Database Connection
 *
 * File: includes/db.php
 */

require_once __DIR__ . '/config.php';

/**
 * Create PDO database connection.
 */
function getDatabase(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = 'mysql:host=' . DB_HOST .
           ';dbname=' . DB_NAME .
           ';charset=' . DB_CHARSET;

    try {
        $pdo = new PDO(
            $dsn,
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]
        );

        return $pdo;
    } catch (PDOException $e) {
        if (defined('APP_DEBUG') && APP_DEBUG === true) {
            die(
                '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Database Connection Error</title>
                    <style>
                        body {
                            margin: 0;
                            padding: 30px;
                            background: #f8fafc;
                            color: #0f172a;
                            font-family: Arial, sans-serif;
                        }

                        .box {
                            max-width: 700px;
                            margin: 50px auto;
                            padding: 25px;
                            background: #ffffff;
                            border-radius: 16px;
                            box-shadow: 0 10px 30px rgba(0,0,0,.08);
                        }

                        h1 {
                            margin-top: 0;
                            color: #dc2626;
                        }

                        code {
                            display: block;
                            padding: 15px;
                            background: #f1f5f9;
                            border-radius: 10px;
                            overflow-x: auto;
                        }
                    </style>
                </head>
                <body>
                    <div class="box">
                        <h1>Database Connection Error</h1>
                        <p>MySQL database connection could not be established.</p>
                        <p>Please check the database information inside <strong>includes/config.php</strong>.</p>
                        <code>' .
                        htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') .
                        '</code>
                    </div>
                </body>
                </html>'
            );
        }

        die('Database connection failed.');
    }
}

/**
 * Return the database connection.
 */
function db(): PDO
{
    return getDatabase();
}
