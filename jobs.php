<?php
$siteName = "IMU Tech Job";

/*
|--------------------------------------------------------------------------
| Demo Job Data
|--------------------------------------------------------------------------
| পরে এগুলো Admin Panel + MySQL থেকে automatically আসবে।
|--------------------------------------------------------------------------
*/

$jobs = [
    [
        "title" => "সরকারি প্রতিষ্ঠানে নতুন নিয়োগ",
        "organization" => "সরকারি প্রতিষ্ঠান",
        "location" => "বাংলাদেশ",
        "deadline" => "শীঘ্রই",
        "type" => "সরকারি"
    ],
    [
        "title" => "বেসরকারি প্রতিষ্ঠানে বিভিন্ন পদে নিয়োগ",
        "organization" => "Private Company",
        "location" => "ঢাকা",
        "deadline" => "শীঘ্রই",
        "type" => "বেসরকারি"
    ],
    [
        "title" => "ব্যাংকে নতুন নিয়োগ বিজ্ঞপ্তি",
        "organization" => "ব্যাংকিং প্রতিষ্ঠান",
        "location" => "বাংলাদেশ",
        "deadline" => "শীঘ্রই",
        "type" => "ব্যাংক"
    ],
    [
        "title" => "আইটি কোম্পানিতে Software Engineer নিয়োগ",
        "organization" => "IT Company",
        "location" => "ঢাকা / Remote",
        "deadline" => "শীঘ্রই",
        "type" => "আইটি"
    ],
    [
        "title" => "শিক্ষা প্রতিষ্ঠানে শিক্ষক নিয়োগ",
        "organization" => "শিক্ষা প্রতিষ্ঠান",
        "location" => "বাংলাদেশ",
        "deadline" => "শীঘ্রই",
        "type" => "শিক্ষা"
    ]
];
?>
<!DOCTYPE html>
<html lang="bn">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>চাকরির খবর | <?= htmlspecialchars($siteName) ?></title>

    <meta
        name="description"
        content="IMU Tech Job থেকে সর্বশেষ চাকরির খবর ও নিয়োগ বিজ্ঞপ্তি দেখুন।"
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
            background: linear-gradient(
                135deg,
                #0757d9,
                #1736a8
            );

            color: white;

            position: sticky;
            top: 0;

            z-index: 1000;

            box-shadow:
                0 3px 15px rgba(0,0,0,.15);
        }

        .navbar {
            min-height: 68px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }

        .logo {
            font-size: 21px;
            font-weight: 800;
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a {
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(255,255,255,.15);
        }

        .menu-btn {
            display: none;

            border: 0;

            background: rgba(255,255,255,.15);

            color: white;

            font-size: 24px;

            width: 42px;
            height: 42px;

            border-radius: 8px;

            cursor: pointer;
        }

        /* Page Hero */

        .page-hero {
            background:
                linear-gradient(
                    135deg,
                    #081b4b,
                    #0a4ec2
                );

            color: white;

            padding: 55px 0;
        }

        .page-hero h1 {
            font-size: clamp(30px, 7vw, 46px);
            margin-bottom: 10px;
        }

        .page-hero p {
            color: #dce8ff;
            max-width: 650px;
        }

        /* Advertisement */

        .ad-box {
            margin: 22px 0;

            min-height: 80px;

            border: 1px dashed #b9c3d8;

            border-radius: 12px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #8b95a7;

            font-size: 13px;
        }

        /* Search */

        .search-section {
            padding: 28px 0 10px;
        }

        .search-box {
            background: white;

            padding: 18px;

            border-radius: 14px;

            border: 1px solid #e4e8f0;

            box-shadow:
                0 5px 20px rgba(15,35,75,.05);
        }

        .search-row {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;

            width: 100%;

            padding: 13px 15px;

            border: 1px solid #d7dce6;

            border-radius: 9px;

            font-size: 15px;

            outline: none;
        }

        .search-input:focus {
            border-color: #1769e0;

            box-shadow:
                0 0 0 3px rgba(23,105,224,.1);
        }

        .search-btn {
            border: 0;

            background: #0757d9;

            color: white;

            padding: 0 20px;

            border-radius: 9px;

            font-weight: 700;

            cursor: pointer;
        }

        /* Filters */

        .filters {
            display: flex;

            gap: 8px;

            overflow-x: auto;

            padding: 16px 0 4px;
        }

        .filter-btn {
            flex-shrink: 0;

            background: white;

            border: 1px solid #dce1ea;

            color: #344054;

            padding: 8px 13px;

            border-radius: 30px;

            cursor: pointer;

            font-size: 13px;
        }

        .filter-btn.active {
            background: #0757d9;
            color: white;
            border-color: #0757d9;
        }

        /* Jobs */

        .jobs-section {
            padding: 35px 0 60px;
        }

        .jobs-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 18px;
        }

        .jobs-header h2 {
            font-size: 25px;
        }

        .job-count {
            color: #667085;
            font-size: 13px;
        }

        .jobs {
            display: grid;

            gap: 15px;
        }

        .job-card {
            background: white;

            border: 1px solid #e5e9f0;

            border-radius: 15px;

            padding: 20px;

            display: grid;

            grid-template-columns: 1fr auto;

            gap: 15px;

            box-shadow:
                0 5px 20px rgba(15,35,75,.04);

            transition: .2s;
        }

        .job-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 9px 25px rgba(15,35,75,.08);
        }

        .job-type {
            display: inline-block;

            background: #eaf2ff;

            color: #0757d9;

            padding: 5px 9px;

            border-radius: 6px;

            font-size: 11px;

            font-weight: 700;

            margin-bottom: 8px;
        }

        .job-title {
            font-size: 18px;

            margin-bottom: 7px;
        }

        .job-info {
            display: flex;

            flex-wrap: wrap;

            gap: 8px 18px;

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

            height: fit-content;
        }

        .details-btn {
            display: inline-block;

            margin-top: 13px;

            background: #0757d9;

            color: white;

            padding: 8px 13px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 700;
        }

        .no-results {
            display: none;

            background: white;

            padding: 35px;

            text-align: center;

            border-radius: 14px;

            color: #667085;
        }

        /* Footer */

        footer {
            background: #09152f;

            color: #d8e1f2;

            padding: 35px 0;
        }

        .footer-content {
            display: grid;

            grid-template-columns:
                2fr 1fr 1fr;

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
            border-top:
                1px solid rgba(255,255,255,.1);

            margin-top: 25px;

            padding-top: 20px;

            text-align: center;

            color: #8fa0bb;

            font-size: 13px;
        }

        /* Mobile */

        @media (max-width: 760px) {

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

            .search-row {
                flex-direction: column;
            }

            .search-btn {
                padding: 12px;
            }

            .job-card {
                grid-template-columns: 1fr;
            }

            .deadline {
                width: fit-content;
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

        <button
            class="menu-btn"
            id="menuBtn"
            aria-label="Menu"
        >
            ☰
        </button>

        <nav class="nav-links" id="navLinks">

            <a href="index.php">
                হোম
            </a>

            <a
                href="jobs.php"
                class="active"
            >
                চাকরির খবর
            </a>

            <a href="tools.php">
                অনলাইন টুলস
            </a>

            <a href="index.php#services">
                সার্ভিস
            </a>

            <a href="index.php#contact">
                যোগাযোগ
            </a>

        </nav>

    </div>

</header>


<main>


    <!-- Page Hero -->

    <section class="page-hero">

        <div class="container">

            <h1>
                💼 চাকরির খবর
            </h1>

            <p>
                সর্বশেষ চাকরির সার্কুলার,
                নিয়োগ বিজ্ঞপ্তি এবং চাকরির তথ্য
                এক জায়গায়।
            </p>

        </div>

    </section>


    <!-- Advertisement -->

    <div class="container">

        <div class="ad-box">
            Advertisement
        </div>

    </div>


    <!-- Search -->

    <section class="search-section">

        <div class="container">

            <div class="search-box">

                <div class="search-row">

                    <input
                        type="search"
                        id="jobSearch"
                        class="search-input"
                        placeholder="চাকরি, প্রতিষ্ঠান বা লোকেশন লিখুন..."
                    >

                    <button
                        class="search-btn"
                        id="searchBtn"
                    >
                        🔎 খুঁজুন
                    </button>

                </div>


                <div class="filters">

                    <button
                        class="filter-btn active"
                        data-filter="all"
                    >
                        সব
                    </button>

                    <button
                        class="filter-btn"
                        data-filter="সরকারি"
                    >
                        সরকারি
                    </button>

                    <button
                        class="filter-btn"
                        data-filter="বেসরকারি"
                    >
                        বেসরকারি
                    </button>

                    <button
                        class="filter-btn"
                        data-filter="ব্যাংক"
                    >
                        ব্যাংক
                    </button>

                    <button
                        class="filter-btn"
                        data-filter="আইটি"
                    >
                        আইটি
                    </button>

                    <button
                        class="filter-btn"
                        data-filter="শিক্ষা"
                    >
                        শিক্ষা
                    </button>

                </div>

            </div>

        </div>

    </section>


    <!-- Job List -->

    <section class="jobs-section">

        <div class="container">

            <div class="jobs-header">

                <h2>
                    সর্বশেষ নিয়োগ
                </h2>

                <span
                    class="job-count"
                    id="jobCount"
                >
                    <?= count($jobs) ?>টি চাকরি
                </span>

            </div>


            <div class="jobs" id="jobsContainer">


                <?php foreach ($jobs as $index => $job): ?>

                    <article
                        class="job-card"
                        data-type="<?= htmlspecialchars($job['type']) ?>"
                        data-search="<?= htmlspecialchars(
                            strtolower(
                                $job['title'] . ' ' .
                                $job['organization'] . ' ' .
                                $job['location']
                            )
                        ) ?>"
                    >

                        <div>

                            <span class="job-type">
                                <?= htmlspecialchars($job['type']) ?>
                            </span>

                            <h3 class="job-title">
                                <?= htmlspecialchars($job['title']) ?>
                            </h3>

                            <div class="job-info">

                                <span>
                                    🏢
                                    <?= htmlspecialchars($job['organization']) ?>
                                </span>

                                <span>
                                    📍
                                    <?= htmlspecialchars($job['location']) ?>
                                </span>

                            </div>

                            <a
                                href="#"
                                class="details-btn"
                                onclick="showDemoMessage(event)"
                            >
                                বিস্তারিত দেখুন →
                            </a>

                        </div>


                        <span class="deadline">
                            ⏰ <?= htmlspecialchars($job['deadline']) ?>
                        </span>

                    </article>

                <?php endforeach; ?>


            </div>


            <div
                class="no-results"
                id="noResults"
            >
                😕 কোনো চাকরি পাওয়া যায়নি।
                <br>
                অন্য কিছু লিখে চেষ্টা করুন।
            </div>

        </div>

    </section>


</main>


<footer>

    <div class="container">

        <div class="footer-content">

            <div>

                <h3>
                    <?= htmlspecialchars($siteName) ?>
                </h3>

                <p>
                    চাকরির খবর এবং প্রয়োজনীয়
                    ডিজিটাল টুলস এক জায়গায়।
                </p>

            </div>


            <div>

                <h3>
                    Quick Links
                </h3>

                <a href="index.php">
                    হোম
                </a>

                <a href="jobs.php">
                    চাকরির খবর
                </a>

                <a href="tools.php">
                    অনলাইন টুলস
                </a>

            </div>


            <div>

                <h3>
                    যোগাযোগ
                </h3>

                <a href="mailto:contact@example.com">
                    📧 Email
                </a>

                <a href="#">
                    Facebook
                </a>

            </div>

        </div>


        <div class="copyright">

            © <?= date("Y") ?>

            <?= htmlspecialchars($siteName) ?>

            · All Rights Reserved.

        </div>

    </div>

</footer>


<script>

    const menuBtn =
        document.getElementById("menuBtn");

    const navLinks =
        document.getElementById("navLinks");


    menuBtn.addEventListener("click", function () {

        navLinks.classList.toggle("active");

    });


    document
        .querySelectorAll(".nav-links a")
        .forEach(function (link) {

            link.addEventListener(
                "click",
                function () {

                    navLinks.classList.remove("active");

                }
            );

        });


    const searchInput =
        document.getElementById("jobSearch");

    const searchBtn =
        document.getElementById("searchBtn");

    const jobCards =
        document.querySelectorAll(".job-card");

    const noResults =
        document.getElementById("noResults");

    const jobCount =
        document.getElementById("jobCount");


    let currentFilter = "all";


    function filterJobs() {

        const searchText =
            searchInput.value
                .trim()
                .toLowerCase();

        let visibleCount = 0;


        jobCards.forEach(function (card) {

            const type =
                card.dataset.type;

            const searchData =
                card.dataset.search;

            const matchesSearch =
                searchText === "" ||
                searchData.includes(searchText);

            const matchesFilter =
                currentFilter === "all" ||
                type === currentFilter;


            if (
                matchesSearch &&
                matchesFilter
            ) {

                card.style.display = "grid";

                visibleCount++;

            } else {

                card.style.display = "none";

            }

        });


        jobCount.textContent =
            visibleCount + "টি চাকরি";


        if (visibleCount === 0) {

            noResults.style.display =
                "block";

        } else {

            noResults.style.display =
                "none";

        }

    }


    searchBtn.addEventListener(
        "click",
        filterJobs
    );


    searchInput.addEventListener(
        "input",
        filterJobs
    );


    document
        .querySelectorAll(".filter-btn")
        .forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    document
                        .querySelectorAll(
                            ".filter-btn"
                        )
                        .forEach(function (btn) {

                            btn.classList.remove(
                                "active"
                            );

                        });


                    button.classList.add(
                        "active"
                    );


                    currentFilter =
                        button.dataset.filter;


                    filterJobs();

                }
            );

        });


    function showDemoMessage(event) {

        event.preventDefault();

        alert(
            "এই চাকরির বিস্তারিত তথ্য Admin Panel থেকে যোগ করা হবে।"
        );

    }

</script>


</body>

</html>
