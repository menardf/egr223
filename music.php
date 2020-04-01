<?php
function printSongs($searchTitle="", $doSort="FALSE") {
  $musicList = file("music.txt"); 
  if ($doSort == "TRUE") {        
    sort($musicList);    
  }    
  foreach ($musicList as $song) {	
    list($title, $singer, $link, $img) = explode(",", $song);
    if (strlen($searchTitle) == 0) {
?>	  
  <li> <img src=<?=$img?> width=100 height=100 /> 
  <a href=<?= $link ?>><?= $title ?> by <?= $singer ?> <? getimagesize($img) ?> </a> </li>
<?php    
    } else {        
      # only print matching title        
      if ($searchTitle == $title) {
?>	  
  <li> <img src=<?=$img?> width=100 height=100 /> 
  <a href=<?= $link ?>><?= $title ?> by <?= $singer ?> <? getimagesize($img) ?>  </a> </li>
<?php        
      }    
    }	        	  
  }
}?>
<ol>
  <?php
  printSongs($_GET["title"], $_GET["sort"]);
  ?>
</ol>
<form action="music.php" method="post"
enctype="multipart/form-data">  
  <div>    
  Title: <input name="input1" />    
  Artist: <input name="input2" />    
  Link: <input name="input3" />  
  Upload Image: <input type="file" name="imgcover" /> 
  <input type="submit" name="add" value="Add New Song" />  
  </div>
  </form>

  <?php
    if (isset($_POST["add"])) {
    $input1 = $_GET["input1"]; 
    $input2 = $_GET["input2"];
    $input3 = $_GET["input3"];
    if(!$input1){ ?>

    <h2> Error , Title should not be blank </h2>
    <?php }
    if(!$input2){ ?>
    <h2> Error , Artist should not be blank </h2>

    <?php }
    if(!$input3||!preg_match('/youtube/',$input3)){ ?>
    <h2> Error , Incorrect link </h2>
    <?php }
    if (is_uploaded_file(
        $_FILES["imgcover"]["tmp_name"])) {
       move_uploaded_file($_FILES["imgcover"]["tmp_name"],     
         "images/".count(file("C:\Users\fekom\Documents\egr 223 htmll homework/music.txt")).".jpg");
         file_put_contents("music.txt", 
         $input1 . ", " . $input2 . ", " . $input3 . ", " .
         "images/".count(file("music.txt")).".jpg" ."\n", FILE_APPEND);
                    
    } else {
      print "Error: required file not uploaded";
    }
    


      }
  ?>