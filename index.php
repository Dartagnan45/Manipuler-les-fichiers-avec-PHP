<?php include('inc/head.php'); ?>

<?php
if (isset($_POST["content"])) {
    $file = "../php_files_handling_ressources/files/roswell" . $_POST["file"];
    $file = fopen($file, "w");
    fwrite($file, ($_POST["content"]));
    fclose($file);
}
?>
    <div class="content">
        <h1 style="font-size: 30px; text-align: center;">Choose the page you wish to edit</h1>

<?php
        $dir = opendir("../php_files_handling_ressources/files/roswell");
        while ($file = readdir($dir)) {
            if (!in_array($file, array(".", ".."))) {
                echo '<div style="text-align: center;"><a href="?f=' . $file . '">';
                echo $file;
                echo '</a></div>';
            }
            if (isset($_POST['delete'])) {
                unlink("../php_files_handling_ressources/files/roswell/" . $_GET['f']);
                header('location: index.php');
            }
        }

        if (isset($_GET["f"])) {
            echo "<h1 style='font-size: 25px;'>{$_GET["f"]}</h1>";
            $file = "../php_files_handling_ressources/files/roswell/" . $_GET["f"];
            $content = file_get_contents($file);
?>
            <form method="POST" action="index.php">
                <label>
                <textarea name="contenu" style="width:200%;height:300px">
                        <?php echo $content; ?>
                </textarea>
                </label>
                <input type="hidden" name="file" value="<?= $_GET["f"] ?> ">
                <div>
                <input type="submit" value="Envoyer"/>
                <input type="submit" class="btn-danger btn-md" name="delete" value="Delete">
                </div>
            </form>
<?php
        }
?>
    </div>

<?php include('inc/foot.php'); ?>