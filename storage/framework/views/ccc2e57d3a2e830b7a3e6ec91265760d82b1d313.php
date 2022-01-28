<?php $__env->startSection('custom-styles'); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 align="center">Dynamic Form - Edit</h2> 
    <div style="text-align: right;"><a href="<?php echo e(route('admin.home')); ?>">Back</a></div>
    <form action="<?php echo e(route('updatePost')); ?>" method="POST">
        <?php echo csrf_field(); ?>
   
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
   
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo e(Session::get('success')); ?></p>
            </div>
        <?php endif; ?>
        <div>
            <div>Form Name</div>
            <div>
            	<input type="hidden" name="form_id" id="form_id" value="<?php echo e($data[0]->id); ?>">
            	<input type="text" name="form_name" id="form_name" placeholder="Enter Form Name" required="required" value="<?php echo e($data[0]->form_name); ?>" class="form-control" style="width: 214px;" /></div>
        </div>
        <br/>
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Label</th>
                <th>HTML Field</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>
             <?php if($data): ?>
               <?php $i=0;?>
                 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                    <?php $i++;?>
             	 <tr>  
             	 	<td><input type="text" name="addmore[<?php echo e($i); ?>][label]" placeholder="Enter Label Name" class="form-control" value="<?php echo e($row->label); ?>" /></td> 
             	 	<td>
                    <select name="addmore[<?php echo e($i); ?>][caption]" class="form-control">
                        <option value="">--Select--</option>
                        <option  value="text" <?php echo e(( $row->control == "text") ? 'selected' : ''); ?>>Text</option>
                        <option value="number" <?php echo e(( $row->control == "number") ? 'selected' : ''); ?>>Number</option>
                        <option value="select" <?php echo e(( $row->control == "select") ? 'selected' : ''); ?>>Select</option>
                    </select>
                   </td>    
                   <td><input type="text" name="addmore[<?php echo e($i); ?>][comments]" placeholder="Enter your comments" class="form-control" value="<?php echo e($row->comments); ?>"/></td>  
                   <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
           		 </tr> 
           		 
           		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
           
        </table> 
    
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][label]" placeholder="Enter your Label" class="form-control" /></td><td> <select name="addmore['+i+'][caption]" class="form-control"><option>--Select--</option><option value="text">Text</option><option value="number">Number</option><option value="select">Select</option></select></td><td><input type="text" name="addmore['+i+'][comments]" placeholder="Enter your Comments" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\admin-panel\resources\views/editdynamic.blade.php ENDPATH**/ ?>