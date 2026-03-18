<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 40px 0; background-color: #f3f4f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #1f2937;">
    <div style="max-width: 640px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">

        <!-- Header -->
        <div style="background-image:url('https://d1yei2z3i6k35z.cloudfront.net/161/609bb9ff8ffc9_Groupedemasques1.jpg'); background-size: cover; background-position: center; padding: 30px 20px; color: #ffffff; text-align: center;">
            <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email Icon" width="50" height="50" style="display: inline-block;">
            <h1 style="margin: 0; font-size: 22px; color:#142D63">New Contact Form Submission</h1>
            <p style="margin: 5px 0 0; font-size: 15px; opacity: 0.9; color:#142D63">ReviewBooster Contact Form</p>
        </div>

        <!-- Body -->
        <div style="padding: 30px 24px; background-color: #f9fafb;">

            <!-- Contact Info -->
            <div style="margin-bottom: 24px; background: #ffffff; border-left: 5px solid 
                {{ $submission->inquiry_type === 'support' ? '#dc2626' : ($submission->inquiry_type === 'sales' ? '#f59e0b' : '#3b82f6') }}; padding: 16px 20px; border-radius: 10px;">
                <h2 style="font-size: 16px; margin-bottom: 10px; color: #1d4ed8;">👤 Contact Information</h2>
                <p style="margin: 0; line-height: 2.0; font-size: 14px;">
                    <strong>{{ $submission->full_name }}</strong><br>
                    📧 {{ $submission->email }}<br>
                    @if($submission->phone) 📞 {{ $submission->phone }}<br> @endif
                    @if($submission->business_name) 🏢 {{ $submission->business_name }}<br> @endif
                    🕒 {{ $submission->created_at->format('M j, Y \a\t g:i A') }}
                </p>
            </div>

            <!-- Inquiry Info -->
            <div style="margin-bottom: 24px; background: #ffffff; padding: 16px 20px; border-radius: 10px;">
                <h2 style="font-size: 16px; margin-bottom: 10px; color: #1d4ed8;">💡 Inquiry Details</h2>
                <p style="margin: 0; font-size: 14px; line-height: 1.6;">
                    <strong>Type:</strong> {{ $submission->formatted_inquiry_type }}<br>
                    <strong>Subject:</strong> {{ $submission->subject }}
                </p>
            </div>

            <!-- Message -->
            <div style="margin-bottom: 24px; background: #ffffff; padding: 16px 20px; border-radius: 10px;">
                <h2 style="font-size: 16px; margin-bottom: 10px; color: #1d4ed8;">📝 Message</h2>
                <div style="background-color: #f1f5f9; border: 1px solid #e2e8f0; padding: 14px; border-radius: 8px; font-style: italic; font-size: 14px; color: #374151;">
                    {{ $submission->message }}
                </div>
            </div>

            <!-- Technical Info -->
            <div style="margin-bottom: 24px; background: #ffffff; padding: 16px 20px; border-radius: 10px;">
                <h2 style="font-size: 16px; margin-bottom: 10px; color: #1d4ed8;">🔧 Technical Info</h2>
                <p style="margin: 0; font-size: 14px; line-height: 1.6;">
                    <strong>IP Address:</strong> {{ $submission->ip_address }}<br>
                    <strong>Submission ID:</strong> #{{ $submission->id }}
                </p>
            </div>

            <!-- Quick Actions -->
            <div style="margin-top: 30px; text-align: center; background: #ffffff; padding: 20px; border-radius: 10px;">
                <h3 style="font-size: 16px; margin-bottom: 16px; color: #1e40af;">⚡ Quick Actions</h3>
                <a href="mailto:{{ $submission->email }}?subject=Re: {{ $submission->subject }}"
                   style="display: inline-block; margin: 5px 10px; padding: 10px 20px; background: #3b82f6; color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">📧 Reply</a>
                @if($submission->phone)
                <a href="tel:{{ $submission->phone }}"
                   style="display: inline-block; margin: 5px 10px; padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">📞 Call</a>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div style="background: #e5e7eb; padding: 20px; text-align: center; font-size: 13px; color: #475569;">
            <p style="margin: 0 0 5px;">This email was automatically generated from the ReviewBoost contact form.</p>
            <p style="margin: 0 0 8px;">Please respond promptly for excellent customer service 💬</p>
            <p style="margin: 0;"><strong>Target Response Time:</strong>
                @if($submission->inquiry_type === 'support')
                    4 hours
                @elseif($submission->inquiry_type === 'sales')
                    2 hours
                @else
                    24 hours
                @endif
            </p>
        </div>
    </div>
</body>
</html>
