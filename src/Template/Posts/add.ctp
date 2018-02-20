<?php echo $this->Form->create($post, ['type'=> 'file']); ?>
  <fieldset>
    <legend>Add Post</legend>
    <div class="form-group">
      <?php echo $this->Form->input('title', ['class'=> 'form-control', 'id'=>'title', 'placeholder'=>'Title']); ?>
      
    </div>


    <div class="form-group">
      <?php echo $this->Form->input('description', ['class'=> 'form-control', 'id'=>'description', 'placeholder'=>'description']); ?>
      
    </div>

    <div class="form-group">
      <?php echo $this->Form->input('file', ['type'=>'file', 'class'=> 'form-control', 'id'=>'file']); ?>
      
    </div>
    <?php echo $this->Form->button(__('Add Post'), ['class'=> 'btn btn-primary']); ?>
    <?php echo $this->html->link('Back', ['action'=>'index'], ['class'=> 'btn btn-primary']); ?>
  </fieldset>


<?php echo $this->Form->end(); ?>