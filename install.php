<?php
/**
 * IMU Tech Job
 * Database Installer
 *
 * File: install.php
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';

$success = false;
$error = '';
$messages = [];

$adminName = '';
$adminEmail = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminName = trim($_POST['admin_name'] ?? '');
    $adminEmail = trim($_POST['admin_email'] ?? '');
    $adminPassword = $_POST['admin_password'] ?? '';

    if ($adminName === '') {
        $error = 'Admin name is required.';
    } elseif (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid admin email address.';
    } elseif (strlen($adminPassword) < 8) {
        $error = 'Admin password must be at least 8 characters.';
    } else {
        try {
            $pdo = db();

            $tables = [];

            $tables[] = "
                CREATE TABLE IF NOT EXISTS admins (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(190) NOT NULL UNIQUE,
                    password_hash VARCHAR(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS settings (
                    setting_key VARCHAR(100) PRIMARY KEY,
                    setting_value LONGTEXT NULL
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS ads (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    slot_key VARCHAR(50) NOT NULL UNIQUE,
                    title VARCHAR(100) NOT NULL,
                    code LONGTEXT NULL,
                    enabled TINYINT(1) NOT NULL DEFAULT 0,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ON UPDATE CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS jobs (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL,
                    organization VARCHAR(255) NULL,
                    category VARCHAR(100) NULL,
                    location VARCHAR(255) NULL,
                    deadline DATE NULL,
                    description LONGTEXT NULL,
                    image VARCHAR(255) NULL,
                    slug VARCHAR(255) NOT NULL UNIQUE,
                    status ENUM('draft','published')
                        NOT NULL DEFAULT 'published',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ON UPDATE CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS downloads (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL,
                    file_path VARCHAR(500) NOT NULL,
                    file_name VARCHAR(255) NOT NULL,
                    enabled TINYINT(1) NOT NULL DEFAULT 1,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS templates (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL,
                    category VARCHAR(100) NULL,
                    content LONGTEXT NULL,
                    paper_size VARCHAR(50) NOT NULL DEFAULT 'A4',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ON UPDATE CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS files (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NULL,
                    file_name VARCHAR(255) NOT NULL,
                    file_path VARCHAR(500) NOT NULL,
                    file_type VARCHAR(100) NULL,
                    file_size BIGINT UNSIGNED NOT NULL DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            $tables[] = "
                CREATE TABLE IF NOT EXISTS tool_usage (
                    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    tool_slug VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    INDEX idx_tool_slug (tool_slug),
                    INDEX idx_created_at (created_at)
                ) ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci
            ";

            foreach ($tables as $sql) {
                $pdo->exec($sql);
            }

            $messages[] = 'Database tables created successfully.';

            /*
             * Create or update the first administrator.
             */
            $passwordHash = password_hash(
                $adminPassword,
                PASSWORD_DEFAULT
            );

            $stmt = $pdo->prepare(
                'SELECT id FROM admins WHERE email = ? LIMIT 1'
            );

            $stmt->execute([$adminEmail]);

            $existingAdmin = $stmt->fetch();

            if ($existingAdmin) {
                $stmt = $pdo->prepare(
                    'UPDATE admins
                     SET name = ?, password_hash = ?
                     WHERE id = ?'
                );

                $stmt->execute([
                    $adminName,
                    $passwordHash,
                    (int) $existingAdmin['id']
                ]);

                $messages[] = 'Existing administrator account updated.';
            } else {
                $stmt = $pdo->prepare(
                    'INSERT INTO admins
                    (name, email, password_hash)
                    VALUES (?, ?, ?)'
                );

                $stmt->execute([
                    $adminName,
                    $adminEmail,
                    $passwordHash
                ]);

                $messages[] = 'Administrator account created successfully.';
            }

            /*
             * Default settings.
             */
            $defaultSettings = [
                'site_name' => SITE_NAME,
                'download_ad_seconds' => '15',
                'download_gate_enabled' => '1'
            ];

            $settingStmt = $pdo->prepare(
                'INSERT INTO settings
                (setting_key, setting_value)
                VALUES (?, ?)
                ON DUPLICATE KEY UPDATE
                setting_value = VALUES(setting_value)'
            );

            foreach ($defaultSettings as $key => $value) {
                $settingStmt->execute([
                    $key,
                    $value
                ]);
            }

            /*
             * Default ad slots.
             */
            $defaultAds = [
                [
                    'header_banner',
                    'Header Banner',
                ],
                [
                    'footer_banner',
                    'Footer Banner',
                ],
                [
                    'popup',
                    'Popup Ad',
                ],
                [
                    'download',
                    'Download / Interstitial Ad',
                ]
            ];

            $adStmt = $pdo->prepare(
                'INSERT INTO ads
                (slot_key, title, code, enabled)
                VALUES (?, ?, ?, 0)
                ON DUPLICATE KEY UPDATE
                title = VALUES(title)'
            );

            foreach ($defaultAds as $ad) {
                $adStmt->execute([
                    $ad[0],
                    $ad[1],
                    ''
                ]);
            }

            $messages[] = 'Default settings and ad slots created.';

            /*
             * Create uploads directory.
             */
            $uploadDirectory = __DIR__ . '/uploads';

            if (!is_dir($uploadDirectory)) {
                if (@mkdir($uploadDirectory, 0755, true)) {
                    $messages[] = 'Uploads directory created.';
                } else {
                    $messages[] =
                        'Uploads directory could not be created automatically.';
                }
            } else {
                $messages[] = 'Uploads directory already exists.';
            }

            $success = true;

        } catch (Throwable $e) {
            $error = APP_DEBUG
                ? $e->getMessage()
                : 'Installation failed. Please check your database settings.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        IMU Tech Job - Installation
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #f8fafc 50%,
                    #ecfeff
                );
            color: #0f172a;
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .container {
            width: min(94%, 720px);
            margin: 40px auto;
        }

        .brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 12px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: linear-gradient(
                135deg,
                #2563eb,
                #06b6d4
            );
            color: white;
            font-size: 28px;
            font-weight: 800;
            box-shadow:
                0 15px 35px rgba(37, 99, 235, .25);
        }

        .brand h1 {
            margin: 0;
            font-size: 28px;
        }

        .brand p {
            margin: 8px 0 0;
            color: #64748b;
        }

        .card {
            background: rgba(255, 255, 255, .95);
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 28px;
            box-shadow:
                0 20px 50px rgba(15, 23, 42, .08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .description {
            color: #64748b;
            line-height: 1.7;
            margin-top: 0;
        }

        .notice {
            padding: 15px 16px;
            border-radius: 12px;
            margin: 18px 0;
            line-height: 1.6;
        }

        .error {
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .success {
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .info {
            color: #075985;
            background: #f0f9ff;
            border: 1px solid #bae6fd;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 700;
        }

        input {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
            background: white;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow:
                0 0 0 4px rgba(37, 99, 235, .10);
        }

        button {
            width: 100%;
            margin-top: 24px;
            min-height: 50px;
            border: 0;
            border-radius: 13px;
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #0891b2
                );
            color: white;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            box-shadow:
                0 12px 25px rgba(37, 99, 235, .20);
        }

        button:hover {
            opacity: .94;
        }

        .check-list {
            margin: 20px 0;
            padding: 0;
            list-style: none;
        }

        .check-list li {
            padding: 9px 0;
            color: #334155;
        }

        .check-list li::before {
            content: "✓";
            color: #16a34a;
            font-weight: 800;
            margin-right: 10px;
        }

        .credentials {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 16px;
            border-radius: 14px;
            margin-top: 20px;
        }

        .credentials strong {
            color: #0f172a;
        }

        .warning {
            margin-top: 20px;
            padding: 15px;
            border-radius: 12px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #9a3412;
            line-height: 1.6;
        }

        .messages {
            margin: 15px 0;
            padding-left: 20px;
            color: #334155;
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            margin-top: 22px;
        }

        @media (max-width: 600px) {
            .container {
                width: 94%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
                border-radius: 18px;
            }

            .brand h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="brand">
        <div class="brand-icon">I</div>

        <h1>
            IMU Tech Job
        </h1>

        <p>
            Website Installation
        </p>
    </div>

    <div class="card">

        <?php if ($success): ?>

            <div class="notice success">
                <strong>Installation completed successfully!</strong>
                <br>
                Your database and administrator account are ready.
            </div>

            <ul class="messages">
                <?php foreach ($messages as $message): ?>
                    <li>
                        <?= htmlspecialchars(
                            $message,
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="credentials">
                <strong>Admin Email:</strong>
                <?= htmlspecialchars(
                    $adminEmail,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
                <br><br>

                <strong>Admin Password:</strong>
                The password you entered during installation.
            </div>

            <div class="warning">
                <strong>Important:</strong>
                Installation is finished. For security, delete
                <strong>install.php</strong> from your hosting after
                completing the installation.
            </div>

        <?php else: ?>

            <h2>
                Install IMU Tech Job
            </h2>

            <p class="description">
                Before continuing, make sure the database information
                inside <strong>includes/config.php</strong> is correct.
            </p>

            <div class="notice info">
                This installer will create the required MySQL tables,
                default settings, ad slots, uploads folder, and your
                first administrator account.
            </div>

            <?php if ($error !== ''): ?>

                <div class="notice error">
                    <strong>Installation Error:</strong>
                    <br><br>
                    <?= htmlspecialchars(
                        $error,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>

            <?php endif; ?>

            <ul class="check-list">
                <li>Admin account</li>
                <li>Jobs management database</li>
                <li>Advertisement slots</li>
                <li>Download management</li>
                <li>Document templates</li>
                <li>File management</li>
                <li>Tool usage tracking</li>
                <li>Site settings</li>
            </ul>

            <form
                method="post"
                action=""
                autocomplete="off"
            >

                <label for="admin_name">
                    Admin Name
                </label>

                <input
                    type="text"
                    id="admin_name"
                    name="admin_name"
                    value="<?= htmlspecialchars(
                        $adminName,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    placeholder="Example: IMU Admin"
                    required
                >

                <label for="admin_email">
                    Admin Email
                </label>

                <input
                    type="email"
                    id="admin_email"
                    name="admin_email"
                    value="<?= htmlspecialchars(
                        $adminEmail,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    placeholder="admin@example.com"
                    required
                >

                <label for="admin_password">
                    Admin Password
                </label>

                <input
                    type="password"
                    id="admin_password"
                    name="admin_password"
                    placeholder="Minimum 8 characters"
                    minlength="8"
                    required
                >

                <button type="submit">
                    Install Website Database
                </button>

            </form>

        <?php endif; ?>

    </div>

    <div class="footer">
        <?= htmlspecialchars(
            SITE_NAME,
            ENT_QUOTES,
            'UTF-8'
        ) ?>
        &copy;
        <?= date('Y') ?>
    </div>

</div>

</body>
</html>
