<?php

$siteName = "IMU Tech Job";

$tool = isset($_GET["tool"])
    ? trim($_GET["tool"])
    : "";

$tools = [

    "pdf-merge" => [
        "title" => "PDF Merge",
        "description" => "একাধিক PDF একসাথে একটি PDF করুন।",
        "icon" => "📑"
    ],

    "pdf-split" => [
        "title" => "PDF Split",
        "description" => "PDF থেকে প্রয়োজনীয় page আলাদা করুন।",
        "icon" => "✂️"
    ],

    "image-to-pdf" => [
        "title" => "Image to PDF",
        "description" => "এক বা একাধিক ছবি থেকে PDF তৈরি করুন।",
        "icon" => "🖼️"
    ],

    "image-compress" => [
        "title" => "Image Compress",
        "description" => "ছবির file size কমান।",
        "icon" => "📦"
    ],

    "image-resize" => [
        "title" => "Image Resize",
        "description" => "ছবির width ও height পরিবর্তন করুন।",
        "icon" => "📐"
    ],

    "image-crop" => [
        "title" => "Image Crop",
        "description" => "ছবির প্রয়োজনীয় অংশ crop করুন।",
        "icon" => "✂️"
    ],

    "image-converter" => [
        "title" => "Image Converter",
        "description" => "JPG, PNG এবং WebP format-এ convert করুন।",
        "icon" => "🔄"
    ],

    "passport-photo" => [
        "title" => "Passport Photo",
        "description" => "Passport, Visa ও NID photo তৈরি করুন।",
        "icon" => "🪪"
    ],

    "background-color" => [
        "title" => "Background Color",
        "description" => "ছবির background-এর রং পরিবর্তন করুন।",
        "icon" => "🎨"
    ],

    "bulk-image" => [
        "title" => "Bulk Image",
        "description" => "একসাথে একাধিক image process করুন।",
        "icon" => "🖼️"
    ],

    "resume-builder" => [
        "title" => "Resume Builder",
        "description" => "Professional Resume তৈরি করুন।",
        "icon" => "📄"
    ],

    "cv-builder" => [
        "title" => "CV Builder",
        "description" => "সহজে সুন্দর CV তৈরি করুন।",
        "icon" => "📝"
    ],

    "document-generator" => [
        "title" => "Document Generator",
        "description" => "Template থেকে document তৈরি করুন।",
        "icon" => "📃"
    ],

    "invoice-generator" => [
        "title" => "Invoice Generator",
        "description" => "Professional invoice তৈরি করুন।",
        "icon" => "🧾"
    ],

    "business-card" => [
        "title" => "Business Card",
        "description" => "Business card তৈরি করুন।",
        "icon" => "💳"
    ],

    "poster-maker" => [
        "title" => "Poster Maker",
        "description" => "Poster design তৈরি করুন।",
        "icon" => "🖼️"
    ],

    "banner-maker" => [
        "title" => "Banner Maker",
        "description" => "Banner design তৈরি করুন।",
        "icon" => "🏷️"
    ],

    "job-card-maker" => [
        "title" => "Job Card Maker",
        "description" => "চাকরির circular-এর social media card তৈরি করুন।",
        "icon" => "💼"
    ],

    "qr-code" => [
        "title" => "QR Code Generator",
        "description" => "Text বা link থেকে QR Code তৈরি করুন।",
        "icon" => "▦"
    ],

    "text-case" => [
        "title" => "Text Case Converter",
        "description" => "Text-এর uppercase ও lowercase পরিবর্তন করুন।",
        "icon" => "Aa"
    ],

    "word-counter" => [
        "title" => "Word Counter",
        "description" => "Word ও character count করুন।",
        "icon" => "🔢"
    ],

    "json-formatter" => [
        "title" => "JSON Formatter",
        "description" => "JSON format সুন্দরভাবে সাজান।",
        "icon" => "{}"
    ],

    "calculator" => [
        "title" => "Calculator",
        "description" => "সাধারণ হিসাব করুন।",
        "icon" => "🧮"
    ],

    "unit-converter" => [
        "title" => "Unit Converter",
        "description" => "বিভিন্ন unit convert করুন।",
        "icon" => "📏"
    ]

];

if (!isset($tools[$tool])) {
    $tool = "calculator";
}

$currentTool = $tools[$tool];

?>

<!DOCTYPE html>

