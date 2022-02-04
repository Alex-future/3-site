<?php
echo "<script>alert(\"Использование файлов cookie. Оставаясь на сайте вы подтверждаете использование cookie.\");</script>";
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Форма</title>
		<meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <div id="page">
                <form id="content" method="get" action="form.php">
					<h2>Туристическое агентство</h2>
			
				<legend>Выполните вход</legend>
				<p><label><strong>Логин:</strong></label>
				<input maxlength="15" size="19" name="login" autocomplete="off" placeholder="Логин"></p>
				<p><label><strong>Пароль:</strong></label>
				<input type="password" maxlength="8" size="19" name="password" autocomplete="off" placeholder="Пароль"></p>
			
                    <p>Выберите цвет фона</p>
                    <div class="color" style="background-color: RGB(219 186 238); background-size:cover;"><input type="radio" class="radio" name="background_color"  value="RGB(219 186 238)" checked></div>
                    <div class="color" style="background-color: RGB(187 60 82);"><input type="radio" class="radio" name="background_color" value="RGB(187 60 82)"></div>
                    <div class="color" style="background-color: RGB(60 186 165);"><input type="radio" class="radio" name="background_color" value="RGB(60 186 165)"></div>
                    <div style="display: flex;"><input class="button" type="submit" value="Вход" style="margin:auto;"></div>
                    <div>
                        <p>История Ваших посещений</p>
                        <?php
                            foreach ($_SESSION['count_visit'] as $item => $item_count)
                            echo "<p style=\"font-size: 12pt\">" . $item . "Вы посетили " . $item_count . " раз(а)</p>";
                        ?>
                    </div>
                </form>
            </div>
    </body>
</html>
