<?php $versesArray= file("verses.txt");
    $randomnum = rand(0, count($versesArray)-1);
    $randomVerse = $versesArray[$randomnum];

    $colorArray = file("color.txt");
    $randomColor = $colorArray[$randomnum]; ?>
<html>
    <head>
    <title> VERSES </title>
    </head>
    <body bgcolor= <?php echo($randomColor) ?>  >  

    <blockquote>
            <?php echo($randomVerse) ?>
    
    </blockquote>
    </body>
</html>



