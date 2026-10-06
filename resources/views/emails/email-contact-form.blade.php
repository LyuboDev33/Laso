<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >

    <title>Ново запитване | LASO</title>

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

            .contact-label {
                width: 100% !important;
                display: block !important;
                padding-bottom: 5px !important;
            }

            .contact-value {
                width: 100% !important;
                display: block !important;
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

    <table
        width="100%"
        border="0"
        cellspacing="0"
        cellpadding="0"
        role="presentation"
        style="
            width: 100%;
            background-color: #f7f7f9;
        "
    >

        <tr>

            <td
                align="center"
                class="email-wrapper"
                style="
                    padding: 45px 20px;
                "
            >

                <table
                    width="600"
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
                    "
                >


                    {{-- HEADER --}}
                    <tr>

                        <td
                            align="center"
                            class="email-header"
                            style="
                                padding: 32px 40px 25px 40px;
                                background-color: #ffffff;
                            "
                        >

                            <img
                                class="logo"
                                style="
                                    display: block;

                                    width: auto;
                                    max-width: 100%;
                                    border: 0;
                                "
                                src="{{ asset('assets/img/laso-new.png') }}"
                                alt="LASO Logo"
                            >

                        </td>

                    </tr>


                    {{-- GRADIENT LINE --}}
                    <tr>

                        <td
                            style="
                                height: 5px;
                                font-size: 0;
                                line-height: 0;
                                background-color: #ef326f;
                                background-image: linear-gradient(90deg, #ef326f, #fe6c4e);
                            "
                        >
                            &nbsp;
                        </td>

                    </tr>


                    {{-- CONTENT --}}
                    <tr>

                        <td
                            class="email-content"
                            style="
                                padding: 45px 45px 40px 45px;
                            "
                        >


                            {{-- BADGE --}}
                            <table
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    margin-bottom: 20px;
                                "
                            >

                                <tr>

                                    <td
                                        style="
                                            background-color: #fdeaf0;
                                            color: #ef326f;
                                            padding: 8px 16px;
                                            border-radius: 30px;
                                            font-size: 12px;
                                            font-weight: 700;
                                            letter-spacing: 1px;
                                            text-transform: uppercase;
                                        "
                                    >
                                        НОВО ЗАПИТВАНЕ
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
                                "
                            >
                                Имате ново съобщение
                            </h1>


                            {{-- INTRO --}}
                            <p
                                class="email-subtitle"
                                style="
                                    margin: 0 0 30px 0;
                                    color: #555555;
                                    font-size: 17px;
                                    line-height: 28px;
                                "
                            >
                                Получихте ново запитване чрез контактната форма на
                                <strong style="color: #121f54;">
                                    LASO
                                </strong>.
                            </p>


                            {{-- CONTACT DETAILS --}}
                            <table
                                width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    margin-bottom: 25px;
                                    background-color: #f8f8fa;
                                    border-radius: 18px;
                                "
                            >

                                <tr>

                                    <td
                                        style="
                                            padding: 25px;
                                        "
                                    >

                                        <p
                                            style="
                                                margin: 0 0 20px 0;
                                                color: #121f54;
                                                font-size: 18px;
                                                line-height: 26px;
                                                font-weight: 800;
                                            "
                                        >
                                            Данни за контакт
                                        </p>


                                        {{-- NAME --}}
                                        <table
                                            width="100%"
                                            border="0"
                                            cellspacing="0"
                                            cellpadding="0"
                                            role="presentation"
                                            style="
                                                width: 100%;
                                                border-bottom: 1px solid #e8e8ed;
                                            "
                                        >

                                            <tr>

                                                <td
                                                    width="120"
                                                    valign="top"
                                                    class="contact-label"
                                                    style="
                                                        width: 120px;
                                                        padding: 13px 15px 13px 0;
                                                        color: #8991ac;
                                                        font-size: 13px;
                                                        line-height: 21px;
                                                        font-weight: 700;
                                                        text-transform: uppercase;
                                                    "
                                                >
                                                    Име
                                                </td>

                                                <td
                                                    valign="top"
                                                    class="contact-value"
                                                    style="
                                                        padding: 13px 0;
                                                        color: #121f54;
                                                        font-size: 15px;
                                                        line-height: 23px;
                                                        font-weight: 700;
                                                    "
                                                >
                                                    {{ $contact['name'] }}
                                                </td>

                                            </tr>

                                        </table>


                                        {{-- EMAIL --}}
                                        <table
                                            width="100%"
                                            border="0"
                                            cellspacing="0"
                                            cellpadding="0"
                                            role="presentation"
                                            style="
                                                width: 100%;
                                                border-bottom: 1px solid #e8e8ed;
                                            "
                                        >

                                            <tr>

                                                <td
                                                    width="120"
                                                    valign="top"
                                                    class="contact-label"
                                                    style="
                                                        width: 120px;
                                                        padding: 13px 15px 13px 0;
                                                        color: #8991ac;
                                                        font-size: 13px;
                                                        line-height: 21px;
                                                        font-weight: 700;
                                                        text-transform: uppercase;
                                                    "
                                                >
                                                    Имейл
                                                </td>

                                                <td
                                                    valign="top"
                                                    class="contact-value"
                                                    style="
                                                        padding: 13px 0;
                                                        color: #121f54;
                                                        font-size: 15px;
                                                        line-height: 23px;
                                                        font-weight: 700;
                                                    "
                                                >

                                                    <a
                                                        href="mailto:{{ $contact['email'] }}"
                                                        style="
                                                            color: #ef326f;
                                                            text-decoration: none;
                                                        "
                                                    >
                                                        {{ $contact['email'] }}
                                                    </a>

                                                </td>

                                            </tr>

                                        </table>


                                        {{-- PHONE --}}
                                        <table
                                            width="100%"
                                            border="0"
                                            cellspacing="0"
                                            cellpadding="0"
                                            role="presentation"
                                            style="
                                                width: 100%;
                                            "
                                        >

                                            <tr>

                                                <td
                                                    width="120"
                                                    valign="top"
                                                    class="contact-label"
                                                    style="
                                                        width: 120px;
                                                        padding: 13px 15px 0 0;
                                                        color: #8991ac;
                                                        font-size: 13px;
                                                        line-height: 21px;
                                                        font-weight: 700;
                                                        text-transform: uppercase;
                                                    "
                                                >
                                                    Телефон
                                                </td>

                                                <td
                                                    valign="top"
                                                    class="contact-value"
                                                    style="
                                                        padding: 13px 0 0 0;
                                                        color: #121f54;
                                                        font-size: 15px;
                                                        line-height: 23px;
                                                        font-weight: 700;
                                                    "
                                                >

                                                    <a
                                                        href="tel:{{ $contact['phone'] }}"
                                                        style="
                                                            color: #121f54;
                                                            text-decoration: none;
                                                        "
                                                    >
                                                        {{ $contact['phone'] }}
                                                    </a>

                                                </td>

                                            </tr>

                                        </table>

                                    </td>

                                </tr>

                            </table>


                            {{-- MESSAGE --}}
                            <table
                                width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    margin-bottom: 30px;
                                    background-color: #fff8f1;
                                    border-radius: 18px;
                                "
                            >

                                <tr>

                                    <td
                                        style="
                                            padding: 25px;
                                        "
                                    >

                                        <p
                                            style="
                                                margin: 0 0 15px 0;
                                                color: #121f54;
                                                font-size: 18px;
                                                line-height: 26px;
                                                font-weight: 800;
                                            "
                                        >
                                            Съобщение
                                        </p>

                                        <p
                                            style="
                                                margin: 0;
                                                color: #555555;
                                                font-size: 15px;
                                                line-height: 26px;
                                                white-space: pre-line;
                                            "
                                        >{{ $contact['message'] }}</p>

                                    </td>

                                </tr>

                            </table>


                            {{-- REPLY BUTTON --}}
                            <table
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                align="center"
                                style="
                                    margin: 0 auto;
                                "
                            >



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
                            "
                        >

                            <p
                                style="
                                    margin: 0 0 8px 0;
                                    color: #ffffff;
                                    font-size: 14px;
                                    line-height: 22px;
                                    font-weight: 700;
                                "
                            >
                                LASO
                            </p>

                            <p
                                style="
                                    margin: 0 0 15px 0;
                                    color: #bfc5d9;
                                    font-size: 13px;
                                    line-height: 21px;
                                "
                            >
                                Рекламата на твоя бизнес. По-лесно.
                            </p>

                            <p
                                style="
                                    margin: 0;
                                    color: #8991ac;
                                    font-size: 12px;
                                    line-height: 20px;
                                "
                            >
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
