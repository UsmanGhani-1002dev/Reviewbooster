<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>We Value Your Feedback</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #606265;
            margin: 0;
            padding: 40px 20px;
        }

        .email-wrapper {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 30px;
            text-align: center;
            box-shadow: inset 0 -2px 4px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .content {
            padding: 30px;
        }

        .rating {
            text-align: center;
            font-size: 24px;
            color: #f59e0b;
            margin-bottom: 10px;
        }

        .review-block {
            margin: 20px 0;
            border-left: 4px solid #ef4444;
            padding: 16px;
            border-radius: 6px;
        }

        .review-block p {
            font-size:18px;
            margin: 0;
            color: #555;
        }

        .apology {
            margin: 20px 0;
        
            padding: 16px;
        
        }

        .contact-box {
            border: 1px solid #93c5fd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .contact-box ul {
            padding-left: 20px;
            margin: 0;
        }

        .contact-box li {
            margin-bottom: 10px;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #2563eb;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .cta-button:hover {
            background-color: #1e40af;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #888;
            padding: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <!-- Header -->
        <div class="header">
            <h1>Thank You for Your Feedback</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p style="font-size: 20px; font-weight: 600;">Hi {{ $customerName }},</p>
            <p>Thank you for taking the time to share your experience with us on <strong>{{ $reviewDate }}</strong>.
            </p>

            <!-- Star Rating -->
            <div class="rating">
                {!! str_repeat('★', $rating) !!}{!! str_repeat('☆', 5 - $rating) !!}
                <div style="font-size: 14px; color: #666; margin-top: 4px;">You rated us {{ $rating }} out of 5
                </div>
            </div>

            <!-- Review Content -->
            <div class="review-block">
                <p>"{{ $reviewText }}"</p>
            </div>

            <!-- Apology Message -->
            <div class="apology">
                <p>We’re truly sorry that your experience didn’t meet your expectations. Please know your concerns are
                    being taken seriously, and we’re committed to improving.</p>
            </div>

            <!-- Contact and Resolution -->
            <div class="contact-box">
                <h3>Here’s what happens next:</h3>
                <ul>
                    <li>Our support team has received your feedback and is reviewing your case.</li>
                    <li>We’re here to listen and resolve the issue promptly.</li>
                </ul>
               <div style="text-align: center;">
    <a href="mailto:support@yourdomain.com" class="cta-button"
      style="color: white; background-color: #2563eb; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; box-shadow: 0 3px 6px rgba(0,0,0,0.1); display: inline-block; margin-top: 20px;">
      Reply to This Email
    </a>
  </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} ReviewBooster. All rights reserved.<br>
            <a href="https://codely.quest/reviewbooster/" style="color: #3b82f6; text-decoration: none;">www.codely.quest/reviewbooster</a>
        </div>
    </div>
</body>

</html>