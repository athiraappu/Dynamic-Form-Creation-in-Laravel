<?php $__env->startSection('custom-styles'); ?>

<?php $__env->stopSection(); ?>


<style type="text/css">
    .container{
        max-width: 1401px;
    }
</style>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <?php if(Session::has('success_msg')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('success_msg')); ?></div>
                <?php endif; ?>
            <div class="card">
                <div class="card-header"><h2>Dashboard</h2></div>
                    <h1>  Form Lists</h1>
                    <div style="text-align: right;"><a href="<?php echo e(route('dynamicpage')); ?>">Add new</a></div>
                <div class="card-body">
                     <table class="table table-bordered" id="dynamicTable" style="width: 100%;">  
                        <thead>
                        <tr>
                            <th>Form name</th>
                            <th>Label name</th>
                            <th>HTML</th>
                            <th>Comments</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(count($data)>0): ?>
                             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr> 
                                 <td><?php echo e($row->form_name); ?></td>
                                 <td><?php echo e($row->label); ?></td>
                                 <td><?php echo e($row->html_field); ?></td>
                                 <td><?php echo e($row->comments); ?></td>

                                 <td>
                                  <a href="<?php echo e(route('form.show', $row->id)); ?>" class="label label-success">Show</a>
                                 </td>

                                 <td><a href="<?php echo e(route('form.edit', $row->id)); ?>" class="label label-warning">Edit</a></td>

                                 <td><a href="<?php echo e(route('form.delete', $row->rowId)); ?>" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                             </td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php else: ?>
                         <tr>
                            <td colspan="6">No Data Found</td>
                         </tr>
                         <?php endif; ?>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\admin-panel\resources\views/adminHome.blade.php ENDPATH**/ ?>