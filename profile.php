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

        $title = $_POST['title'];
        $main_text = $_POST['text'];
        if (!$title || !$main_text) die ("Заполните все поля");

        $sql = "INSERT INTO posts (post_name, post_text) VALUES ('$title', '$main_text')";
        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
        
        if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
    }


    ?>