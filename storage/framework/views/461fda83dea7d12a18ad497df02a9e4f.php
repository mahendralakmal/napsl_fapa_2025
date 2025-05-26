<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
    <style>
        .entry-image {
            position: relative;
            margin-top: 2.5rem;
        }

        .entry-form {
            position: relative;
            top: 5rem;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" alt="" class="profile-wid-img"/>
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img
                        src="<?php if(Auth::user()->avatar != ''): ?> <?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('build/images/users/avatar-1.jpg')); ?> <?php endif; ?>"
                        alt="user-img" class="img-thumbnail rounded-circle"/>
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1 text-capitalize"><?php if(!is_null(auth()->user()->profile)): ?><?php echo e(auth()->user()->profile->first_name); ?> <?php echo e(auth()->user()->profile->surname); ?><?php else: ?><?php echo e(auth()->user()->name); ?><?php endif; ?></h3>
                    <p class="text-white-75 text-capitalize"><?php if(!is_null(auth()->user()->profile)): ?><?php echo e(auth()->user()->profile->section); ?><?php endif; ?></p>
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
            <!--end col-->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Upload Images</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <span
                                                        class="text-danger">Images must be, <br> * 1920x1080 pixels <br> * Maximum file size 2Mb
                                                    </span>
                                                    <br>
                                                    <br>

                                                    <form
                                                        <?php if(isset($entries[0])): ?>
                                                        action="<?php echo e(route('upload_image.update',$entries[0]->id)); ?>"
                                                        <?php else: ?>
                                                        action="<?php echo e(route('upload_image')); ?>"
                                                        <?php endif; ?>
                                                        method="POST"
                                                        class="myForm"
                                                        enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="image_caption" class="form-label">Image
                                                                    1<span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="hidden" name="exhibition_id" value="1">
                                                                <input type="hidden" name="count" value="1">
                                                                <input type="text"
                                                                       class="form-control <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image_caption"
                                                                       value="<?php echo e(isset($entries[0])?$entries[0]->image_caption:''); ?>"
                                                                       id="image_caption"
                                                                       placeholder="Title of the image">
                                                                <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">
                                                                    Please enter caption
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image" value="<?php echo e(old('image')); ?>"
                                                                       id="image"
                                                                       placeholder="Enter image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">Please enter image</div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <button
                                                                    class="btn <?php if(isset($entries[0])): ?> btn-success <?php else: ?> btn-primary <?php endif; ?>"
                                                                    type="submit"><?php if(isset($entries[0])): ?> Update <?php else: ?>
                                                                        Submit <?php endif; ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if(!is_null($entries) && isset($entries[0]) && $entries[0]->count == 1): ?>
                                                        <img src="<?php echo e(asset($entries[0]->image)); ?>" id="image_image_1"
                                                             class="entry-image"
                                                             alt="" width="150">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form class="entry-form"
                                                        <?php if(isset($entries[1])): ?>action="<?php echo e(route('upload_image',$entries[1]->id)); ?>"
                                                        <?php else: ?> action="<?php echo e(route('upload_image')); ?>"
                                                        <?php endif; ?> method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php if(isset($entries[1])): ?>
                                                            <?php echo method_field('PUT'); ?>
                                                        <?php endif; ?>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="image_caption" class="form-label">Image
                                                                    2<span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="hidden" name="exhibition_id" value="1">
                                                                <input type="hidden" name="count" value="2">
                                                                <input type="text"
                                                                       class="form-control <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image_caption"
                                                                       value="<?php echo e(isset($entries[1])?$entries[1]->image_caption:''); ?>"
                                                                       id="image_caption"
                                                                       placeholder="Title of the image">
                                                                <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">
                                                                    Please enter caption
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image" value="<?php echo e(old('image')); ?>"
                                                                       id="image"
                                                                       placeholder="Enter image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">Please enter image</div>
                                                            </div>
                                                            <div class="col-md-1">

                                                                <button
                                                                    class="btn <?php if(isset($entries[1])): ?> btn-success <?php else: ?> btn-primary <?php endif; ?>"
                                                                    type="submit"><?php if(isset($entries[1])): ?> Update <?php else: ?>
                                                                        Submit <?php endif; ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if(!is_null($entries) && isset($entries[1]) && $entries[1]->count == 2): ?>
                                                        <img src="<?php echo e(asset($entries[1]->image)); ?>" id="image_image_2"
                                                             alt="" width="150" class="entry-image"
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form  class="entry-form"
                                                        <?php if(isset($entries[2])): ?>action="<?php echo e(route('upload_image',$entries[2]->id)); ?>"
                                                        <?php else: ?> action="<?php echo e(route('upload_image')); ?>"
                                                        <?php endif; ?> method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php if(isset($entries[2])): ?>
                                                            <?php echo method_field('PUT'); ?>
                                                        <?php endif; ?>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="image_caption" class="form-label">Image
                                                                    3<span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="hidden" name="exhibition_id" value="1">
                                                                <input type="hidden" name="count" value="3">
                                                                <input type="text"
                                                                       class="form-control <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image_caption"
                                                                       value="<?php echo e(isset($entries[2])?$entries[2]->image_caption:''); ?>"
                                                                       id="image_caption"
                                                                       placeholder="Title of the image">
                                                                <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">
                                                                    Please enter caption
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image" value="<?php echo e(old('image')); ?>"
                                                                       id="image"
                                                                       placeholder="Enter image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">Please enter image</div>
                                                            </div>
                                                            <div class="col-md-1">

                                                                <button
                                                                    class="btn <?php if(isset($entries[2])): ?> btn-success <?php else: ?> btn-primary <?php endif; ?>"
                                                                    type="submit"><?php if(isset($entries[2])): ?> Update <?php else: ?>
                                                                        Submit <?php endif; ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if(!is_null($entries) && isset($entries[2]) && $entries[2]->count == 3): ?>
                                                        <img src="<?php echo e(asset($entries[2]->image)); ?>" id="image_image_3"
                                                             alt="" width="150"
                                                             class="entry-image"
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form  class="entry-form"
                                                        <?php if(isset($entries[3])): ?>action="<?php echo e(route('upload_image',$entries[3]->id)); ?>"
                                                        <?php else: ?> action="<?php echo e(route('upload_image')); ?>"
                                                        <?php endif; ?> method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php if(isset($entries[3])): ?>
                                                            <?php echo method_field('PUT'); ?>
                                                        <?php endif; ?>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="image_caption" class="form-label">Image
                                                                    4<span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="hidden" name="exhibition_id" value="1">
                                                                <input type="hidden" name="count" value="4">
                                                                <input type="text"
                                                                       class="form-control <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image_caption"
                                                                       value="<?php echo e(isset($entries[3])?$entries[3]->image_caption:''); ?>"
                                                                       id="image_caption"
                                                                       placeholder="Title of the image">
                                                                <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">
                                                                    Please enter caption
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image" value="<?php echo e(old('image')); ?>"
                                                                       id="image"
                                                                       placeholder="Enter image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">Please enter image</div>
                                                            </div>
                                                            <div class="col-md-1">

                                                                <button
                                                                    class="btn <?php if(isset($entries[3])): ?> btn-success <?php else: ?> btn-primary <?php endif; ?>"
                                                                    type="submit"><?php if(isset($entries[3])): ?> Update <?php else: ?>
                                                                        Submit <?php endif; ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if(!is_null($entries) && isset($entries[3]) && $entries[3]->count == 4): ?>
                                                        <img src="<?php echo e(asset($entries[3]->image)); ?>" id="image_image_4"
                                                             alt="" width="150"
                                                             class="entry-image"
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form  class="entry-form"
                                                        <?php if(isset($entries[4])): ?>action="<?php echo e(route('upload_image',$entries[4]->id)); ?>"
                                                        <?php else: ?> action="<?php echo e(route('upload_image')); ?>"
                                                        <?php endif; ?> method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php if(isset($entries[4])): ?>
                                                            <?php echo method_field('PUT'); ?>
                                                        <?php endif; ?>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="image_caption" class="form-label">Image
                                                                    5<span
                                                                        class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="hidden" name="exhibition_id" value="1">
                                                                <input type="hidden" name="count" value="5">
                                                                <input type="text"
                                                                       class="form-control <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image_caption"
                                                                       value="<?php echo e(isset($entries[4])?$entries[4]->image_caption:''); ?>"
                                                                       id="image_caption"
                                                                       placeholder="Title of the image">
                                                                <?php $__errorArgs = ['image_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">
                                                                    Please enter caption
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                       name="image" value="<?php echo e(old('image')); ?>"
                                                                       id="image"
                                                                       placeholder="Enter image">
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback"
                                                                      role="alert"><strong><?php echo e($message); ?></strong></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="invalid-feedback">Please enter image</div>
                                                            </div>
                                                            <div class="col-md-1">

                                                                <button
                                                                    class="btn <?php if(isset($entries[4])): ?> btn-success <?php else: ?> btn-primary <?php endif; ?>"
                                                                    type="submit"><?php if(isset($entries[4])): ?> Update <?php else: ?>
                                                                        Submit <?php endif; ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if(!is_null($entries) && isset($entries[4]) && $entries[4]->count == 5): ?>
                                                        <img src="<?php echo e(asset($entries[4]->image)); ?>" id="image_image_5"
                                                             alt="" width="150"
                                                             class="entry-image"
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('script'); ?>
                <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>

                <script src="<?php echo e(URL::asset('build/js/pages/profile.init.js')); ?>"></script>
                <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        // Attach change event handler to radio buttons
                        $('input[type="radio"]').change(function () {
                            var selectedOption = $('input[type="radio"]:checked').val();

                            // Show the corresponding div segment based on the selected option
                            if (selectedOption === 'school') {
                                $('.school').show(500);
                                $('.napsl').hide(500);
                                $('.member').hide(500);
                            } else if (selectedOption === 'student') {
                                $('.napsl').show(500);
                                $('.school').hide(500);
                                $('.member').hide(500);
                            } else if (selectedOption === 'member') {
                                $('.napsl').hide(500);
                                $('.school').hide(500);
                                $('.member').show(500);
                            }
                        });
                    });

                    $('.btn-success').click(function (e){
                       e.preventDefault();
                        var actionUrl = $('.myForm').attr('action');
                        var formData = $('.myForm').serialize(); // Serialize form data

                        $.ajax({
                            type: 'POST',
                            url: actionUrl,
                            data: formData,
                            success: function(response) {
                                // Handle the success response from the server
                                console.log('Post request successful');
                                console.log(response); // Log response from the server
                            },
                            error: function(xhr, status, error) {
                                // Handle errors
                                console.error('Error:', error);
                            }
                        });
                    });
                </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_exhibitions/resources/views/upload_entries.blade.php ENDPATH**/ ?>