<?php
/**
 * custom block template for education
 */
?>
<div class="edu_wrapper">
    <div class="education wow fadeInUp animated">
        <h4><b><?php block_field("certificate"); ?></b></h4>
        <h5><?php block_field("school-name"); ?>.
        <br>(Public University)</h5>
        <h6>Graduated in <?php block_field("date-of-graduation"); ?></h6>
        <p><?php block_field("experience"); ?></p>
    </div><!--end education-->
</div>