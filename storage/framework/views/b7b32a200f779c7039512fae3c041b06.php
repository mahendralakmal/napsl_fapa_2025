<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
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
                                    class="d-none d-md-inline-block">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted"><?php if(!is_null(auth()->user()->profile)): ?><?php echo e(auth()->user()->profile->first_name); ?> <?php echo e(auth()->user()->profile->surname); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Mobile :</th>
                                                    <td class="text-muted"><?php if(!is_null(auth()->user()->profile)): ?><?php echo e(auth()->user()->profile->telephone); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted"><?php echo e(auth()->user()->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Category</th>
                                                    <td class="text-muted"><?php if(!is_null(auth()->user()->profile)): ?><?php echo e(auth()->user()->profile->section); ?><?php endif; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Update Profile</h5>

                                        <form id="submitForm" <?php if(is_null(auth()->user()->profile)): ?>action="<?php echo e(route('user_profile.store')); ?>" method="POST"
                                              <?php else: ?> action="<?php echo e(route('user_profile.store',auth()->user()->profile->id)); ?>" method="PUT" <?php endif; ?>>



                                            <?php echo csrf_field(); ?>
                                            <div class="col-xxl-5">
                                                <input type="hidden" id="id" name="id"
                                                       <?php if(!is_null(auth()->user()->profile)): ?>value="<?php echo e(auth()->user()->profile->id); ?>"<?php endif; ?>>
                                                <div class="mb-3">
                                                    <label class="form-label d-block">Section <span
                                                            class="text-danger">*</span></label>
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="school" value="school">
                                                            <label class="form-check-label" for="school">
                                                                School
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="student" value="student">
                                                            <label class="form-check-label" for="student">
                                                                NAPSL Students
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="member" value="member" checked>
                                                            <label class="form-check-label" for="member">
                                                                Members Open
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name(s)
                                                        <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="first_name" value="<?php echo e(old('first_name')); ?>"
                                                           id="first_name"
                                                           placeholder="Enter first_name">
                                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <div class="invalid-feedback">
                                                        Please enter first name
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="surname" class="form-label">Surname <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="surname" value="<?php echo e(old('surname')); ?>"
                                                           id="surname"
                                                           placeholder="Enter surname">
                                                    <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <div class="invalid-feedback">
                                                        Please enter surname
                                                    </div>
                                                </div>
                                                <div class="school" style="display: none">
                                                    <div class="mb-3">
                                                        <label for="age" class="form-label">Age <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="age" value="<?php echo e(old('age')); ?>" id="age"
                                                               placeholder="Enter age">
                                                        <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter age
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="grade" class="form-label">Grade <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="grade" value="<?php echo e(old('grade')); ?>"
                                                               id="grade"
                                                               placeholder="Enter grade">
                                                        <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter grade
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="school" class="form-label">Name of the
                                                            school <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control <?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="school" value="<?php echo e(old('school')); ?>"
                                                               id="school"
                                                               placeholder="Enter school">
                                                        <?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter school name
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="napsl" style="display: none">
                                                    <div class="mb-3">
                                                        <label for="year_of_study" class="form-label">Year
                                                            of study <span
                                                                class="text-danger">*</span></label>
                                                        <select name="year_of_study" id="year_of_study"
                                                                class="form-control <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                        <?php $__errorArgs = ['year_of_study'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter year of study
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="registration_number" class="form-label">Registration
                                                            Number
                                                            <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="registration_number"
                                                               value="<?php echo e(old('registration_number')); ?>"
                                                               id="registration_number"
                                                               placeholder="Enter registration_number">
                                                        <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter registration number
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="member" style="display: block">
                                                    <div class="mb-3">
                                                        <label for="membership_number" class="form-label">Membership
                                                            Number
                                                            <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control <?php $__errorArgs = ['membership_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="membership_number"
                                                               value="<?php echo e(old('membership_number')); ?>"
                                                               id="membership_number"
                                                               placeholder="Enter membership_number"
                                                        >
                                                        <?php $__errorArgs = ['membership_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <div class="invalid-feedback">
                                                            Please enter membership number
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Telephone/
                                                        Mobile <span
                                                            class="text-danger">*</span></label>
                                                    <input type="tel"
                                                           class="form-control <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           name="telephone" value="<?php echo e(old('telephone')); ?>"
                                                           id="telephone"
                                                           placeholder="Enter telephone">
                                                    <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <div class="invalid-feedback">
                                                        Please enter telephone/ Mobile
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="checkbox" name="cetify" id="certify">
                                                    <label for="telephone" class="form-label">&nbsp;&nbsp; I accept the rules and regulations of the competition<span
                                                        class="text-danger">*</span></label>
                                                    <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($message); ?></strong>
                                                                                            </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <div class="invalid-feedback">
                                                        Please enter telephone/ Mobile
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">Save
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-content-->
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
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_exhibitions/resources/views/pages-profile.blade.php ENDPATH**/ ?>