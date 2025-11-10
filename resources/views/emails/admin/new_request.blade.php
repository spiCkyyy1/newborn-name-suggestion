<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Invitation Request</title>
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            margin: 0;
            padding: 40px 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(15,23,42,0.05);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: white;
            padding: 24px;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            /* Added styles to center icon and text */
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px; /* Space between icon and text */
        }
        .content {
            padding: 32px;
        }
        .panel {
            background: #f1f5f9;
            padding: 16px;
            border-radius: 8px;
            margin: 16px 0;
        }
        .button {
            display: inline-block;
            background-color: #0ea5e9;
            color: white !important;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .footer {
            text-align: center;
            color: #64748b;
            padding: 16px;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <!-- Heroicon: Envelope (Solid). Fill is explicitly set to white for maximum email client compatibility. -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" style="width: 24px; height: 24px;">
            <!-- Main envelope body -->
            <path d="M1.5 8.67v8.58A3 3 0 004.5 20.25h15a3 3 0 003-3v-8.58l-8.625 5.568a2.25 2.25 0 01-2.75 0L1.5 8.67z" />
            <!-- Flap area -->
            <path d="M22.5 6.5l-9.75 6.25-9.75-6.25V4.25a2.25 2.25 0 012.25-2.25h15A2.25 2.25 0 0122.5 4.25V6.5z" />
        </svg>
        New Invitation Request
    </div>
    <div class="content">
        <p>A new customer just submitted a invitation request.</p>

        <div class="panel">
            <p><strong>Name:</strong> {{ $data['name'] ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $data['email'] ?? 'N/A' }}</p>
            <p><strong>Message:</strong><br>{{ $data['message'] ?? 'No message provided.' }}</p>
        </div>

        <div style="text-align:center; margin-top: 20px;">
            <a href="{{ route('admin.dashboard') }}" class="button">View in Admin Panel</a>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</div>
</body>
</html>
