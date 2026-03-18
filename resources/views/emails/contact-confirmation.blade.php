<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You from ReviewBoost</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 40px 0; color: #1f2937;">
  <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">

    <!-- Header -->
    <div style="background-image:url('https://d1yei2z3i6k35z.cloudfront.net/161/609bb9ff8ffc9_Groupedemasques1.jpg'); background-size: cover; background-position: center; padding: 30px 20px; color: #ffffff; text-align: center;">
       <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email Icon" width="50" height="50" style="display: inline-block;">
      <h1 style="margin: 10px 0 5px; font-size: 26px; color:#142D63">Thank You!</h1>
      <p style="margin: 0; font-size: 15px; opacity: 0.95; color:#142D63">We've received your message</p>
    </div>

    <!-- Main Content -->
    <div style="padding: 30px 25px;">
      <p style="font-size: 17px; margin: 0 0 15px;">Hi <strong class="color:#142D63;">{{ $submission->first_name }} {{ $submission->last_name  }}</strong>,</p>

      <p style="font-size: 15px; line-height: 1.6; margin-bottom: 25px;">
        Thanks for getting in touch with <strong>ReviewBoost</strong>! Your message is important to us. We’re reviewing it and will get back to you shortly.
      </p>

      <!-- Submission Summary -->
      <div style="background-color: #f9fafb; padding: 18px 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3 style="color: #1d4ed8; font-size: 16px; margin: 0 0 12px;">📋 Submission Summary</h3>
        <p style="margin: 4px 0;"><strong>Reference ID:</strong> #{{ $submission->id }}</p>
        <p style="margin: 4px 0;"><strong>Inquiry Type:</strong> {{ $submission->formatted_inquiry_type }}</p>
        <p style="margin: 4px 0;"><strong>Subject:</strong> {{ $submission->subject }}</p>
        <p style="margin: 4px 0;"><strong>Submitted:</strong> {{ $submission->created_at->format('M j, Y \a\t g:i A') }}</p>
        @if($submission->business_name)
        <p style="margin: 4px 0;"><strong>Business:</strong> {{ $submission->business_name }}</p>
        @endif
      </div>

      <!-- Next Steps -->
      <div style="background-color: #ecfdf5; padding: 18px 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3 style="color: #059669; font-size: 16px; margin: 0 0 12px;">✅ What Happens Next?</h3>
        <p><strong>Expected Response:</strong>
          <span style="color: #2563eb; font-weight: bold;">
            @if($submission->inquiry_type === 'support')
              Within 4 hours
            @elseif($submission->inquiry_type === 'sales')
              Within 2 hours
            @else
              Within 24 hours
            @endif
          </span>
        </p>
        <ul style="padding-left: 20px; margin: 12px 0 0; color: #065f46;">
          <li>We’ll review your inquiry in detail</li>
          <li>A team member will respond to you directly</li>
          @if($submission->inquiry_type === 'sales')
          <li>Expect special offers or demos tailored to you</li>
          @endif
        </ul>
      </div>

      <!-- Help Info -->
      <div style="background-color: #fff7ed; padding: 28px 20px; border-radius: 12px; margin-top: 30px; font-family: 'Helvetica Neue', sans-serif; text-align: center;">
        <h3 style="color: #b45309; font-size: 18px; margin-bottom: 10px;">🆘 Need Help Fast?</h3>
        <p style="font-size: 14px; color: #7c2d12; margin-bottom: 25px;">We’re here for you. Contact us directly using any of the options below:</p>
        
            <table role="presentation" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 100%; margin: auto;">
                <tr>
                <td style="padding: 15px; text-align: center;">
                    <div style="font-size: 22px; margin-bottom: 8px;">📞</div>
                    <div style="font-weight: 600; font-size: 14px; color: #1f2937;">+44 1283 515606</div>
                    <div style="font-size: 12px; color: #6b7280;">Mon–Fri, 9AM–6PM GMT</div>
                </td>
                <td style="padding: 15px; text-align: center;">
                    <div style="font-size: 22px; margin-bottom: 8px;">📧</div>
                    <div style="font-weight: 600; font-size: 14px; color: #1f2937;">info@reviewbooster.com</div>
                    <div style="font-size: 12px; color: #6b7280;">24/7 Email Support</div>
                </td>
                {{-- <td style="padding: 15px; text-align: center;">
                    <div style="font-size: 22px; margin-bottom: 8px;">💬</div>
                    <div style="font-weight: 600; font-size: 14px; color: #1f2937;">Live Chat</div>
                    <div style="font-size: 12px; color: #6b7280;">Via our website</div>
                </td> --}}
                </tr>
            </table>
        </div>

    </div>

    <!-- Footer -->
    <div style="background-color: #f3f4f6; text-align: center; padding: 20px; font-size: 13px; color: #6b7280;">
      <p style="margin: 5px 0;"><strong>ReviewBoost</strong> — Boosting Google reviews since 2020</p>
      <p style="margin: 5px 0;">
        <a href="https://www.reviewbooster.com" style="color: #2563eb; text-decoration: none;">www.reviewbooster.com</a> |
        <a href="mailto:info@reviewbooster.com" style="color: #2563eb; text-decoration: none;">info@reviewbooster.com</a>
      </p>
      <p style="font-size: 12px; margin-top: 10px; color: #9ca3af;">
        This is an automated confirmation email. Please do not reply to this address.
      </p>
    </div>

  </div>
</body>
</html>