<html lang="bn">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($currentTool["title"]) ?>
        -
        <?= htmlspecialchars($siteName) ?>
    </title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                Arial,
                "Noto Sans Bengali",
                sans-serif;

            background: #f5f7fb;

            color: #172033;

            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        .container {
            width: min(1100px, 92%);
            margin: auto;
        }

        /* HEADER */

        header {
            background:
                linear-gradient(
                    135deg,
                    #0757d9,
                    #1736a8
                );

            color: white;

            position: sticky;

            top: 0;

            z-index: 1000;

            box-shadow:
                0 3px 15px
                rgba(0,0,0,.15);
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

            gap: 5px;

            align-items: center;
        }

        .nav-links a {
            padding: 9px 12px;

            border-radius: 8px;

            font-size: 14px;
        }

        .nav-links a:hover {
            background:
                rgba(255,255,255,.15);
        }

        .menu-btn {
            display: none;

            border: 0;

            background:
                rgba(255,255,255,.15);

            color: white;

            font-size: 24px;

            width: 42px;

            height: 42px;

            border-radius: 8px;

            cursor: pointer;
        }

        /* HERO */

        .tool-hero {
            background:
                linear-gradient(
                    135deg,
                    #081b4b,
                    #0a4ec2
                );

            color: white;

            padding: 45px 0;
        }

        .back-link {
            display: inline-block;

            margin-bottom: 20px;

            color: #dce8ff;

            font-size: 14px;
        }

        .tool-title {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .tool-big-icon {
            width: 60px;

            height: 60px;

            display: grid;

            place-items: center;

            background:
                rgba(255,255,255,.12);

            border:
                1px solid
                rgba(255,255,255,.2);

            border-radius: 15px;

            font-size: 28px;
        }

        .tool-hero h1 {
            font-size:
                clamp(28px, 6vw, 42px);
        }

        .tool-hero p {
            margin-top: 7px;

            color: #dce8ff;
        }

        /* AD */

        .ad-box {
            margin: 22px 0;

            min-height: 80px;

            border:
                1px dashed #b9c3d8;

            border-radius: 12px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #8b95a7;

            font-size: 13px;
        }

        /* TOOL AREA */

        .tool-area {
            padding: 30px 0 60px;
        }

        .tool-box {
            background: white;

            border:
                1px solid #e3e8f0;

            border-radius: 16px;

            padding: 25px;

            box-shadow:
                0 8px 25px
                rgba(15,35,75,.05);
        }

        .tool-box h2 {
            margin-bottom: 8px;
        }

        .tool-help {
            color: #667085;

            font-size: 14px;

            margin-bottom: 20px;
        }

        /* INPUT */

        .field {
            margin-bottom: 15px;
        }

        .field label {
            display: block;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 6px;
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;

            border:
                1px solid #d5dbe6;

            border-radius: 9px;

            padding: 11px 12px;

            outline: none;

            background: white;

            font-size: 14px;
        }

        .field textarea {
            min-height: 150px;

            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: #0757d9;

            box-shadow:
                0 0 0 3px
                rgba(7,87,217,.1);
        }

        /* BUTTON */

        .primary-btn {
            border: 0;

            background: #0757d9;

            color: white;

            padding: 11px 18px;

            border-radius: 9px;

            font-weight: 700;

            cursor: pointer;

            font-size: 14px;
        }

        .primary-btn:hover {
            background: #0649b6;
        }

        .secondary-btn {
            border:
                1px solid #d5dbe6;

            background: white;

            color: #344054;

            padding: 11px 18px;

            border-radius: 9px;

            font-weight: 700;

            cursor: pointer;

            font-size: 14px;
        }

        /* FILE */

        .file-input {
            border:
                2px dashed #cbd5e1;

            border-radius: 12px;

            padding: 30px 20px;

            text-align: center;

            background: #fafcff;

            cursor: pointer;

            margin-bottom: 18px;
        }

        .file-input:hover {
            border-color: #0757d9;

            background: #f4f8ff;
        }

        .file-input input {
            display: none;
        }

        .file-icon {
            font-size: 35px;

            margin-bottom: 7px;
        }

        .file-text {
            color: #667085;

            font-size: 13px;
        }

        /* RESULT */

        .result {
            display: none;

            margin-top: 20px;

            padding: 18px;

            background: #f5f8ff;

            border:
                1px solid #dbe7ff;

            border-radius: 12px;
        }

        .result.show {
            display: block;
        }

        /* SIMPLE CALCULATOR */

        .calculator {
            max-width: 400px;

            margin: auto;
        }

        .calc-display {
            width: 100%;

            padding: 18px;

            font-size: 25px;

            text-align: right;

            border:
                1px solid #d5dbe6;

            border-radius: 10px;

            margin-bottom: 10px;

            background: #f8fafc;
        }

        .calc-buttons {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 8px;
        }

        .calc-buttons button {
            border: 0;

            background: #edf2f7;

            padding: 15px 5px;

            border-radius: 9px;

            font-size: 17px;

            cursor: pointer;
        }

        .calc-buttons button:hover {
            background: #dfe7f2;
        }

        .calc-buttons .operator {
            background: #e3edff;

            color: #0757d9;

            font-weight: 700;
        }

        .calc-buttons .equal {
            background: #0757d9;

            color: white;
        }

        /* PREVIEW */

        .preview {
            margin-top: 20px;

            padding: 15px;

            border-radius: 10px;

            background: #f8fafc;

            border:
                1px solid #e5e7eb;

            min-height: 80px;

            white-space: pre-wrap;

            word-break: break-word;
        }

        /* FOOTER */

        footer {
            background: #09152f;

            color: #d8e1f2;

            padding: 35px 0;
        }

        .copyright {
            text-align: center;

            color: #8fa0bb;

            font-size: 13px;
        }

        /* MOBILE */

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

            .tool-box {
                padding: 18px;
            }

        }

    </style>

