<!doctype html>
<html lang="ru">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
        <link rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Беловолов А.В.</title>
    </head>

    <body>


        <div class="container">
            <div class="row">
                <div class="button_js col-12">
                    <button id="myButton">Click Me</button>
                    <p id="demo"></p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="text_in">
                <div class="col-12">
                    <h1 class="hello">
                        Привет, <?php echo $_COOKIE['User']; ?>
                    </h1>
                </div>
            <div class="text_in">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form" name="title" placeholder="Заголовок поста">
                    <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста"></textarea>
                    <input type="file" name="file"/>
                    <button type="submit" class="btn_reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>  






        <div class="container nav_bar">
            <div class="row">
                <div class="row">
                    <div class="col-3 nav_logo"></div>
                    <div class="col-9">
                        <div class="nav_text">Информация обо мне</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>
                            <p>Беловолов Александр, дядя с двумя детьми и ипотеками который хочет вкатиться в инфобез. </p>
                            <p>Нет нерешаемых задач. Есть неумение гуглить. Ну и лень.</p>
                            <p>Возраст - это опыт и понимание целей.</p>
                            <p>Вижу цель - не вижу препятствий.</p>
                        </h2>
                    </div>
                    <div class="col-4">
                        <div class="row my_photo"></div>
                        <div class="row"><p class="title_photo">Беловолов А.В.</p></div>
                    </div>
            </div>

            
            <div class="row">
                <div class="row">
                    <div class="col-9">
                        <div class="nav_text">параграф 1</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>
                            Здесь будет сказ о том как я люблю верстать странички.Нет, серьёзно, чувствую себя молодым и полным сил. Нервы - канаты.
                            <img src="image/pic5.jpg">
                        </h2>
                    </div>

            </div>


            <div class="row">
                <div class="row">
                    <div class="col-9">
                        <div class="nav_text">Мемасики дня для разбавки атмосферы</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>
                            <img src="image/pic1.jpg">
                            <img src="image/pic2.jpg">
                            <img src="image/pic3.jpg">
                            <img src="image/pic6.jpg">
                            <img src="image/pic7.jpg">
                            <img src="image/pic8.jpg">
                            <img src="image/pic9.jpg">
                        </h2>
                    </div>            
            </div>
         

        </div>
        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>

<?php
    require_once('bd.php');
    $link = mysqli_connect('127.0.0.1', 'root', 'password', 'AlexBelov');

    if (isset($_POST['submit'])) {

        $title = strip_tags($_POST['title']);
        $main_text = strip_tags($_POST['text']);

                $errors = [];
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                                                         $errors[] = 'Произошла ошибка при загрузке файла.';
                                                         }
                                                         
                                                         
        $title = mysqli_real_escape_string($link, $title);
        $main_text = mysqli_real_escape_string($link, $main_text);
        if (!$title || !$main_text) die ("Заполните все поля");
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $main_text = htmlspecialchars($main_text, ENT_QUOTES, 'UTF-8');



        $sql = "INSERT INTO posts (post_name, post_text) VALUES ('$title', '$main_text')";
        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
        
 if(isset($_FILES['file'])){
$errors =[];
$allowedtypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/png'];         
$maxFileSize = 102400;
$realFileSize = filesize($_FILES['file']['tmp_name']);
if ($realFileSize > $maxFileSize) 
{
	$errors[] = 'Файл слишком большой.';
}
$fileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']);
echo $fileType;          
if (!in_array($fileType, $allowedtypes)) 
{
$errors[] = 'Недопустимый тип файла.';
}         
if (empty($errors)) {

$tempPath = $_FILES['file']['tmp_name'];
$destinationPath = 'upload/' . uniqid() . '_' . basename($_FILES['file']['name']);
if (move_uploaded_file($tempPath, $destinationPath)) {
echo "Файл загружен успешно: " . $destinationPath; } 
else {
$errors[] = 'Не удалось переместить загруженный файл.';
}
echo "3";          
} 
else {
foreach ($errors as $error) {
echo $error . '<br>';
            }
        }

}
    }
    
    


    ?>
