<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LR1</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/web.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Limelight|Poiret+One|Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


</head>

<body style="overflow-y: scroll; overflow-x: hidden">

<script type="text/javascript" src="scripts/validation.js">
</script>

<div class="wrapper">
    <header>

        <div class="header_left">
            <div class="img_fon">
                <img src="images/fon.jpg">
                <div class="header_text">
                    Савушкина Алиса <br>
                    <span class="header_text_font">Группа</span>:Р3200 <br>
                    <span class="header_text_font">Вариант</span>:200017 <br>
                </div>
            </div>
        </div>

        <div class="header_right">
            Web Programming
        </div>

    </header>

    <main>
        <form name="myform" method="GET" class="form" onsubmit="return validateForm()">
            <label>
                <div class="znachenie"><b>Значение X</b></div>
            </label> <br>
            <label><input type="radio" name="x" value="-4" required>-4 </label>
            <label><input type="radio" name="x" value="-3">-3 </label>
            <label><input type="radio" name="x" value="-2">-2 </label>
            <label><input type="radio" name="x" value="-1">-1 </label>
            <label><input type="radio" name="x" value="0">0 </label>
            <label><input type="radio" name="x" value="1">1 </label>
            <label><input type="radio" name="x" value="2">2 </label>
            <label><input type="radio" name="x" value="3">3 </label>
            <label><input type="radio" name="x" value="4">4 </label>
            <p id="error_x_msg"></p>
            <label>

                <div class="znachenie"><b>Значение Y</b></div>
            </label> <br>
            <input type="text" name="y" id="y" placeholder="(-3...5)" required>
            <p id="error_y_msg"></p>

            <label>
                <div class="znachenie"><b>Значение R</b></div>
            </label> <br>
            <label><input type="checkbox" name="R" value="1">1 </label>
            <label><input type="checkbox" name="R" value="1.5">1.5 </label>
            <label><input type="checkbox" name="R" value="2">2 </label>
            <label><input type="checkbox" name="R" value="2.5">2.5 </label>
            <label><input type="checkbox" name="R" value="3">3 </label>
            <p id="error_r_msg"></p>

            <button type="submit" name="submit">Посчитать</button>
            <!--<button type="submit" name="submit1">Очистить историю</button>-->
        </form>

        <div class="graphic">
            <canvas id="example"></canvas>

            <script type="text/javascript">
                var example = document.getElementById("example"),
                    ctx = example.getContext('2d');
                example.height = 300;
                example.width = 300;
                ctx.fillStyle = '#2b3547';
                ctx.beginPath();
                ctx.moveTo(150, 210);
                ctx.lineTo(270, 150);
                ctx.lineTo(150, 150);
                // ctx.lineTo(30, 90);
                ctx.fill();
                ctx.arc(150, 150, 120, 1.5 * Math.PI, 0, false);
                ctx.lineTo(30, 150);
                ctx.lineTo(30, 90);
                ctx.lineTo(150, 90);
                ctx.fill();
                ctx.strokeStyle = '#000000'; // меняем цвет рамки
                ctx.strokeRect(150, 0, 0, 300);
                ctx.strokeRect(0, 150, 300, 0);
                ctx.moveTo(150, 0);
                ctx.lineTo(146, 10);
                ctx.moveTo(150, 0);
                ctx.lineTo(154, 10);
                ctx.moveTo(300, 150);
                ctx.lineTo(290, 146);
                ctx.moveTo(300, 150);
                ctx.lineTo(290, 154);
                ctx.moveTo(30, 145);
                ctx.lineTo(30, 155);
                ctx.moveTo(90, 145);
                ctx.lineTo(90, 155);
                ctx.moveTo(210, 145);
                ctx.lineTo(210, 155);
                ctx.moveTo(270, 145);
                ctx.lineTo(270, 155);
                ctx.moveTo(145, 30);
                ctx.lineTo(155, 30);
                ctx.moveTo(145, 90);
                ctx.lineTo(155, 90);
                ctx.moveTo(145, 210);
                ctx.lineTo(155, 210);
                ctx.moveTo(145, 270);
                ctx.lineTo(155, 270);
                ctx.stroke();
                ctx.strokeText("-R/2", 90, 140, 20);
                ctx.strokeText("-R", 30, 140, 20);
                ctx.strokeText("R/2", 210, 140, 20);
                ctx.strokeText("R", 270, 140, 20);
                ctx.strokeText("R", 160, 33, 20);
                ctx.strokeText("R/2", 160, 93, 20);
                ctx.strokeText("-R/2", 160, 213, 20);
                ctx.strokeText("-R", 160, 273, 20);
                ctx.strokeText("x", 290, 140, 20);
                ctx.strokeText("y", 160, 10, 20);
            </script>
        </div>

        <aside>
            <p>
                <?php
                /*ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);*/

                //header('Content-Type: text/html; charset=utf-8');
                //http://www.lab1/LR1.php?R=123&x=5.5&y=7.8
                $time_start = microtime(true);
                if (isset($_GET["submit"])) {
                    if (isset($_GET["R"]) && isset($_GET["x"]) && isset($_GET["y"])) {
                        $isIncorrect = false;
                        $R = $_GET["R"];
                        if (!is_numeric($R)) {
                            echo "<p class='error_msg'>R must be a numeric!</p>";
                            $isIncorrect = true;
                        }
                        $x = $_GET["x"];
                        if (!is_numeric($x)) {
                            echo "<p class='error_msg'>x must be a numeric!</p>";
                            $isIncorrect = true;
                        }
                        $y = $_GET["y"];

                        $y = str_replace(",", ".", $y); //замена запятой на точку (что, на что, где)

                        if (!is_numeric($y)) {
                            echo "<p class='error_msg'>y must be a numeric!</p>";
                            $isIncorrect = true;
                        }
                        if ($isIncorrect)
                            return;

                        //$arr = json_decode(file_get_contents("dt"));
                        $arr = unserialize(file_get_contents('dt'));
                        if($arr == null)
                            $arr = array();
                        echo "<p class='answer_name' style='text-align: center; font-family: \"Rubik Mono One\" , sans-serif;font-size: 25px; color:#2b3547 '> History </p>";

                        if (count($arr) == 0)
                            echo "<p style='text-align: center'>Нет данных</p>";
                        for ($row = 0; $row < count($arr);$row++) {
                            echo "<p style='text-align: center'>Исходные данные :".$arr[$row][0]."</p>";
                            echo "<p style='text-align: center'>Ответ :".$arr[$row][1]."</p>";
                            echo "<p style='text-align: center'>Дата :".$arr[$row][2]."</p>";
                            echo "<p style='text-align: center'>'Время работы программы :".$arr[$row][3]."</p>";
                        }


                        echo "<p class='answer_name' style='text-align: center; font-family: \"Rubik Mono One\" , sans-serif;font-size: 25px; color:#2b3547 '> ANSWER</p>";
                        echo "<p style='display:inline-block;width:49.9%;font-weight: 600;text-align: right; '>
                        <input disabled type='text' style='font-weight:bold; width: 35%; color:black' value='Исходные данные :' > <br> 
                        <input disabled type='text' style='font-weight:bold; width: 35%; color:black' value='Ответ :'> <br>
                        <input disabled type='text' style='font-weight:bold; width: 35%; color:black' value='Текущие данные :'> <br>
                        <input disabled type='text' style='font-weight:bold; width: 35%; color:black' value='Время работы программы :'>
                        </p>";
                        echo "<div class='answer'>";
                        echo "<label><input disabled type='text' value='R:$R x:$x y:$y'><br></label>";
                        $curDate = date("d.m.Y H:i:s");
                        $dat = "<label> <input disabled type='text' id='cur_date' value='$curDate' ><br></label>";
                        $answer = "";
                        if ($y >= 0 && $y <= -$x + $R / 2 && $x >= 0 && $x <= $R / 2 || $y >= -$R / 2 && $y <= 0 && $x >= -$R && $x <= 0
                            || $y >= 0 && $y <= $R / 2 && $x > -sqrt($R * $R / 4) - $y * $y) {
                            $answer = "Да";
                            echo "<label> <input disabled type='text' value='Да' ><br></label>" . $dat;
                        } else {
                            $answer = "Нет";
                            echo "<label><input disabled type='text' value='Нет' ><br></label>" . $dat;
                        }
                        $time_end = microtime(true);
                        $time_run = $time_end - $time_start;
                        echo "<label><input disabled type='text' value='$time_run'><br></label>";
                        array_push($arr, array('R:'.$R.'x:'.$x.'y:'.$y, $answer, $curDate, $time_run));
                        /*$arr = json_encode($arr);
                        file_put_contents("dt", $arr);*/
                        file_put_contents('dt', serialize($arr));
                    } else {
                        echo "<p class='error_msg'>Заполните все поля!</p>";
                    }
                    echo "</div>";

                    echo "<form method='GET' style='text-align: center'><input type='submit' name='btn_clear' value='Очистить историю'></form>";
                }

                if(isset($_GET["btn_clear"])){
                    file_put_contents("dt", "");
                    echo "<p>История успешно очищена</p>";
                }
                ?>


            </p>
        </aside>


        <br>


    </main>

    <footer>
        <div class="contacts">
            <p class="contacts_name">Контакты<br></p>
            <p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> &nbsp <b>Телефон</b> <a
                        href="tel:88129461403">8-981-946-16-03 </a></p>
            <p><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp &nbsp  </i> <b>Почта</b> <a
                        href="mailto:alice.savushkina@mail.ru">alice.savushkina@mail.ru </a></p>
        </div>
        <a href="#top" class="top"> Наверх</a>
    </footer>


</div>
</body>


</html>

