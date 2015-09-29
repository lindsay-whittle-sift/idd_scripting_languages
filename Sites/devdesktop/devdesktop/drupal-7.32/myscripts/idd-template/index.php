<!DOCTYPE html>
<!-- When Modernizer views the code it turns no-js into js to run script -->

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start of main content -->
<main>
<p>Start here...</p>

<!-- Start of php  code -->
<?php

// Get contents from Json file 'restaurant-menu/menu.json', decode it into php array assign it to $meal variable
$data = file_get_contents('restaurant-menu/menu.json');
$meal = json_decode($data, TRUE);



?>

<ul class="jq-list">
    
<!-- Inside a html unordered list, loop through content of $meal variable. -->
<?php foreach($meal as $meal_name => $description): ?>

    <!-- For each list item the id of the menu title will be converted to lowercase and replace spaces with hyphen --> <!-- Then echo the menu title -->  
    <li class="single-list" id="meal-<?php echo strtolower(str_replace(" ", "-", $meal_name)); ?>"><?php echo $meal_name; ?></li>

    <!-- Create new unordered list for content within each menu title. -->
    <ul>
        
        <!-- Loop through each menu description from previous loop and create a new value -->
        <?php foreach($description as $details): ?>

        <!-- Within each menu titles description echo the value -->
        <li class="inner-list"><?php echo $details; ?></li>

        <!-- end of inner foreach loop -->
        <?php endforeach; ?>

    <!-- end of inner list -->
    </ul>

<!-- End of outer foreach loop -->
<?php endforeach; ?>

<!-- end of menu title list -->
</ul>

</main>

<!-- Start of JavaScript -->
<!-- Pulling in JS files -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>

            /* Menu title list will turn red on hover and blue when not hovering */
            $(".jq-list li").hover(function(){
                $(this).css('color', 'red');
            },function(){
                 $(this).css('color', 'blue');
            });

            /* Inner list, descriptions, will turn yellow on hover and green when not hovering */
            $(".inner-list").hover(function(){
                $(this).css('color', 'yellow');
            },function(){
                 $(this).css('color', 'green');
            });

            /* Calling the azuba chicken and turning it grey on hover and then baby blue when not hovering */
            $("#meal-azuba-chicken").hover(function(){
                $(this).css('color', '#eeeeee');
            },function(){
                $(this).css('color', '#00FFFF');
            })

        /* New function to change the colour of everything on the menu to black once clicked - Issue made by Mark Whelan */
        $(function() {
          $('.jq-list li').click(function() {
            $(this).css('color', '#000000');
          } );
        } );
            
            
            /* End of script */
        </script>
    </body>
</html>

