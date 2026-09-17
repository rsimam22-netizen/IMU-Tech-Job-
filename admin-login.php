<?php
require_once __DIR__ . '/includes/functions.php';

if (isAdminLoggedIn()) {
    redirect('admin-dashboard.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken(post('csrf_token'))) {
        $error = 'নিরাপত্তা যাচাই ব্যর্থ হয়েছে। আবার চেষ্টা করুন।';
    } else {
        $email = trim(post('email'));
        $password = post('password');

        if ($email === '' || $password === '') {
            $error = 'Email এবং Password দুটিই দিন।';
        } else {
            try {
                $stmt = db()->prepare(
                    'SELECT id, name, email, password_hash, status
                     FROM admins
                     WHERE email = ?
                     LIMIT 1'
                );

                $stmt->execute([$email]);
                $admin = $stmt->fetch();

                if (
                    $admin &&
                    $admin['status'] === 'active' &&
                    password_verify($password, $admin['password_hash'])
                ) {
                    loginAdmin(
                        (int) $admin['id'],
                        $admin['name'],
                        $admin['email']
                    );

                    redirect('admin-dashboard.php');
                }

                $error = 'Email অথবা Password সঠিক নয়।';
            } catch (Throwable $e) {
                $error = 'Database error হয়েছে। পরে আবার চেষ্টা করুন।';

                if (defined('APP_DEBUG') && APP_DEBUG === true) {
                    $error .= ' ' . $e->getMessage();
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - IMU Tech Job</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family:
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
            background:
                radial-gradient(circle at top left, #2563eb 0, transparent 35%),
                radial-gradient(circle at bottom right, #7c3aed 0, transparent 35%),
                #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #0f172a;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
        }

        .brand {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 12px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            font-size: 30px;
            font-weight: 800;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .25);
        }

        .brand h1 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .brand p {
            color: #cbd5e1;
            font-size: 14px;
        }

        .card {
            background: rgba(255, 255, 255, .97);
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, .3);
        }

        .card h2 {
            font-size: 22px;
            margin-bottom: 7px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 14px;
            margin-bottom: 18px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            height: 50px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 0 14px;
            font-size: 15px;
            outline: none;
            transition: .2s;
            background: white;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .1);
        }

        .password-box {
            position: relative;
        }

        .password-box input {
            padding-right: 80px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 8px;
            height: 34px;
            padding: 0 10px;
            border: 0;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            font-weight: 700;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            height: 52px;
            border: 0;
            border-radius: 13px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, box-shadow .2s;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .25);
        }

        .login-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(37, 99, 235, .32);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #475569;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .security-note {
            margin-top: 18px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.5;
        }

        @media (max-width: 480px) {
            .card {
                padding: 23px;
                border-radius: 18px;
            }

            .brand h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="brand">
        <div class="brand-icon">IMU</div>
        <h1>IMU Tech Job</h1>
        <p>Admin Control Panel</p>
    </div>

    <div class="card">

        <h2>Admin Login</h2>

        <p class="subtitle">
            আপনার Admin account দিয়ে প্রবেশ করুন।
        </p>

        <?php if ($error !== ''): ?>
            <div class="error">
                <?= e($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" autocomplete="on">

            <?= csrfField() ?>

            <div class="form-group">
                <label for="email">Admin Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="admin@example.com"
                    autocomplete="username"
                    value="<?= e(post('email')) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <div class="password-box">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="আপনার password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        id="togglePassword"
                    >
                        দেখুন
                    </button>
                </div>
            </div>

            <button
                type="submit"
                class="login-button"
            >
                Admin Panel-এ প্রবেশ করুন
            </button>

        </form>

        <a
            href="index.php"
            class="back-link"
        >
            ← Website-এ ফিরে যান
        </a>

        <div class="security-note">
            এই login শুধুমাত্র website administrator-এর জন্য।
        </div>

    </div>

</div>

<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';
        togglePassword.textContent = isPassword ? 'লুকান' : 'দেখুন';
    });
</script>

</body>
</html>
