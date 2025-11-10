<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You for Your Request</title>
    <style>
        /* Base styles reset */
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            margin: 0;
            padding: 40px 0;
        }
        /* Main Email Container */
        .email-container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 16px; /* Slightly larger radius */
            box-shadow: 0 10px 15px -3px rgba(15,23,42,0.05), 0 4px 6px -4px rgba(15,23,42,0.05); /* Softer, modern shadow */
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }
        /* Header Section */
        .header {
            background: linear-gradient(135deg, #10b981, #059669); /* Green gradient */
            color: white;
            padding: 30px 24px; /* Increased padding */
            text-align: center;
            font-size: 24px; /* Slightly larger title */
            font-weight: 700;

            /* Flexbox for centering icon and text */
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        /* Content Section */
        .content {
            padding: 40px 32px; /* Increased top/bottom padding */
            line-height: 1.6;
        }
        .content p {
            margin-bottom: 20px; /* Consistent spacing between paragraphs */
        }
        /* Button */
        .button {
            display: inline-block;
            background-color: #10b981;
            color: white !important;
            padding: 14px 28px; /* Larger button */
            border-radius: 12px; /* Rounded button */
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.4); /* Green shadow for lift */
        }
        /* Footer */
        .footer {
            text-align: center;
            color: #94a3b8; /* Lighter slate color */
            padding: 20px 16px;
            font-size: 12px;
            border-top: 1px solid #f1f5f9;
            background-color: #f8fafc;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <!-- Heroicon: Check Badge (Solid). Fill is explicitly set to white. -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" style="width: 32px; height: 32px; flex-shrink: 0;">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
        </svg>
        Thanks for Reaching Out
    </div>
    <div class="content">
        <p>Hi {{ $name }},</p>

        <p style="font-size: 18px; font-weight: 600;">
            We've successfully received your invitation request!
        </p>

        <p>Our team is currently reviewing the information and will get back to you with an update or your unique family link as soon as possible.</p>

        <p>If you have any urgent changes or need to share additional details, please reply directly to this email.</p>

        <div style="text-align:center; margin-top: 30px;">
            <a href="{{ config('app.url') }}" class="button">Visit {{ config('app.name') }}</a>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</div>
</body>
</html>
