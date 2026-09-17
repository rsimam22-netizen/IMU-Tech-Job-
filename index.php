<?php
$siteName = "IMU Tech Job";
$tagline = "চাকরি, টেকনোলজি ও প্রয়োজনীয় অনলাইন টুলস — এক জায়গায়";
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($siteName) ?></title>

    <meta
        name="description"
        content="IMU Tech Job - চাকরির খবর, প্রয়োজনীয় অনলাইন টুলস এবং ডিজিটাল সার্ভিস।"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, "Noto Sans Bengali", sans-serif;
            background: #f5f7fb;
            color: #172033;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1100px, 92%);
            margin: auto;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #0757d9, #1736a8);
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 15px rgba(0,0,0,.15);
        }

        .navbar {
            min-height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .nav-links a {
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 14px;
            transition: .2s;
        }

        .nav-links a:hover {
            background: rgba(255,255,255,.15);
        }

        .menu-btn {
            display: none;
            border: 0;
            background: rgba(255,255,255,.15);
            color: white;
            font-size: 25px;
            width: 42px;
            height: 42px;
            border-radius: 8px;
        }

        /* Hero */
        .hero {
            background:
                radial-gradient(circle at top right, rgba(42,116,255,.3), transparent 35%),
                linear-gradient(135deg, #081b4b, #0a4ec2);
            color: white;
            padding: 70px 0;
        }

        .hero-content {
            max-width: 760px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            padding: 7px 13px;
            border-radius: 30px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .hero h1 {
            font-size: clamp(34px, 7vw, 58px);
            line-height: 1.1;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 18px;
            color: #dce8ff;
            margin-bottom: 28px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 10px;
            padding: 12px 18px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-primary {
            background: #fff;
            color: #1248b8;
        }

        .btn-secondary {
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.3);
            color: white;
        }

        /* Ad */
        .ad-box {
            margin: 24px 0;
            min-height: 70px;
            border: 1px dashed #b9c3d8;
            border-radius: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b95a7;
            font-size: 13px;
        }

        /* Sections */
        section {
            padding: 55px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .section-title p {
            color: #667085;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .card {
            background: white;
            border: 1px solid #e6eaf1;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(15,35,75,.05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15,35,75,.1);
        }

        .icon {
            width: 50px;
            height: 50px;
            display: grid;
            place-items: center;
            background: #eaf2ff;
            color: #0a58ca;
            border-radius: 13px;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card h3 {
            margin-bottom: 8px;
        }

        .card p {
            color: #667085;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card-link {
            color: #0757d9;
            font-weight: 700;
            font-size: 14px;
        }

        /* Jobs */
        .job-list {
            display: grid;
            gap: 14px;
        }

        .job {
            background: white;
            border: 1px solid #e6eaf1;
            border-radius: 14px;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .job h3 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .job p {
            color: #667085;
            font-size: 13px;
        }

        .deadline {
            background: #fff1f1;
            color: #d92d20;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 12px;
            white-space: nowrap;
        }

        /* Footer */
        footer {
            background: #09152f;
            color: #d8e1f2;
            padding: 35px 0;
            margin-top: 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 30px;
        }

        footer h3 {
            color: white;
            margin-bottom: 10px;
        }

        footer p,
        footer a {
            color: #aebbd0;
            font-size: 14px;
        }

        footer a {
            display: block;
            margin: 5px 0;
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,.1);
            margin-top: 25px;
            padding-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #8fa0bb;
        }

        /* Mobile */
        @media (max-width: 760px) {

            .navbar {
                min-height: 62px;
            }

            .menu-btn {
                display: block;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 62px;
                left: 0;
                right: 0;
                background: #123da2;
                padding: 10px;
                flex-direction: column;
                align-items: stretch;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                padding: 12px;
            }

            .hero {
                padding: 50px 0;
            }

            .hero p {
                font-size: 16px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .job {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="container navbar">

        <a href="index.php" class="logo">
            💼 <?= htmlspecialchars($siteName) ?>
        </a>

        <button class="menu-btn" id="menuBtn" aria-label="Menu">
            ☰
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="index.php">হোম</a>
            <a href="jobs.php">চাকরির খবর</a>
            <a href="tools.php">অনলাইন টুলস</a>
            <a href="#services">সার্ভিস</a>
            <a href="#contact">যোগাযোগ</a>
        </nav>

    </div>
</header>


<main>

    <!-- Hero -->
    <section class="hero">

        <div class="container hero-content">

            <span class="hero-badge">
                🚀 Welcome to IMU Tech Job
            </span>

            <h1>
                চাকরি ও ডিজিটাল টুলস<br>
                এক জায়গায়
            </h1>

            <p>
                প্রতিদিনের চাকরির খবর, PDF ও Image Tools,
                Resume Builder এবং আরও অনেক দরকারি সুবিধা।
            </p>

            <div class="hero-buttons">
                <a href="jobs.php" class="btn btn-primary">
                    🔎 চাকরি দেখুন
                </a>

                <a href="tools.php" class="btn btn-secondary">
                    🛠️ Tools দেখুন
                </a>
            </div>

        </div>

    </section>


    <!-- Banner Ad -->
    <div class="container">

        <div class="ad-box">
            Advertisement
        </div>

    </div>


    <!-- Services -->
    <section id="services">

        <div class="container">

            <div class="section-title">
                <h2>আমাদের প্রধান সার্ভিস</h2>
                <p>দৈনন্দিন প্রয়োজনীয় কাজ সহজ করুন</p>
            </div>


            <div class="cards">

                <div class="card">

                    <div class="icon">💼</div>

                    <h3>চাকরির খবর</h3>

                    <p>
                        সরকারি ও বেসরকারি চাকরির সার্কুলার
                        সহজে খুঁজে দেখুন।
                    </p>

                    <a href="jobs.php" class="card-link">
                        চাকরি দেখুন →
                    </a>

                </div>


                <div class="card">

                    <div class="icon">📄</div>

                    <h3>PDF Tools</h3>

                    <p>
                        PDF Merge, Split, Image to PDF
                        এবং অন্যান্য PDF সুবিধা।
                    </p>

                    <a href="tools.php" class="card-link">
                        Tools দেখুন →
                    </a>

                </div>


                <div class="card">

                    <div class="icon">🖼️</div>

                    <h3>Image Tools</h3>

                    <p>
                        Image Resize, Compress, Convert,
                        Crop এবং Passport Photo Tools।
                    </p>

                    <a href="tools.php" class="card-link">
                        Image Tools →
                    </a>

                </div>


                <div class="card">

                    <div class="icon">📝</div>

                    <h3>Resume Builder</h3>

                    <p>
                        সহজে professional Resume তৈরি
                        ও PDF হিসেবে সংরক্ষণ করুন।
                    </p>

                    <a href="tools.php" class="card-link">
                        Resume তৈরি করুন →
                    </a>

                </div>


                <div class="card">

                    <div class="icon">🎨</div>

                    <h3>Design Editor</h3>

                    <p>
                        Poster, Banner, Business Card
                        এবং Social Media Design তৈরি করুন।
                    </p>

                    <a href="tools.php" class="card-link">
                        Editor খুলুন →
                    </a>

                </div>


                <div class="card">

                    <div class="icon">📑</div>

                    <h3>Document Generator</h3>

                    <p>
                        বিভিন্ন Document Template ব্যবহার
                        করে প্রয়োজনীয় document তৈরি করুন।
                    </p>

                    <a href="tools.php" class="card-link">
                        Generator →
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- Jobs Preview -->
    <section>

        <div class="container">

            <div class="section-title">

                <h2>সর্বশেষ চাকরির খবর</h2>

                <p>
                    নতুন চাকরির সার্কুলার এখানে দেখা যাবে
                </p>

            </div>


            <div class="job-list">

                <div class="job">

                    <div>
                        <h3>
                            সরকারি চাকরির নতুন সার্কুলার
                        </h3>

                        <p>
                            সরকারি প্রতিষ্ঠান • বাংলাদেশ
                        </p>
                    </div>

                    <span class="deadline">
                        বিস্তারিত শীঘ্রই
                    </span>

                </div>


                <div class="job">

                    <div>
                        <h3>
                            বেসরকারি প্রতিষ্ঠানে নিয়োগ
                        </h3>

                        <p>
                            Private Company • বিভিন্ন স্থান
                        </p>
                    </div>

                    <span class="deadline">
                        বিস্তারিত শীঘ্রই
                    </span>

                </div>


                <div class="job">

                    <div>
                        <h3>
                            নতুন নিয়োগ বিজ্ঞপ্তি
                        </h3>

                        <p>
                            চাকরির তথ্য • বাংলাদেশ
                        </p>
                    </div>

                    <span class="deadline">
                        বিস্তারিত শীঘ্রই
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- Footer Ad -->
    <div class="container">

        <div class="ad-box">
            Footer Advertisement
        </div>

    </div>

</main>


<footer id="contact">

    <div class="container">

        <div class="footer-content">

            <div>

                <h3><?= htmlspecialchars($siteName) ?></h3>

                <p>
                    <?= htmlspecialchars($tagline) ?>
                </p>

            </div>


            <div>

                <h3>Quick Links</h3>

                <a href="index.php">হোম</a>
                <a href="jobs.php">চাকরির খবর</a>
                <a href="tools.php">অনলাইন টুলস</a>

            </div>


            <div>

                <h3>যোগাযোগ</h3>

                <a href="mailto:contact@example.com">
                    Email
                </a>

                <a href="#">
                    Facebook
                </a>

            </div>

        </div>


        <div class="copyright">

            © <?= date("Y") ?>
            <?= htmlspecialchars($siteName) ?>.
            All Rights Reserved.

        </div>

    </div>

</footer>


<script>

    const menuBtn = document.getElementById("menuBtn");
    const navLinks = document.getElementById("navLinks");

    menuBtn.addEventListener("click", function () {

        navLinks.classList.toggle("active");

    });


    document.querySelectorAll(".nav-links a").forEach(function (link) {

        link.addEventListener("click", function () {

            navLinks.classList.remove("active");

        });

    });

</script>

</body>
</html>
