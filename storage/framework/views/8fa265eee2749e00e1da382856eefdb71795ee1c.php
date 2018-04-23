<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs
                    <a href="/posts/create" class="btn btn-primary pull-right" style="margin-top:-7px;"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger">
                                <?php echo session()->get('error'); ?>

                            <button type="button" class="close" data-dismiss="alert">&times;</button>	
                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success">
                                <?php echo session()->get('success'); ?>

                            <button type="button" class="close" data-dismiss="alert">&times;</button>	
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($post->title); ?></td>
                                        <td class="text-center"><?php echo e($post->user->name); ?></td>
                                        <td class="text-center"><?php echo e($post->created_at); ?></td>
                                        <td class="text-right">
                                            <?php if($post->user->id == Auth::id()): ?>
                                                <a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="/posts/<?php echo e($post->id); ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                                                <form action="/posts/<?php echo e($post->id); ?>" method="post" style="display:inline-block">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            <?php else: ?>
                                                <a href="/posts/<?php echo e($post->id); ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                                            <?php endif; ?>
                                            
                                        </td>
                                    </tr> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="4">No Record Found!!!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            
                        </table>
                        <div class="pull-right">
                                <?php echo e($posts->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>