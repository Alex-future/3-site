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
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name='';
    $fam='';
    $email='';
    $geo='';
    $calendar='';
$period='';
$gosty='';
$pay='';
    $name=test_input($_POST['name']);
    $fam=test_input($_POST['fam']);
	    $email=test_input($_POST['email']);
	    $geo=test_input($_POST['geo']);
	    $calendar=test_input($_POST['calendar']);
	    $period=test_input($_POST['period']);
	    $gosty=test_input($_POST['gosty']);
	    $pay=test_input($_POST['pay']);
    ?>
<!DOCTYPE html>
    <html>
        <head>
		<meta charset='utf-8'>
            <title>Туристическое агентство</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <main style="background-color: <?php echo $_COOKIE['color']?>">
                <div id="page">
    <?php
    if (empty($name) || empty($fam) || empty($email) || empty($geo) || empty($calendar) || empty($period) || empty($gosty) || empty($pay))
    {
    ?>
                    <div id="content">
                        <p>Уважаемый, <!php echo $_SESSION['$name'] !></p>
                        <p>Не все данные были введены</p>
                        <input class="button" type="button" onclick="history.back();" value="Вернуться к заполнению">
                    </div>
                </div>
            </main>
        </body>
    </html>
    <?php
        exit;
    } 
    else 
    {
        $_SESSION['name']=$name;
        $_SESSION['fam']=$fam;
        $_SESSION['email']=$email;
        $_SESSION['geo']=$geo;
        $_SESSION['calendar']=$calendar;
		$_SESSION['period']=$period;
		$_SESSION['gosty']=$gosty;
		$_SESSION['pay']=$pay;
    }
    ?>
                    <form id="content" action="page.php">
                        <p>Уважаемый, Александр </p>
                        <p>Данные записы в сессионный массив</p>
                        <div style="display: flex"><input class="button" type="submit" value="Данные из сессии" style="margin: 20px auto"></div>
                    </form>
                </div>
            </main>
        </body>
    </html>
