<?php if (strlen(trim($sched1_val)) > 0) : ?>
    <p>
        <span class="day-of-week">Monday-Friday:</span> <?php echo $sched1_val; ?>
    </p>
<?php endif; ?>
<?php if (strlen(trim($sched2_val)) > 0) : ?>
    <p>
        <span class="day-of-week">Saturday:</span> <?php echo $sched2_val; ?>
    </p>
<?php endif; ?>
<?php if (strlen(trim($sched3_val)) > 0) : ?>
    <p>
        <span class="day-of-week">Sunday:</span> <?php echo $sched3_val; ?>
    </p>
<?php endif; ?>