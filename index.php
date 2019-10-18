<?php
if (isset($_POST['content'])){
    $document = "../php_files_handling_ressources/files".$_POST["file"];
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
};
?>

<?php include('inc/head.php'); ?>

C'est ici que tu vas devoir afficher le contenu de tes repertoires et fichiers.

<?php include('inc/foot.php'); ?>