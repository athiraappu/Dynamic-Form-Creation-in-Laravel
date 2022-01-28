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
        <div class="col-md-8">
             <?php if(Session::has('success_msg')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('success_msg')); ?></div>
                <?php endif; ?>
            <div class="card">
                <div class="card-header">Show Form</div>                 
                   <div style="text-align: right;"><a href="<?php echo e(route('admin.home')); ?>">Back</a></div>
                   <div class="card-body">
                     <table>
                     	<tr>
                     		<td><?php echo e($data[0]->form_name); ?>

                     		</td>
                     	</tr>
                     	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                     	<tr>
                     		<td style="height: 50px;"><?php echo e($row->label); ?>:-</td>
                     		<td><?php echo $row->html_field; ?></td>
                     	</tr>

                     	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                </div>
            </div>
        </div>
    </div>

    

</div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\admin-panel\resources\views/showpage.blade.php ENDPATH**/ ?>