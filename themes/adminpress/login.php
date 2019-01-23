<?php 
echo theme_view('header-login'); 

//echo isset($content) ? $content : Template::content();
?>

<?php echo isset($content) ? $content : Template::content(); ?>

<?php
echo theme_view('footer-login');
?>