</head>


<body>


<header>

    <div class="container navbar">

        <a
            href="index.php"
            class="logo"
        >
            💼 <?= htmlspecialchars($siteName) ?>
        </a>


        <button
            class="menu-btn"
            id="menuBtn"
        >
            ☰
        </button>


        <nav
            class="nav-links"
            id="navLinks"
        >

            <a href="index.php">
                হোম
            </a>

            <a href="jobs.php">
                চাকরির খবর
            </a>

            <a href="tools.php">
                অনলাইন টুলস
            </a>

        </nav>

    </div>

</header>


<main>


    <section class="tool-hero">

        <div class="container">

            <a
                href="tools.php"
                class="back-link"
            >
                ← সকল Tools
            </a>


            <div class="tool-title">

                <div class="tool-big-icon">
                    <?= $currentTool["icon"] ?>
                </div>


                <div>

                    <h1>
                        <?= htmlspecialchars(
                            $currentTool["title"]
                        ) ?>
                    </h1>

                    <p>
                        <?= htmlspecialchars(
                            $currentTool["description"]
                        ) ?>
                    </p>

                </div>

            </div>

        </div>

    </section>


    <div class="container">

        <div class="ad-box">
            Advertisement
        </div>

    </div>


    <section class="tool-area">

        <div class="container">

            <div class="tool-box">

                <?php if ($tool === "calculator"): ?>

                    <h2>🧮 Calculator</h2>

                    <p class="tool-help">
                        নিচের calculator ব্যবহার করে
                        হিসাব করুন।
                    </p>


                    <div class="calculator">

                        <input
                            type="text"
                            id="calcDisplay"
                            class="calc-display"
                            value="0"
                            readonly
                        >


                        <div class="calc-buttons">

                            <button
                                onclick="clearCalculator()"
                            >
                                C
                            </button>

                            <button
                                onclick="deleteCalculator()"
                            >
                                ⌫
                            </button>

                            <button
                                class="operator"
                                onclick="calculatorInput('%')"
                            >
                                %
                            </button>

                            <button
                                class="operator"
                                onclick="calculatorInput('/')"
                            >
                                ÷
                            </button>


                            <button
                                onclick="calculatorInput('7')"
                            >
                                7
                            </button>

                            <button
                                onclick="calculatorInput('8')"
                            >
                                8
                            </button>

                            <button
                                onclick="calculatorInput('9')"
                            >
                                9
                            </button>

                            <button
                                class="operator"
                                onclick="calculatorInput('*')"
                            >
                                ×
                            </button>


                            <button
                                onclick="calculatorInput('4')"
                            >
                                4
                            </button>

                            <button
                                onclick="calculatorInput('5')"
                            >
                                5
                            </button>

                            <button
                                onclick="calculatorInput('6')"
                            >
                                6
                            </button>

                            <button
                                class="operator"
                                onclick="calculatorInput('-')"
                            >
                                −
                            </button>


                            <button
                                onclick="calculatorInput('1')"
                            >
                                1
                            </button>

                            <button
                                onclick="calculatorInput('2')"
                            >
                                2
                            </button>

                            <button
                                onclick="calculatorInput('3')"
                            >
                                3
                            </button>

                            <button
                                class="operator"
                                onclick="calculatorInput('+')"
                            >
                                +
                            </button>


                            <button
                                onclick="calculatorInput('0')"
                            >
                                0
                            </button>

                            <button
                                onclick="calculatorInput('.')"
                            >
                                .
                            </button>

                            <button
                                class="equal"
                                style="grid-column: span 2;"
                                onclick="calculateResult()"
                            >
                                =
                            </button>

                        </div>

                    </div>


                <?php elseif ($tool === "word-counter"): ?>


                    <h2>🔢 Word Counter</h2>

                    <p class="tool-help">
                        নিচে text লিখুন।
                    </p>


                    <div class="field">

                        <textarea
                            id="wordText"
                            placeholder="এখানে আপনার লেখা লিখুন..."
                        ></textarea>

                    </div>


                    <div class="result show">

                        <strong>
                            Word:
                        </strong>

                        <span id="wordCount">
                            0
                        </span>

                        &nbsp;&nbsp;

                        <strong>
                            Character:
                        </strong>

                        <span id="charCount">
                            0
                        </span>

                        &nbsp;&nbsp;

                        <strong>
                            Sentence:
                        </strong>

                        <span id="sentenceCount">
                            0
                        </span>

                    </div>


                <?php elseif ($tool === "text-case"): ?>


                    <h2>🔤 Text Case Converter</h2>

                    <p class="tool-help">
                        Text লিখে নিচের button ব্যবহার করুন।
                    </p>


                    <div class="field">

                        <textarea
                            id="caseText"
                            placeholder="এখানে text লিখুন..."
                        ></textarea>

                    </div>


                    <div
                        style="
                            display:flex;
                            flex-wrap:wrap;
                            gap:8px;
                        "
                    >

                        <button
                            class="primary-btn"
                            onclick="convertUppercase()"
                        >
                            UPPERCASE
                        </button>

                        <button
                            class="secondary-btn"
                            onclick="convertLowercase()"
                        >
                            lowercase
                        </button>

                        <button
                            class="secondary-btn"
                            onclick="convertTitleCase()"
                        >
                            Title Case
                        </button>

                        <button
                            class="secondary-btn"
                            onclick="clearCaseText()"
                        >
                            Clear
                        </button>

                    </div>


                <?php elseif ($tool === "json-formatter"): ?>


                    <h2>{ } JSON Formatter</h2>

                    <p class="tool-help">
                        Valid JSON এখানে paste করুন।
                    </p>


                    <div class="field">

                        <textarea
                            id="jsonInput"
                            placeholder='{"name":"IMU Tech Job"}'
                        ></textarea>

                    </div>


                    <button
                        class="primary-btn"
                        onclick="formatJSON()"
                    >
                        JSON Format করুন
                    </button>


                    <div
                        class="result"
                        id="jsonResult"
                    ></div>


                <?php elseif ($tool === "unit-converter"): ?>


                    <h2>📏 Unit Converter</h2>

                    <p class="tool-help">
                        Meter, Kilometer, Feet এবং Inch convert করুন।
                    </p>


                    <div class="field">

                        <label>
                            Value
                        </label>

                        <input
                            type="number"
                            id="unitValue"
                            value="1"
                        >

                    </div>


                    <div class="field">

                        <label>
                            From
                        </label>

                        <select id="unitFrom">

                            <option value="meter">
                                Meter
                            </option>

                            <option value="kilometer">
                                Kilometer
                            </option>

                            <option value="feet">
                                Feet
                            </option>

                            <option value="inch">
                                Inch
                            </option>

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            To
                        </label>

                        <select id="unitTo">

                            <option value="meter">
                                Meter
                            </option>

                            <option value="kilometer">
                                Kilometer
                            </option>

                            <option value="feet">
                                Feet
                            </option>

                            <option value="inch">
                                Inch
                            </option>

                        </select>

                    </div>


                    <button
                        class="primary-btn"
                        onclick="convertUnit()"
                    >
                        Convert করুন
                    </button>


                    <div
                        class="result"
                        id="unitResult"
                    ></div>


                <?php elseif (
                    $tool === "image-compress" ||
                    $tool === "image-resize" ||
                    $tool === "image-converter" ||
                    $tool === "background-color" ||
                    $tool === "bulk-image"
                ): ?>


                    <h2>
                        <?= htmlspecialchars(
                            $currentTool["icon"]
                        ) ?>

                        <?= htmlspecialchars(
                            $currentTool["title"]
                        ) ?>
                    </h2>


                    <p class="tool-help">
                        Image নির্বাচন করুন।
                        এই browser-based tool-এ
                        আপনার image process করা হবে।
                    </p>


                    <label class="file-input">

                        <div class="file-icon">
                            🖼️
                        </div>

                        <div>
                            <strong>
                                Image নির্বাচন করুন
                            </strong>
                        </div>

                        <div class="file-text">
                            JPG / PNG / WebP
                        </div>

                        <input
                            type="file"
                            id="imageInput"
                            accept="image/*"
                            multiple
                        >

                    </label>


                    <div
                        id="imageControls"
                        style="display:none;"
                    >

                        <div class="field">

                            <label>
                                Quality
                            </label>

                            <input
                                type="range"
                                id="imageQuality"
                                min="
