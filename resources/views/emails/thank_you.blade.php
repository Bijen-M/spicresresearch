<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Email</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        <style type="text/css">
          td.content{
            background: #fff;
          }
        </style>

    </head>
    <body style="margin:0; padding:0;" bgcolor="#fff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
            <tbody>
                <tr>
                    <td align="center" valign="top" bgcolor="#fff" style="background-color: #fff;">

                        <br>

                        <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:500px;max-width:500px;background: #eee;padding: 15px;">
                            <tbody>
                                <tr>
                                    <td style="padding:0 0 7px; text-align: center;">
                                        <img alt="" class="" src="{{ asset('home/images/logo-email.png') }}" alt="title">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content" align="left" style="padding-top:12px;padding-bottom:12px;background-color:#ffffff;border-bottom:;">

                                        <table width="600" border="0" cellpadding="0" cellspacing="0" class="force-row" style="width: 500px;">
                                            <tbody>
                                                <tr>
                                                    <td class="cols-wrapper" style="padding-left:12px;padding-right:12px">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 500px;">
                                                            <tbody><tr>
                                                                    <td class="col" valign="top" style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:20px">


                                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="col-copy" style="font-family:Nunito Sans, sans-serif;font-size:18px;line-height:25px;text-align:left;color:#222;font-weight:700;">Hello!</div>

                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="col-copy" style="font-family:Nunito Sans, sans-serif;font-size:15px;line-height:22px;text-align:left;color:#666;">
                                                                                            {!! $msg !!}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        @if(isset($settings))
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" class="force-row" style="width: 600px;">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="margin-top: 30px;display: block;">
                                                        @if($settings->facebook)
                                                        <div class="socialIcons" style="display: inline-block;min-width: 30px;">
                                                            <a href="{{ $settings->facebook }}">
                                                                <img src="{{ asset('home/images/facebook.png') }}" alt="title" style="height: 30px;width: 30px;">
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @if($settings->twitter)
                                                        <div class="socialIcons" style="display: inline-block;min-width: 30px;">
                                                            <a href="{{ $settings->twitter }}">
                                                                <img src="{{ asset('home/images/twitter.png') }}" alt="title" style="height: 30px;width: 30px;">
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @if($settings->google_plus)
                                                        <div class="socialIcons" style="display: inline-block;min-width: 30px;">
                                                            <a href="{{ $settings->google_plus }}">
                                                                <img src="{{ asset('home/images/google.png') }}" alt="title" style="height: 30px;width: 30px;">
                                                            </a>
                                                        </div>
                                                        @endif



                                                    </td>


                                                </tr>

                                                <tr>
                                                    <td align="center" style="margin-top: 15px;display: block;">
                                                        <p style="font-family:Nunito Sans, sans-serif;color: #2b2a2a;font-size: 12px;margin: 0;">© {{ $settings->website_name }} All Right Reserved {{ date('Y') }}.</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" style="margin-top: 4px;display: block;">
                                                        <p style="font-family:Nunito Sans, sans-serif;color: #2b2a2a;font-size: 12px;margin: 0;">{{ $settings->address }}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" style="margin-top: 10px;display: block;">
                                                        <p style="font-family:Nunito Sans, sans-serif;color: #2b2a2a;font-size: 12px;margin: 0;">You've received this email If you have any enquiries, please do not hesitate to contact us. Thank You!</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>