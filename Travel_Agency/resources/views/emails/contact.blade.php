<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Travel Quote Request</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f5;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e1e8e3;
        }
        .header {
            background-color: #064e3b; /* Dark Green matching emerald */
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 40px 30px;
        }
        .intro {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #4b5563;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .details-table th, .details-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .details-table th {
            background-color: #f9fafb;
            color: #374151;
            font-weight: 600;
            width: 35%;
        }
        .details-table td {
            color: #1f2937;
        }
        .highlight {
            color: #059669; /* Emerald/Green key value */
            font-weight: bold;
        }
        .coupon-badge {
            background-color: #fef3c7; /* Light amber */
            color: #92400e; /* Amber text */
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #f3f4f6;
        }
        .footer a {
            color: #059669;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Travel Quote Request</h1>
        </div>
        <div class="content">
            <p class="intro">Hello, you have received a new personalized travel quote request from the website. Here are the submission details:</p>
            
            <table class="details-table">
                <tr>
                    <th>Full Name</th>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><a href="mailto:{{ $data['email'] }}" style="color: #059669; text-decoration: none;">{{ $data['email'] }}</a></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><a href="tel:{{ $data['phone'] }}" style="color: #059669; text-decoration: none;">{{ $data['phone'] }}</a></td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td class="highlight">{{ ucfirst($data['destination']) }}</td>
                </tr>
                <tr>
                    <th>Coupon Code</th>
                    <td>
                        @if(!empty($data['coupon']))
                            <span class="coupon-badge">{{ $data['coupon'] }}</span>
                        @else
                            <span style="color: #9ca3af; font-style: italic;">None provided</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Submitted At</th>
                    <td>{{ now()->timezone('Asia/Colombo')->format('Y-m-d h:i A') }} (SL Time)</td>
                </tr>
            </table>

            <p style="margin: 0; font-size: 14px; color: #6b7280; text-align: center;">
                Please respond to this request within 2 hours as promised to the user.
            </p>
        </div>
        <div class="footer">
            <p>Sent automatically from {{ config('app.name') }}.</p>
        </div>
    </div>
</body>
</html>
