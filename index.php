<?php include('inc/head.php'); ?>

<?php
if (isset($_POST['content'])){
    $document = "../files/roswell".$_POST["file"];
    $file= fopen($document,'w');
    fwrite($file,$_POST['content']);
    fclose($file);
}

$dir = opendir("../php_files_handling_ressources/files")or die('erreur');
$content = file_get_contents($document);
while($file = readdir($dir)){
    if(!in_array($file,array(".",".."))){
        echo '<a href="?f='.$file.'">';
        echo $file;
        echo '</a>';
    }
    if (isset($_POST['delete'])) {
        unlink("../files/roswell/" . $_GET['f']);
        header('location: index.php');
    }
}
if(isset($_GET["f"])){
    echo "<h1 style='font-size: 25px;'>{$_GET["f"]}</h1>";
    $file = "../files/roswell/".$_GET["f"];
    $content = file_get_contents($file);
};
?>

    <form method="post" action="">
        <div class="form-group">
            <label>
                        <textarea name="content" style="width: 30em; height: 10em;">
                           <?php echo $content; ?>
                        </textarea>
            </label>
        </div>
        <input type="hidden" name="file" value="<?= $_GET["f"] ?> >
        <input type="submit" value="Envoyer">
    </form>



<?php include('inc/foot.php'); ?>