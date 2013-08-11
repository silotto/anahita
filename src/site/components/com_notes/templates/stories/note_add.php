<?php defined('KOOWA') or die('Restricted access');?>

<data name="title">
<?php if ( $type != 'notification') : ?>	
	<?php if( $object->access != 'public' && ($target->id == $subject->id || $target->eql($actor)) ): ?>
    <i class="icon-lock pull-right"></i>  
    <?php endif; ?>
    <?= sprintf(@text('COM-NOTES-STORY-ADD'), @route($object->getURL())) ?>
<?php else: ?>
    <?php if ( $type == 'notification' ) : ?>	
	<?=sprintf(@text('COM-NOTES-ADD-NOTE-NOTIFICATION'), @name($subject), @route($object->getURL()), @possessive($target))?>    
    <?php endif; ?>
<?php endif; ?>
</data>

<?php if ( $type == 'story') : ?>
<data name="body">
	<?= @helper('text.truncate', @content($object->body), array('length'=>200, 'consider_html'=>true, 'read_more'=>true)); ?>
</data>
<?php else : ?>
<data name="email_body">
<div><?= $object->body ?></div>
<?php $commands->insert('viewstory', array('label'=>@text('COM-NOTES-VIEW-POST')))->href($object->getURL())?>
</data>
<?php endif;?>

