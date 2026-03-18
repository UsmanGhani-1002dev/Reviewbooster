<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New User Registered</title>
  <style>
    /* Basic resets */
    body, table, td, a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    body {
      margin: 0;
      padding: 0;
      background-color: #eef2f7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #344054;
    }
    table {
      border-collapse: collapse !important;
    }
    a {
      color: #4f46e5;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    /* Responsive */
    @media only screen and (max-width: 600px) {
      .container {
        width: 95% !important;
      }
      .title {
        font-size: 22px !important;
      }
      .section {
        padding: 15px !important;
        margin: 15px !important;
      }
      .info-label {
        width: 100px !important;
        display: block !important;
        margin-bottom: 5px !important;
      }
      .info-value {
        display: block !important;
      }
    }
  </style>
</head>
<body>
  <table width="100%" bgcolor="#eef2f7" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding: 30px 10px;">
        <table width="600" class="container" cellpadding="0" cellspacing="0" bgcolor="#ffffff" role="presentation" style="border-radius:8px; border:5px solid gainsboro;box-shadow: 0px 0px 9px 0 #b7b7b7;">
          <tr>
            <td align="center" style="padding: 30px 0;">
              <img src="https://codely.quest/reviewbooster/public/images/logo.png" alt="ReviewBooster Logo" width="200" style="display: block; padding: 8px;" />
            </td>
          </tr>

          <tr>
            <td align="center" style="padding: 0px 20px 20px 0px; font-size: 26px; font-weight: 700; color: #1e293b; letter-spacing: 0.02em;">
              🎉 New User Registered
            </td>
          </tr>

         <tr>
          <td style="padding: 25px 30px; background-color: #f9fafb; border-bottom: 1px solid #ddd; font-family: Arial, sans-serif;">
            <table width="100%" role="presentation" style="border-collapse: collapse;">
              <tr>
                <td colspan="2" style="font-size: 22px; font-weight: 700; color: #2563eb; padding-bottom: 18px; line-height: 1.2;">
                  👤 User Info
                </td>
              </tr>
              <tr>
                <td style="font-weight: 700; width: 140px; vertical-align: top; padding-bottom: 12px; color: #334155;">Name:</td>
                <td style="color: #475569; padding-bottom: 12px; font-size: 15px;">{{ $user->name }}</td>
              </tr>
              <tr>
                <td style="font-weight: 700; width: 140px; vertical-align: top; padding-bottom: 12px; color: #334155;">Email:</td>
                <td style="color: #475569; padding-bottom: 12px; font-size: 15px;">
                  <a href="mailto:{{ $user->email }}" style="color: #2563eb; text-decoration: none; word-break: break-word;">{{ $user->email }}</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        
        <tr>
          <td style="padding: 25px 30px; background-color: #e0e7ff; border-bottom: 1px solid #ddd; font-family: Arial, sans-serif;">
            <table width="100%" role="presentation" style="border-collapse: collapse;">
              <tr>
                <td colspan="2" style="font-size: 22px; font-weight: 700; color: #2563eb; padding-bottom: 18px; line-height: 1.2;">
                  💼 Plan Details
                </td>
              </tr>
              <tr>
                <td style="font-weight: 700; width: 140px; vertical-align: top; padding-bottom: 12px; color: #334155;">Plan Name:</td>
                <td style="color: #475569; padding-bottom: 12px; font-size: 15px;">{{ $plan->name }}</td>
              </tr>
              <tr>
                <td style="font-weight: 700; width: 140px; vertical-align: top; padding-bottom: 12px; color: #334155;">Price:</td>
                <td style="color: #475569; padding-bottom: 12px; font-size: 15px;">${{ $plan->price }}</td>
              </tr>
              <tr>
                <td style="font-weight: 700; width: 140px; vertical-align: top; color: #334155;">Duration:</td>
                <td style="color: #475569; font-size: 15px;">{{ $plan->duration_days }} days</td>
              </tr>
            </table>
          </td>
        </tr>


          <tr>
            <td align="center" style="padding: 30px 20px 20px; font-size: 14px; color: #64748b; line-height: 1.5;">
              If you have any questions, feel free to contact our support team.
            </td>
          </tr>

          <tr>
            <td align="center" style="padding-bottom: 30px;">
              <a href="{{ config('app.url') }}/contact" style="color: #4f46e5; font-weight: 600; font-size: 14px; margin: 0 10px; text-decoration: none;">Contact Us</a> |
              <a href="{{ config('app.url') }}/privacy-policy" style="color: #4f46e5; font-weight: 600; font-size: 14px; margin: 0 10px; text-decoration: none;">Privacy Policy</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
