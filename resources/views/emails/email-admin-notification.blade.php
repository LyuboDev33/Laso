<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LASO | Нов закупен абонамент</title>

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
                font-size: 26px !important;
                line-height: 34px !important;
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

            .user-label {
                width: 110px !important;
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
                                alt="Laso Logo">

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
                                        background-color: #fdeaf0;
                                        color: #ef326f;
                                        padding: 8px 16px;
                                        border-radius: 30px;
                                        font-size: 12px;
                                        font-weight: 700;
                                        letter-spacing: 1px;
                                        text-transform: uppercase;
                                    ">
                                        Нов абонамент
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
                                    font-size: 30px;
                                    line-height: 39px;
                                    font-weight: 800;
                                ">
                                Нов закупен абонамент
                            </h1>

                            {{-- MESSAGE --}}
                            <p style="
                                margin: 0 0 30px 0;
                                color: #555555;
                                font-size: 17px;
                                line-height: 28px;
                            ">
                                Потребител
                                <strong style="color: #121f54;">
                                    {{ $user->name }}
                                </strong>
                                си закупи абонамент.
                            </p>

                            {{-- USER INFORMATION TITLE --}}
                            <h2 style="
                                margin: 0 0 16px 0;
                                color: #121f54;
                                font-size: 20px;
                                line-height: 28px;
                                font-weight: 800;
                            ">
                                Информация за потребителя
                            </h2>

                            {{-- USER INFORMATION TABLE --}}
                            <table width="100%"
                                border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                style="
                                    width: 100%;
                                    border: 1px solid #eeeeee;
                                    border-radius: 18px;
                                    overflow: hidden;
                                    margin-bottom: 30px;
                                ">

                                {{-- ID --}}
                                <tr>
                                    <td
                                        class="user-label"
                                        width="150"
                                        style="
                                            padding: 15px 18px;
                                            background-color: #f8f8fa;
                                            border-bottom: 1px solid #eeeeee;
                                            color: #777777;
                                            font-size: 14px;
                                            font-weight: 700;
                                        ">
                                        ID
                                    </td>

                                    <td style="
                                        padding: 15px 18px;
                                        border-bottom: 1px solid #eeeeee;
                                        color: #121f54;
                                        font-size: 14px;
                                        font-weight: 700;
                                    ">
                                        <a href="{{ url("/admin/users/{$user->id}") }}">
                                            #{{ $user->id }} - Link
                                        </a>
                                    </td>
                                </tr>

                                {{-- NAME --}}
                                <tr>
                                    <td
                                        class="user-label"
                                        width="150"
                                        style="
                                            padding: 15px 18px;
                                            background-color: #f8f8fa;
                                            border-bottom: 1px solid #eeeeee;
                                            color: #777777;
                                            font-size: 14px;
                                            font-weight: 700;
                                        ">
                                        Име
                                    </td>

                                    <td style="
                                        padding: 15px 18px;
                                        border-bottom: 1px solid #eeeeee;
                                        color: #121f54;
                                        font-size: 14px;
                                        font-weight: 700;
                                    ">
                                        {{ $user->name }}
                                    </td>
                                </tr>

                                {{-- EMAIL --}}
                                <tr>
                                    <td
                                        class="user-label"
                                        width="150"
                                        style="
                                            padding: 15px 18px;
                                            background-color: #f8f8fa;
                                            border-bottom: 1px solid #eeeeee;
                                            color: #777777;
                                            font-size: 14px;
                                            font-weight: 700;
                                        ">
                                        Имейл
                                    </td>

                                    <td style="
                                        padding: 15px 18px;
                                        border-bottom: 1px solid #eeeeee;
                                        color: #121f54;
                                        font-size: 14px;
                                        font-weight: 700;
                                    ">

                                        <a href="mailto:{{ $user->email }}"
                                            style="
                                                color: #ef326f;
                                                text-decoration: none;
                                            ">
                                            {{ $user->email }}
                                        </a>

                                    </td>
                                </tr>

                                {{-- FACEBOOK PAGE --}}
                                <tr>
                                    <td
                                        class="user-label"
                                        width="150"
                                        style="
                                            padding: 15px 18px;
                                            background-color: #f8f8fa;
                                            color: #777777;
                                            font-size: 14px;
                                            font-weight: 700;
                                        ">
                                        Facebook
                                    </td>

                                    <td style="
                                        padding: 15px 18px;
                                        color: #121f54;
                                        font-size: 14px;
                                        font-weight: 700;
                                        word-break: break-word;
                                    ">

                                        @if ($user->facebook_page)
                                            <a href="{{ $user->facebook_page }}"
                                                target="_blank"
                                                style="
                                                    color: #ef326f;
                                                    text-decoration: none;
                                                ">
                                                {{ $user->facebook_page }}
                                            </a>
                                        @else
                                            Не е добавена
                                        @endif

                                    </td>
                                </tr>

                            </table>

                            {{-- BUTTON --}}
                            <table border="0"
                                cellspacing="0"
                                cellpadding="0"
                                role="presentation"
                                align="center"
                                style="
                                    margin: 0 auto 30px auto;
                                ">

                                <tr>
                                    <td
                                        align="center"
                                        style="
                                            border-radius: 40px;
                                            background-color: #ef326f;
                                            background-image: linear-gradient(90deg, #ef326f, #fe6c4e);
                                        ">

                                        <a href="{{ url('/admin/users/' . $user->id) }}"
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
                                            Виж потребителя
                                        </a>

                                    </td>
                                </tr>

                            </table>

                            {{-- INFORMATION --}}
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
                                        padding: 20px;
                                        color: #666666;
                                        font-size: 14px;
                                        line-height: 23px;
                                        text-align: center;
                                    ">
                                        Това е автоматично известие от LASO за успешно
                                        закупен абонамент.
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
                                Административно известие
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
