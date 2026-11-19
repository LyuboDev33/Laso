
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Нови запитвания в LASO</title>

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
        style="width: 100%; background-color: #f7f7f9;">

        <tr>
            <td align="center"
                class="email-wrapper"
                style="padding: 45px 20px;">

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
                                src="{{ asset('assets/img/laso-new.png') }}"
                                alt="LASO Logo"
                                style="
                                    display: block;
                                    width: auto;
                                    max-width: 100%;
                                    border: 0;
                                ">

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
                            style="padding: 45px 45px 40px 45px;">

                            {{-- BADGE --}}
                            <table border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="margin-bottom: 20px;">

                                <tr>
                                    <td style="
                                        background-color: #fdeaf0;
                                        color: #ef326f;
                                        padding: 8px 16px;
                                        border-radius: 30px;
                                        font-size: 12px;
                                        font-weight: 700;
                                        letter-spacing: 1px;
                                        text-transform: uppercase;
                                    ">
                                        НОВИ ЗАПИТВАНИЯ
                                    </td>
                                </tr>
                            </table>

                            {{-- TITLE --}}
                            <h1 class="email-title"
                                style="
                                    margin: 0 0 18px 0;
                                    color: #121f54;
                                    font-size: 32px;
                                    line-height: 41px;
                                    font-weight: 800;
                                ">
                                Здравей, {{ $user->name }}! 👋
                            </h1>

                            {{-- INTRO --}}
                            <p class="email-subtitle"
                                style="
                                    margin: 0 0 20px 0;
                                    color: #555555;
                                    font-size: 17px;
                                    line-height: 28px;
                                ">
                                Имаме добри новини за теб!
                                В твоя <strong style="color: #121f54;">LASO</strong>
                                профил има нови запитвания от потенциални клиенти.
                            </p>

                            <p style="
                                margin: 0 0 30px 0;
                                color: #555555;
                                font-size: 16px;
                                line-height: 27px;
                            ">
                                Хора са проявили интерес към твоите услуги
                                чрез рекламните кампании. Време е да разгледаш
                                запитванията и да се свържеш с тях.
                            </p>

                            {{-- LEADS COUNT --}}
                            <table width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    margin-bottom: 35px;
                                    background-color: #fdeaf0;
                                    border-radius: 18px;
                                ">

                                <tr>
                                    <td align="center"
                                        style="padding: 30px 22px;">

                                        <p style="
                                            margin: 0 0 8px 0;
                                            color: #ef326f;
                                            font-size: 46px;
                                            line-height: 55px;
                                            font-weight: 800;
                                        ">
                                            {{ $leadsCount }}
                                        </p>

                                        <p style="
                                            margin: 0;
                                            color: #121f54;
                                            font-size: 17px;
                                            line-height: 26px;
                                            font-weight: 700;
                                        ">
                                            Нови запитвания от потенциални клиенти
                                        </p>

                                        <p style="
                                            margin: 8px 0 0 0;
                                            color: #777777;
                                            font-size: 14px;
                                            line-height: 22px;
                                        ">
                                            Очакват те в твоя LASO профил
                                        </p>

                                    </td>
                                </tr>
                            </table>

                            {{-- NEXT STEPS --}}
                            <h2 style="
                                margin: 0 0 20px 0;
                                color: #121f54;
                                font-size: 22px;
                                line-height: 30px;
                                font-weight: 800;
                            ">
                                Какво да направиш сега?
                            </h2>

                            <p style="
                                margin: 0 0 16px 0;
                                color: #555555;
                                font-size: 15px;
                                line-height: 26px;
                            ">
                                <strong style="color: #121f54;">1.</strong>
                                Влез в своя LASO профил и разгледай новите запитвания.
                            </p>

                            <p style="
                                margin: 0 0 16px 0;
                                color: #555555;
                                font-size: 15px;
                                line-height: 26px;
                            ">
                                <strong style="color: #121f54;">2.</strong>
                                Прегледай предоставената информация от потенциалните клиенти.
                            </p>

                            <p style="
                                margin: 0 0 35px 0;
                                color: #555555;
                                font-size: 15px;
                                line-height: 26px;
                            ">
                                <strong style="color: #121f54;">3.</strong>
                                Свържи се с тях възможно най-скоро.
                            </p>

                            {{-- CTA --}}
                            <table border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                align="center"
                                style="margin: 0 auto 35px auto;">

                                <tr>
                                    <td align="center"
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
                                            Виж новите запитвания
                                        </a>

                                    </td>
                                </tr>
                            </table>

                            {{-- REMINDER --}}
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
                                    <td style="
                                        padding: 22px;
                                        color: #666666;
                                        font-size: 14px;
                                        line-height: 24px;
                                    ">

                                        <strong style="color: #121f54;">
                                            Малък съвет от LASO
                                        </strong>

                                        <p style="margin: 8px 0 0 0;">
                                            Колкото по-бързо се свържеш с човек,
                                            който е проявил интерес към услугите ти,
                                            толкова по-голям е шансът да започнете разговор.
                                        </p>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td align="center"
                            class="email-footer"
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
                                &copy; {{ date('Y') }} LASO.
                                Всички права запазени.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
