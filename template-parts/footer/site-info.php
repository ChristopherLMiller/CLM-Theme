<?php
/**
 * Displays footer site info
 * 
 * @package CLM
 * @since 1.0
 * @version 1.0
 */
?>

<div class="site-info">
  <?php if (function_exists('the_privacy_policy_link')) {
    the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>');
  } ?> 
  <span class="copyright">Copyright &copy; <?php echo date("Y"); ?></span>
</div>