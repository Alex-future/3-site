<?php
    session_start();
    $actual_link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    if (isset($_SESSION['count_visit'])) 
    {
        $count_visit = $_SESSION['count_visit'];
        if (array_key_exists($actual_link, $count_visit)) 
            $count_visit[$actual_link] = $count_visit[$actual_link] + 1;
        else 
            $count_visit[$actual_link] = 1;
        $_SESSION['count_visit'] = $count_visit;
    }
    else 
    {
        $count_visit = array();
        $count_visit[$actual_link] = 1;
        $_SESSION['count_visit'] = $count_visit;
    }
    if (isset($_POST["submit_exit"]))
    {
        session_unset();
        session_destroy();
    }
?>
    <!DOCTYPE html>
    <html>
        <head>
		<meta charset='utf-8'>
            <title>Туристическое агентство</title>
            <link rel="stylesheet" href="style.css">
            <style>
                .button, h6 {
                    margin: 5px 0;
                }
                h6 {
                    font-size: 16pt;
                }
            </style>
        </head>
        <body>
            <main style="background-color: <?php echo $_COOKIE['color']?>">
                <div id="page">  
				<?php
    if (!isset($_SESSION["name"]) && !isset($_SESSION["fam"]) && !isset($_SESSION['email']) && !isset($_SESSION["geo"]) && !isset($_SESSION["calendar"])&& !isset($_SESSION["period"])&& !isset($_SESSION["gosty"])&& !isset($_SESSION["pay"]))
    {
?>
                    <form id="content" action="index.php">
                        <p>Уважаемый, Александр</p>
                        <p>Сессия пуста</p>
                        <input class="button" type="submit" value="Вернуться на главную">
                    </form>
                </div>
            </main>
        </body>
    </html>
	<?php
    session_start();
    session_unset();
    session_destroy();
    exit;
    }
?>
                    <div id="content" style="margin: 80px auto; background-color: 0;">
                        <p>Уважаемый, Александр</p>
                        <p>Данные из массива о сессии пользователя</p>
                        <h6>Имя: <?php echo $_SESSION['name']?></h6>
                        <h6>Фамилия: <?php echo $_SESSION['fam']?></h6>
                        <h6>E-mail: <?php echo $_SESSION['email']?></h6>
                        <h6>Страна: <?php echo $_SESSION['geo']?></h6>
                        <h6>Дата: <?php echo $_SESSION['calendar']?></h6>
						<h6>Период:: <?php echo $_SESSION['period']?></h6>
						<h6>Гости: <?php echo $_SESSION['gosty']?></h6>
						<h6>Оплата: <?php echo $_SESSION['pay']?></h6>
                       <form action="page.php" method="POST" style="display: flex;">
                            <input class="button2" type="submit" name="submit_exit" value="Удалить данные о сессии" style="margin: 20px auto;">
                        </form>
                        <form action="uslugi.php" method="GET" style="display: flex;">
                            <input class="button2" type="submit" value="Выбрать доп.услугу" style="margin: 20px auto;">
                        </form>
                        <div  style="display: flex"><a href="index.php" style="margin: 20px auto; color: red;font-size:14pt;">На  главную</a></div>
                    </form>
                </div>
            </main>
        </body>
    </html>
