<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs id: <?php echo e($post->id); ?>

                    <a href="/posts" class="btn btn-default pull-right" style="margin-top:-7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="alert alert-info">
                        <h3><?php echo e($post->title); ?></h3>
                        <span class="text-danger">
                            Created At <?php echo e($post->created_at); ?> By <?php echo e($post->user->name); ?>

                        </span>
                        <p><?php echo e($post->description); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>