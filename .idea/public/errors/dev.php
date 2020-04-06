<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>

<h1>An error occurred | Произошла ошибка</h1>
<p><b>Error Code | Код ошибки:</b> <?= $responce ?></p>
<p><b>Error Message | Текст ошибки:</b> <?= $errstr ?></p>
<p><b>The file in which the error occurred | Файл, в котором произошла ошибка:</b> <?= $errfile ?></p>
<p><b>The line in which the error occurred | Строка, в которой произошла ошибка:</b> <?= $errline ?></p>

</body>
</html>