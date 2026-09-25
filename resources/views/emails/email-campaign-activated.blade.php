<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LASO | Твоята рекламна кампания е активна</title>

    <style>
        @media only screen and (max-width: 620px) {
            .email-container {
                width: 100% !important;
            }

            .email-wrapper {
                padding: 20px 12px !important;
            }

            .email-content {
                padding: 30px 20px !important;
            }

            .email-header {
                padding: 25px 20px !important;
            }

            .email-footer {
                padding: 25px 20px !important;
            }

            .email-title {
                font-size: 27px !important;
                line-height: 35px !important;
            }

            .email-subtitle {
                font-size: 16px !important;
                line-height: 26px !important;
            }

            .logo {
                width: 150px !important;
                height: auto !important;
            }

            .button {
                display: block !important;
                width: auto !important;
                text-align: center !important;
                padding: 15px 20px !important;
            }
        }
    </style>
</head>

<body style="
    margin: 0;
    padding: 0;
    width: 100%;
    background-color: #f7f7f9;
    font-family: Arial, Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
">

    <table width="100%"
        border="0"
        cellspacing="0"
        cellpadding="0"
        role="presentation"
        style="
            width: 100%;
            background-color: #f7f7f9;
        ">

        <tr>
            <td align="center"
                class="email-wrapper"
                style="
                    padding: 45px 20px;
                ">

                <table width="600"
                    border="0"
                    cellspacing="0"
                    cellpadding="0"
                    role="presentation"
                    class="email-container"
                    style="
                        width: 600px;
                        max-width: 600px;
                        background-color: #ffffff;
                        border-radius: 30px;
                        overflow: hidden;
                        box-shadow: 0 8px 30px rgba(18, 31, 84, 0.08);
                    ">

                    {{-- HEADER --}}
                    <tr>
                        <td align="center"
                            class="email-header"
                            style="
                                padding: 32px 40px 25px 40px;
                                background-color: #ffffff;
                            ">

                            <img
                                class="logo"
                                style="
                                    display: block;
                                    height: 130px !important;
                                    width: auto;
                                    max-width: 100%;
                                    border: 0;
                                "
                                src="{{ asset('assets/img/Logo_Laso_Color-01.jpg') }}"
                                alt="LASO Logo">

                        </td>
                    </tr>

                    {{-- GRADIENT LINE --}}
                    <tr>
                        <td style="
                            height: 5px;
                            font-size: 0;
                            line-height: 0;
                            background-color: #ef326f;
                            background-image: linear-gradient(90deg, #ef326f, #fe6c4e);
                        ">
                            &nbsp;
                        </td>
                    </tr>

                    {{-- CONTENT --}}
                    <tr>
                        <td class="email-content"
                            style="
                                padding: 45px 45px 40px 45px;
                            ">

                            {{-- BADGE --}}
                            <table border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="margin-bottom: 20px;">

                                <tr>
                                    <td style="
                                        background-color: #f0fbf5;
                                        color: #32c072;
                                        padding: 8px 16px;
                                        border-radius: 30px;
                                        font-size: 12px;
                                        font-weight: 700;
                                        letter-spacing: 1px;
                                        text-transform: uppercase;
                                    ">
                                        Кампанията е активна
                                    </td>
                                </tr>

                            </table>

                            {{-- TITLE --}}
                            <h1
                                class="email-title"
                                style="
                                    margin: 0 0 18px 0;
                                    padding: 0;
                                    color: #121f54;
                                    font-size: 32px;
                                    line-height: 41px;
                                    font-weight: 800;
                                ">
                                Рекламата ти вече е активна! 🚀
                            </h1>

                            {{-- GREETING --}}
                            <p
                                class="email-subtitle"
                                style="
                                    margin: 0 0 20px 0;
                                    color: #555555;
                                    font-size: 17px;
                                    line-height: 28px;
                                ">
                                Здравей,
                                <strong style="color: #121f54;">
                                    {{ $user->name }}
                                </strong>!
                            </p>

                            {{-- MESSAGE --}}
                            <p style="
                                margin: 0 0 18px 0;
                                color: #555555;
                                font-size: 16px;
                                line-height: 27px;
                            ">
                                Имаме страхотна новина — твоята рекламна кампания
                                беше подготвена и вече е
                                <strong style="color: #32c072;">
                                    активна.
                                </strong>
                            </p>

                            <p style="
                                margin: 0 0 30px 0;
                                color: #555555;
                                font-size: 16px;
                                line-height: 27px;
                            ">
                                Можеш да влезеш в своя LASO профил, за да видиш
                                активните си рекламни кампании и техния статус.
                            </p>

                            {{-- SUCCESS BOX --}}
                            <table width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    margin-bottom: 35px;
                                    background-color: #f0fbf5;
                                    border-radius: 18px;
                                ">

                                <tr>
                                    <td style="
                                        padding: 22px;
                                    ">

                                        <table width="100%"
                                            border="0"
                                            cellspacing="0"
                                            cellpadding="0"
                                            role="presentation">

                                            <tr>
                                                <td
                                                    width="45"
                                                    valign="middle"
                                                    style="
                                                        width: 45px;
                                                        color: #32c072;
                                                        font-size: 25px;
                                                        font-weight: 700;
                                                    ">
                                                    ✓
                                                </td>

                                                <td valign="middle">

                                                    <p style="
                                                        margin: 0 0 4px 0;
                                                        color: #121f54;
                                                        font-size: 15px;
                                                        line-height: 22px;
                                                        font-weight: 700;
                                                    ">
                                                        Рекламната кампания е активна
                                                    </p>

                                                    <p style="
                                                        margin: 0;
                                                        color: #32c072;
                                                        font-size: 14px;
                                                        line-height: 21px;
                                                        font-weight: 700;
                                                    ">
                                                        Успешно стартирана
                                                    </p>

                                                </td>
                                            </tr>

                                        </table>

                                    </td>
                                </tr>

                            </table>

                            {{-- NEXT STEP --}}
                            <h2 style="
                                margin: 0 0 15px 0;
                                color: #121f54;
                                font-size: 21px;
                                line-height: 29px;
                                font-weight: 800;
                            ">
                                Какво следва?
                            </h2>

                            <p style="
                                margin: 0 0 30px 0;
                                color: #555555;
                                font-size: 15px;
                                line-height: 26px;
                            ">
                                Влез в своя профил в LASO, където можеш да следиш
                                рекламните си кампании и да виждаш кои от тях са активни.
                            </p>

                            {{-- CTA --}}
                            <table border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                align="center"
                                style="
                                    margin: 0 auto 35px auto;
                                ">

                                <tr>
                                    <td
                                        align="center"
                                        style="
                                            border-radius: 40px;
                                            background-color: #ef326f;
                                            background-image: linear-gradient(90deg, #ef326f, #fe6c4e);
                                        ">

                                        <a href="{{ url('/') }}"
                                            class="button"
                                            style="
                                                display: inline-block;
                                                padding: 16px 34px;
                                                color: #ffffff;
                                                font-size: 16px;
                                                line-height: 20px;
                                                font-weight: 700;
                                                text-decoration: none;
                                                border-radius: 40px;
                                            ">
                                            Влез в LASO
                                        </a>

                                    </td>
                                </tr>

                            </table>

                            {{-- INFO BOX --}}
                            <table width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    background-color: #fff8f1;
                                    border-radius: 18px;
                                ">

                                <tr>
                                    <td
                                        align="center"
                                        style="
                                            padding: 22px;
                                            color: #666666;
                                            font-size: 14px;
                                            line-height: 23px;
                                        ">

                                        Имаш въпрос относно рекламната си кампания?

                                        <br>

                                        Екипът на LASO е насреща, за да ти помогне.

                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td
                            class="email-footer"
                            align="center"
                            style="
                                padding: 30px 40px;
                                background-color: #121f54;
                            ">

                            <p style="
                                margin: 0 0 8px 0;
                                color: #ffffff;
                                font-size: 14px;
                                line-height: 22px;
                                font-weight: 700;
                            ">
                                LASO
                            </p>

                            <p style="
                                margin: 0 0 15px 0;
                                color: #bfc5d9;
                                font-size: 13px;
                                line-height: 21px;
                            ">
                                Рекламата на твоя бизнес. По-лесно.
                            </p>

                            <p style="
                                margin: 0;
                                color: #8991ac;
                                font-size: 12px;
                                line-height: 20px;
                            ">
                                &copy; {{ date('Y') }} LASO. Всички права запазени.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>
