
<?php

// helper('form')


?>
<html>
<section class='container'>
<div>
<?= service('validation')->listErrors() ?>
<form action="<?php echo site_url('/index');?>" method = "post" class='text-right'>
<?= csrf_field() ?>

<input type="text" name = "keyword" />
<input type="submit" value = "Search" />
</form>

<?php  if($search): ?>

    <?php foreach($search as $results): ?>
       
<div class="card mt-3">
        <div class="card-header">
        <h1><?php echo $results['name']; ?></h1>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $results['category']; ?></h5>
    <p class="card-text"><?php echo $results['article']; ?></p>
    <button type="button" class="btn btn-success mb-2 addComment" data-id="<?= $results['id'];?>" data-toggle="modal" data-target="#addModal">Add New Comment</button>
    <?= service('validation')->listErrors() ?>
    <form action="<?php echo site_url('/save') ?>" method="post">
    <?= csrf_field() ?>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" data-id='<?php echo $results['id']; ?>' id="exampleModalLabel">Add New Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type='hidden' name='articleId' class='articleId'>
                
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                 
                <div class="form-group">
               
                    <label>Comment:</label>
                    <input type="text" class="form-control" name="comment" placeholder="Your Comment" required>
                </div>
               
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <?php foreach ($comments as $comment): ?>
         <?php  if ($results['id'] === $comment['article_id']): ?>
            <div class='comment'>            
            <p> <strong> <?php echo $comment['author'] ?> </strong><em> <?php echo $comment['comments'] ?></em> </p>
            <form action=" <?php echo base_url('/delete/'.$comment['id']); ?>" method='get'>
            <button type="submit" class="close deleteComment" aria-label="Close" data-id="<?= $comment['id'];?>">
          
            <span aria-hidden="true">&times;</span>
         </form>
                </button>
         </div>
            <?php endif; ?>
            <?php endforeach; ?>
  </div>
</div>
</div>
        
<?php endforeach; ?>
    
       


 

        <?php else: ?>
            <p class='text-center'>No Articles Have Been Found</p>
        <?php endif; ?>
       
           
        </section>
      
      

       
        <script src="/js/jquery.min.js"></script>
        
        <script> $(document).ready(function(){
             $('.addComment').on('click',function(){
                const id = $(this).data('id');
                $('.articleId').val(id);
                console.log(id)
             })
             $('.deleteComment').on('click', function(){
                const id = $(this).data('id');
                $('.deleteComment').val(id);
              
                // deleteComment(id)
                console.log(id)
             
             })
            
        })</script>
       
 


</html>