<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/jquery.fancybox.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container"> 
            <h1>LFC Gallery</h1>
            <?php $dir = glob('images/{*.jpg,*.png}', GLOB_BRACE); ?>
            <?php foreach ($dir as $key => $value): ?>

                <div class="thumb">
                    <a href="<?php echo $value; ?>" data-fancybox="images" data-caption="<?php echo $value; ?>">
                        <img src="<?php echo $value; ?>" alt="" />
                    </a>
                   
                </div>
            <?php endforeach; ?>
        </div>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="js/jquery.fancybox.min.js" type="text/javascript"></script>
    </body>
</html>
