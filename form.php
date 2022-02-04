<?php 
    session_start();
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $login=test_input($_GET['login']);
	$password=test_input($_GET['password']);
    $color=test_input($_GET['background_color']);
    setcookie('login', $login);
	setcookie('password', $color);
    setcookie('color', $color);
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
        <title>Туристическое агентство</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main style="background-color: <?php echo $color;?>">
            <div id="page">
                <form id="content" method="post" action="session.php">
                    <p>Здравствуйте, <?php echo $login?></p>
                    <p>Введите данные:</p>
                    <p><label><strong>Имя<em>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</em></strong></label>
				<input type="text" name="name" maxlength="15" size="20" align="left"></p>
				<p><label><strong>Фамилия<em>*</em></strong></label> 
				<input type="text" name="fam" maxlength="20" size="20"></p>
				<p><label><strong>E-mail<em>*&nbsp&nbsp&nbsp&nbsp&nbsp</em></strong></label> 
				<input type="text" name="email" placeholder="___.___@___.___" maxlength="20" size="20"></p>
				
				<legend>Поиск тура</legend>
				<p><label><strong>Куда</strong></label>
				<input size="40" name="geo" placeholder="Город,курорт,отель..."></p>
				<label><strong>Когда</strong></label>
				<input type="date" name="calendar" value="2020–14-04">
				<label><b>Период</b></label>
				<select name="period" size="1">
					<option selected value="2-3 ночи">2-3 ночи</option>
					<option value="7-10 ночей">7-10 ночей</option>
					<option value="14 ночей">14 ночей</option>
					<option value="30 ночей">30 ночей </option>
				</select><br>
				<label><b>Гости</b></label>
				<select name="gosty" size="1">
					<option selected value="1 взрослый">1 взрослый</option>
					<option value="2 взрослых">2 взрослых</option>
					<option value="3 взрослых">3 взрослых</option>
					<option value="4 взрослых">4 взрослых</option>
					<option value="размещение с детьми">размещение с детьми</option>
				</select>	
				<p><input type="checkbox" name="s1" checked> Даты поездки неизвестны
					<input type="checkbox" name="s2" checked> +/- 1 день
				<input type="checkbox" name="s3"> Моментльное подтверждение<br></p> 
				<p><b>Выберите способ оплаты</b></p>
				<input type="radio" name="pay" checked value="Наличными"> Наличными<br> 
				<input type="radio" name="pay" value="Банковской картой"> Банковской картой<br>
				<input type="radio" name="pay" value="QIWI">QIWI<br>
		
                    <div style="display: flex"><input type="submit" value="Отправить" style="margin: 20px auto"></div>
                </form>
            </div>
        </main>
    </body>
</html>
