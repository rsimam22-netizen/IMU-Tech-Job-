<?php
$siteName = "IMU Tech Job";

$categories = [
    "সব",
    "PDF",
    "Image",
    "Resume",
    "Document",
    "Design",
    "Text",
    "Other"
];

$tools = [

    [
        "name" => "PDF Merge",
        "description" => "একাধিক PDF একসাথে একটি PDF বানান।",
        "icon" => "📑",
        "category" => "PDF",
        "slug" => "pdf-merge"
    ],

    [
        "name" => "PDF Split",
        "description" => "PDF-এর প্রয়োজনীয় page আলাদা করুন।",
        "icon" => "✂️",
        "category" => "PDF",
        "slug" => "pdf-split"
    ],

    [
        "name" => "Image to PDF",
        "description" => "ছবি থেকে সহজে PDF তৈরি করুন।",
        "icon" => "🖼️",
        "category" => "PDF",
        "slug" => "image-to-pdf"
    ],

    [
        "name" => "Image Compress",
        "description" => "ছবির quality ঠিক রেখে file size কমান।",
        "icon" => "📦",
        "category" => "Image",
        "slug" => "image-compress"
    ],

    [
        "name" => "Image Resize",
        "description" => "ছবির width ও height পরিবর্তন করুন।",
        "icon" => "📐",
        "category" => "Image",
        "slug" => "image-resize"
    ],

    [
        "name" => "Image Crop",
        "description" => "ছবির প্রয়োজনীয় অংশ crop করুন।",
        "icon" => "✂️",
        "category" => "Image",
        "slug" => "image-crop"
    ],

    [
        "name" => "Image Converter",
        "description" => "JPG, PNG ও অন্যান্য image format পরিবর্তন করুন।",
        "icon" => "🔄",
        "category" => "Image",
        "slug" => "image-converter"
    ],

    [
        "name" => "Passport Photo",
        "description" => "Passport, Visa ও NID photo তৈরি করুন।",
        "icon" => "🪪",
        "category" => "Image",
        "slug" => "passport-photo"
    ],

    [
        "name" => "Background Color",
        "description" => "ছবির background color পরিবর্তন করুন।",
        "icon" => "🎨",
        "category" => "Image",
        "slug" => "background-color"
    ],

    [
        "name" => "Bulk Image",
        "description" => "একসাথে অনেকগুলো image process করুন।",
        "icon" => "🖼️",
        "category" => "Image",
        "slug" => "bulk-image"
    ],

    [
        "name" => "Resume Builder",
        "description" => "Professional Resume তৈরি করুন।",
        "icon" => "📄",
        "category" => "Resume",
        "slug" => "resume-builder"
    ],

    [
        "name" => "CV Builder",
        "description" => "সহজে সুন্দর CV তৈরি করুন।",
        "icon" => "📝",
        "category" => "Resume",
        "slug" => "cv-builder"
    ],

    [
        "name" => "Document Generator",
        "description" => "Template ব্যবহার করে document তৈরি করুন।",
        "icon" => "📃",
        "category" => "Document",
        "slug" => "document-generator"
    ],

    [
        "name" => "Invoice Generator",
        "description" => "Professional invoice তৈরি করুন।",
        "icon" => "🧾",
        "category" => "Document",
        "slug" => "invoice-generator"
    ],

    [
        "name" => "Business Card",
        "description" => "Business card design তৈরি করুন।",
        "icon" => "💳",
        "category" => "Design",
        "slug" => "business-card"
    ],

    [
        "name" => "Poster Maker",
        "description" => "Poster ও promotional design তৈরি করুন।",
        "icon" => "🖼️",
        "category" => "Design",
        "slug" => "poster-maker"
    ],

    [
        "name" => "Banner Maker",
        "description" => "Website ও social media banner তৈরি করুন।",
        "icon" => "🏷️",
        "category" => "Design",
        "slug" => "banner-maker"
    ],

    [
        "name" => "Job Card Maker",
        "description" => "চাকরির circular-এর জন্য social media card তৈরি করুন।",
        "icon" => "💼",
        "category" => "Design",
        "slug" => "job-card-maker"
    ],

    [
        "name" => "QR Code Generator",
        "description" => "যেকোনো link বা text থেকে QR Code তৈরি করুন।",
        "icon" => "▦",
        "category" => "Other",
        "slug" => "qr-code"
    ],

    [
        "name" => "Text Case Converter",
        "description" => "Uppercase, lowercase ও text case পরিবর্তন করুন।",
        "icon" => "Aa",
        "category" => "Text",
        "slug" => "text-case"
    ],

    [
        "name" => "Word Counter",
        "description" => "Word, character ও sentence count করুন।",
        "icon" => "🔢",
        "category" => "Text",
        "slug" => "word-counter"
    ],

    [
        "name" => "JSON Formatter",
        "description" => "JSON format সুন্দর ও readable করুন।",
        "icon" => "{}",
        "category" => "Other",
        "slug" => "json-formatter"
    ],

    [
        "name" => "Calculator",
        "description" => "সাধারণ হিসাব-নিকাশ করুন।",
        "icon" => "🧮",
        "category" => "Other",
        "slug" => "calculator"
    ],

    [
        "name" => "Unit Converter",
        "description" => "বিভিন্ন unit সহজে convert করুন।",
        "icon" => "📏",
        "category" => "Other",
        "slug" => "unit-converter"
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

    <title>
        Online Tools | <?= htmlspecialchars($siteName) ?>
    </title>

    <meta
        name="description"
        content="IMU Tech Job-এর প্রয়োজনীয় Online Tools"
    >

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

        .hero {
            background:
                linear-gradient(
                    135deg,
                    #081b4b,
                    #0a4ec2
                );

            color: white;

            padding: 55px 0;
        }

        .hero h1 {
            font-size:
                clamp(30px, 7vw, 46px);

            margin-bottom: 10px;
        }

        .hero p {
            color: #dce8ff;

            max-width: 700px;

            font-size: 16px;
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

        .tools-section {
            padding: 35px 0 60px;
        }

        /* SEARCH */

        .search-box {
            background: white;

            border:
                1px solid #e3e8f0;

            border-radius: 14px;

            padding: 18px;

            margin-bottom: 20px;

            box-shadow:
                0 5px 20px
                rgba(15,35,75,.05);
        }

        .search-input {
            width: 100%;

            padding: 13px 15px;

            border:
                1px solid #d5dbe6;

            border-radius: 9px;

            font-size: 15px;

            outline: none;
        }

        .search-input:focus {
            border-color: #0757d9;

            box-shadow:
                0 0 0 3px
                rgba(7,87,217,.1);
        }

        /* CATEGORIES */

        .categories {
            display: flex;

            gap: 8px;

            overflow-x: auto;

            padding-bottom: 5px;

            margin-bottom: 25px;
        }

        .category-btn {
            flex-shrink: 0;

            border:
                1px solid #dce2eb;

            background: white;

            color: #344054;

            padding: 8px 14px;

            border-radius: 30px;

            cursor: pointer;

            font-size: 13px;
        }

        .category-btn.active {
            background: #0757d9;

            color: white;

            border-color: #0757d9;
        }

        /* GRID */

        .tools-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 16px;
        }

        .tool-card {
            background: white;

            border:
                1px solid #e4e8ef;

            border-radius: 15px;

            padding: 21px;

            box-shadow:
                0 5px 20px
                rgba(15,35,75,.04);

            transition: .2s;

            display: flex;

            flex-direction: column;
        }

        .tool-card:hover {
            transform:
                translateY(-3px);

            box-shadow:
                0 10px 28px
                rgba(15,35,75,.09);
        }

        .tool-icon {
            width: 52px;
            height: 52px;

            display: grid;

            place-items: center;

            background: #eaf2ff;

            color: #0757d9;

            border-radius: 13px;

            font-size: 23px;

            margin-bottom: 15px;
        }

        .tool-category {
            display: inline-block;

            width: fit-content;

            background: #f1f4f9;

            color: #667085;

            padding: 4px 8px;

            border-radius: 5px;

            font-size: 10px;

            margin-bottom: 8px;

            font-weight: 700;
        }

        .tool-card h3 {
            font-size: 17px;

            margin-bottom: 7px;
        }

        .tool-card p {
            color: #667085;

            font-size: 13px;

            margin-bottom: 16px;

            flex: 1;
        }

        .use-btn {
            display: block;

            width: 100%;

            text-align: center;

            background: #0757d9;

            color: white;

            padding: 9px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 700;
        }

        .use-btn:hover {
            background: #0649b6;
        }

        .no-results {
            display: none;

            background: white;

            text-align: center;

            padding: 35px;

            border-radius: 14px;

            color: #667085;
        }

        /* FOOTER */

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
                1px
