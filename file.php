                <form method="POST" action="file.php" enctype="multipart/form-data" name="upload">
                    <input type="file" name="file"/>
                    <button type="submit" class="btn_reg" name="submit">Продолжить</button>
                </form>


<?php
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
    ?>
