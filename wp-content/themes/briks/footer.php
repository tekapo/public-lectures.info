<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bricks
 */
?>
   </div> <!-- /container -->
        
        <footer class="foot"> 
            <center><p><a href="<?php echo esc_url(home_url('/' ));?>"><?php bloginfo('name') ?></a>, Copyright &copy;&nbsp; <?php echo date('Y'); ?>.</p></center> 
        </footer>
        <?php wp_footer();?> 
    </body>
</html>