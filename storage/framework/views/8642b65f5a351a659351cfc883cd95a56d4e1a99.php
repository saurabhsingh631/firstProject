<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blog
                    <a href="/posts" class="btn btn-default pull-right" style="margin-top:-7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo Form::open(['url' => '/posts/'.($post->id ?? ''), 'method' => ($edit_url ? 'PUT':'POST')]); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <?php echo e(Form::label('title', 'Post  Title',['class'=>'control-label'])); ?>

                            <?php echo e(Form::text('title',$post->title ?? '',['class'=>'form-control','placeholder'=>'Title'])); ?>

                            <?php if($errors->has('title')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('description', 'Post  Description',['class'=>'control-label'])); ?>

                                <?php echo e(Form::textarea('description', $post->description ?? '',['class'=>'form-control','placeholder'=>'Description', 'id'=>'article-ckeditor'])); ?>

                                <?php if($errors->has('description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <?php echo e(Form::submit('Save',['class'=>'btn btn-primary pull-right'])); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>