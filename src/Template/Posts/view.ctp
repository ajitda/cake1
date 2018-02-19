<h3><?php echo $post->title; ?></h3>
<p><?php echo $post->description; ?></p>
<?php echo $this->html->link('Back', ['action'=> 'index'], ['class'=> 'btn btn-primary']); ?>
