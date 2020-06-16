<?php
$image = $template_args['field'];
$class = $template_args['class'];
$sizes = $template_args['sizes'];
?>
<div class="<?php echo $class; ?>">
  <img
  src="<?php echo $image['sizes']['medium'] ?>"
  srcset="<?php echo wp_get_attachment_image_srcset( $image['ID'], 'medium' ) ?>"
  sizes="<?php echo $sizes; ?>"
  alt="<?php echo $image['alt'] ?>"
  loading="lazy">
</div>
