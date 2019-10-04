<?php
$BEGIN_MS = microtime(true);
$CORRECT = true;
date_default_timezone_set("UTC");
if (array_key_exists("offset", $_GET)) {
    $OFFSET = $_GET["offset"];
} else $OFFSET = 0 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 1</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="head">
        <span id="head-title">
            Лабораторная работа №1. Вариант 214003
        </span>
    <img src="img/vt-logo.png" alt="logo"><br>
    <span id="head-author">
            Выполнил студент группы P3214 Гораш Вячеслав Игоревич
        </span>
</div>
<div class="main">
    <h1>Результат проверки</h1>
        <?php
        if (array_key_exists("X", $_GET) and array_key_exists("Y", $_GET) and array_key_exists("R", $_GET)
            and (float)$_GET["Y"] >= -3 and (float)$_GET["Y"] <= 3 and (float)$_GET["R"] >= 2 and (float)$_GET["R"] <= 5) {
            echo "<table id=\"result-table\">
                <tr><th>Координата X</th><th>Координата Y</th><th>Радиус</th><th>Попадание в область</th></tr>";
            $R = (float)$_GET['R'];
            $Y = (float)$_GET['Y'];
            foreach ($_GET['X'] as $X) {
                if ((string)$X === "-5" or (string)$X === "-4" or (string)$X === "-3" or (string)$X === "-2" or (string)$X === "-1" or
                    (string)$X === "0" or (string)$X === "1" or (string)$X === "2" or (string)$X === "3") {
                    $RES = 'Нет';
                    if ($X >= -$R / 2 and $X <= 0 and $Y >= 0 and $Y <= $R) {
                        $RES = "Да";
                    }
                    if ($X >= 0 and $Y >= 0 and $X + $Y <= $R / 2) {
                        $RES = "Да";
                    }
                    if ($X >= 0 and $Y <= 0 and $X ** 2 + $Y ** 2 <= $R ** 2 / 4) {
                        $RES = "Да";
                    }
                    echo "<tr><td>$X</td><td>$Y</td><td>$R</td><td>$RES</td></tr>";
                } else $CORRECT = false;
            }
            echo "</table>";
            if (!$CORRECT) echo "<h2>Строки с некорректным значением X были удалены</h2>";
        } else echo "<h2>Переданные параметры некорректны</h2>" ?>

    <p>Запрос выполнен <?= date("d.m.Y, G:i:s", $BEGIN_MS - $OFFSET / 60 * 3600) ?>. Время работы
        скрипта: <?php printf("%2.3f", (microtime(true) - $BEGIN_MS) * 1000) ?> миллисекунд</p>
    <a href="index.html">
        <button class="submit-button">Назад</button>
    </a>
</div>
</body>
</html>