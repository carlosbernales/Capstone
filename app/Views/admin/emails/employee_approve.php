<!DOCTYPE html>
<html lang="en">

<head>
    <title>pixels</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Objektiv+Mk1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: objektiv mk1;
            src: url(fonts.ttf);
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <div style="width: 600px; margin: auto; overflow: hidden; border: 1px solid #E5E5E5; background-repeat: no-repeat; background-position: 0px 91px;">
        <table width="600px" cellspacing="0" cellpadding="0" style="position: relative; border: none;">
            <tbody>
                <td>
            <table width="100%">
                <tr style="text-align: center; width: 100%;">
                    <td style="text-align: center;">
                        <p style="font-weight: bold; color: #99CC33; font-size: 35px;">BITUIN FLOWER SHOP</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                    </td>
                </tr>
            </table>
        </td>
    </tbody>
</table>
</div>

<tr>
    <td style="background: #fff; font-size: 25px; padding: 0 26px;">
        <p style="text-align: left; font-weight: bold; color: #000;">
            Hello <?= $firstname ?>,
        </p>
        <p style="text-align: justify;">
            Hello! Your employee account for Bituin Flower Shop has been approved by the administrator. You now have access to all the features of the system as an employee!
        </p>
    </td>
</tr>






        <tr>
            <td style="padding: 26px; background-image: url(https://i.postimg.cc/RZfQd50z/1-Transactional-xxx-Order-xxx-svg-1.png); background-repeat: no-repeat; background-position: 100% 350px; width: 100%;">
                <table width="100%;">
                    <tr>
                        <td style="border-bottom: 1.5px solid #969696; opacity: 0.25;"></td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <p style="font-weight: 600; margin: 0; font-size: 16px;">Account Details:</p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $firstname ?> <?= $lastname ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $user_email ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;">Tel. <?= $phone ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $address ?></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1.5px solid #969696; opacity: 0.25;"></td>
                    </tr>
                </table>
            </td>
        </tr>

                                            
        <tr>
            <td style="padding: 25px;">
                <table width="100%" style="border-radius: 5px; border: 1px solid #000; padding: 13px 25px;">
                    <tr>
                        <td style="font-size: 20px; font-weight: 600;">Stalk us on our socials 👀</td>
                        <td style="text-align: right;">
                            <table width="100%;">
                                <tr>
                                     <td style="text-align: center;"><a href="https://www.facebook.com/profile.php?id=100088678795529"
                                            style="line-height: 0; display: block;"><img
                                                src="https://i.postimg.cc/HnPDpXZQ/xxx.png"></a></td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</body>

</html>
