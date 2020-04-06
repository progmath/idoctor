<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <base href="/">
    <style type="text/css">
        .wrap {
            width: 100%;
            position: relative;
        }

        .wrap > img {
            width: 100%;
            height: 97vh;
        }

        .wrap p {
            position: absolute;
            top: 5%;
            left: 2%;
            right: 0;
        }

        .wrap p > a {
            font-size: 1.5vw;
            background: #2e70ba;
            font-family: "Montserratarm";
            text-decoration: none;
            color: #FFF;
            padding: 1% 2%;
            border-radius: 25px 25px;
        }

        .wrap p > a:hover {
            color: #ccc;
        }

        @media all and (max-width: 768px) {
            .wrap p > a {
                font-size: 3vw;
            }

        }
    </style>
</head>
<body>
<div class="wrap">
    <p><a href="<?= PATH; ?>">Go back to Home</a></p>
    <img src="/errors/images/404.png" alt="NO IMAGE"/>
</div>
</body>
</html>
