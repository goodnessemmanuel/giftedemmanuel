<?php
/**
 * theme footer
 * 
 */
$current_year = new DateTime();
?>
<footer class="footer_area">
            <div class="container">
                <div class="copyright_text">
                    <p>Copyright &copy;<?php echo $current_year->format('Y') ?>. All Rights Reserved | Design by <b>Oche Ejeh&reg;</b></p>
                </div>
            </div>
        </footer>
        <!--====================End Footer area=======================-->
        <?php wp_footer(); ?>
    </body>
</html>