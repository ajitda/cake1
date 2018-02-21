<div class="row">
<p><?php echo $this->Flash->render('message'); ?></p>
<h2>View All Posts <?php echo $this->Html->link('ADD POST', ['action'=>'add'], ['class'=> 'btn btn-primary pull-right']); ?></h2>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($posts)) : ?>
  <?php foreach($posts as $post): ?>
    <tr class="table-active">
      <td><?php echo $post->title; ?></td>
      <td><?php echo $post->description; ?></td>
      <td><img src="<?php echo $post->path; ?>" alt="" width="150"/></td>
      <td>
          <?php echo $this->html->link('view', ['action'=>'view', $post->id], ['class'=> 'btn btn-primary']); ?>
          <?php echo $this->html->link('edit', ['action'=>'Edit', $post->id], ['class'=> 'btn btn-warning']); ?>
          <?php echo $this->Form->postLink(
          'Delete', ['action'=> 'delete', $post->id], 
          ['class'=> 'btn btn-danger'],
          ['confirm'=> 'Are you Sure?']); 
          ?>
      </td>
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