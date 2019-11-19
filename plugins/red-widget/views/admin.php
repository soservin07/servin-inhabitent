<!-- This file is used to markup the administration form of the widget. -->

<div class="widget-content">
   <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
   </p>
   <p>
      <label for="<?php echo $this->get_field_id('sched1_val'); ?>">Monday - Friday:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('sched1_val'); ?>" name="<?php echo $this->get_field_name('sched1_val'); ?>" type="text" value="<?php echo $monday_friday; ?>">
   </p>
   <p>
      <label for="<?php echo $this->get_field_id('sched2_val'); ?>">Saturday:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('sched2_val'); ?>" name="<?php echo $this->get_field_name('sched2_val'); ?>" type="text" value="<?php echo $saturday; ?>">
   </p>
   <p>
      <label for="<?php echo $this->get_field_id('sched3_val'); ?>">Sunday:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('sched3_val'); ?>" name="<?php echo $this->get_field_name('sched3_val'); ?>" type="text" value="<?php echo $sunday; ?>">
   </p>
</div>