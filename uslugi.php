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
?>
<!DOCTYPE html>
    <html>
        <head>
		<meta charset='utf-8'>
            <title>Туристическое агентство</title>
            <link rel="stylesheet" href="css/style.css">
            <style>
                .button, h6 {
                    margin: 5px 0;
                }
                select {
                    
                    margin: 0 115px;
    font-size: 16pt;
    border-radius: 5px;
                }
                option {
                    color: black;
                }
            </style>
        </head>
        <body>
            <main style="background-color: <?php echo $_COOKIE['color']?>">
                <div id="page">    
                    <div id="content" style="background-color: 0;">
                        <p>Уважаемый, Александр</p>
                        <p>Выберите услугу</p>
                        <div style="display: flex;">
                        <select style="color: burlywood; margin: 40px auto;">
                            <option style="color: burlywood; mergin: auto;">Бронирование отеля</option>
                        </select>
						<select style="color: burlywood; margin: 40px auto;">
                            <option style="color: burlywood; mergin: auto;">Туристический автобус</option>
                        </select>
						<select style="color: burlywood; margin: 40px auto;">
                            <option style="color: burlywood; mergin: auto;">Экскурсии</option>
                        </select>
            </div>
            <div style="display: flex;">
                        <input class="button" type="submit" value="Услуга выбрана" style="margin: 30px auto">
            </div>
                    </form>
                </div>
            </main>
        </body>
    </html>
