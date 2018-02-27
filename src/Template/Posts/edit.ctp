<?php echo $this->Form->create($post); ?>
  <fieldset>
    <legend>Edit Post</legend>
    <div class="form-group">
      <?php echo $this->Form->input('title', ['class'=> 'form-control', 'id'=>'title', 'placeholder'=>'Title']); ?>
      
    </div>

    <div class="row">
        <div class="form-group col-sm-8">
          <?php echo $this->Form->input('description', ['class'=> 'form-control', 'id'=>'description', 'placeholder'=>'description']); ?>
          
        </div>
        <div class="col-sm-4">
            <img src="<?php echo $post->path; ?>" width="100%">
        </div>
     </div>
    <div class="form-group">
      <?php echo $this->Form->input('path', ['class'=> 'form-control', 'type'=> 'file', 'id'=> 'file']); ?>
    </div>
    <?php $category = explode(',', $post->category); ?>
    <div class="form-group">
      <label for="category">Select Category: </label>
      <input type="checkbox" name="category[]" value="web-design" <?php if(in_array('web-design', $category)) echo "checked"; ?> >Web Design
      <input type="checkbox" name="category[]" value="graphic-design" <?php if(in_array('graphic-design', $category)) echo "checked"; ?>> Graphics Design
      <input type="checkbox" name="category[]" value="web-development" <?php if(in_array('web-development', $category)) echo "checked"; ?>> Web Development
      <input type="checkbox" name="category[]" value="laravel" <?php if(in_array('laravel', $category)) echo "checked"; ?>> Laravel
    </div>
    <?php echo $this->Form->button(__('Update Post'), ['class'=> 'btn btn-primary']); ?>
    <?php echo $this->html->link('Back', ['action'=>'index'], ['class'=> 'btn btn-primary']); ?>
  </fieldset>
</form>

<?php echo $this->Form->end(); ?>