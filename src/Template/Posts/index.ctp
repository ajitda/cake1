<div class="row">
<?php echo $this->Flash->render('message'); ?>
<h2>View All Posts <?php echo $this->Html->link('ADD POST', ['action'=>'add'], ['class'=> 'btn btn-primary pull-right']); ?></h2>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($posts)) : ?>
  <?php foreach($posts as $post): ?>
    <tr class="table-active">
      <td><?php echo $post->title; ?></td>
      <td><?php echo $post->description; ?></td>
      <td></td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td>No records found!</td>
       
      </tr>
    <?php endif; ?>
  </tbody>
</table> 
</div>