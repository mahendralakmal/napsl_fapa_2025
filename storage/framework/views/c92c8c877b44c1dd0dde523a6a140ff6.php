<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-lg-12">
            <div>
                
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xxl-5">
                                                <h5 class="card-title mb-3">Update Profile</h5>
                                                <form id="submitForm" <?php if(is_null(auth()->user()->profile)): ?>action="<?php echo e(route('user_profile.store')); ?>" method="POST"
                                                    <?php else: ?> action="<?php echo e(route('user_profile.store',auth()->user()->profile->id)); ?>" method="PUT" <?php endif; ?>>
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" id="id" name="id"
                                                        <?php if(!is_null(auth()->user()->profile)): ?>value="<?php echo e(auth()->user()->profile->id); ?>"<?php endif; ?>>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                        <select class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" id="title" required>
                                                            <option value="">Select Title</option>
                                                            <option value="Dr." <?php echo e(old('title') == 'Dr.' ? 'selected' : ''); ?>>Dr.</option>
                                                            <option value="Mr." <?php echo e(old('title') == 'Mr.' ? 'selected' : ''); ?>>Mr.</option>
                                                            <option value="Mrs." <?php echo e(old('title') == 'Mrs.' ? 'selected' : ''); ?>>Mrs.</option>
                                                            <option value="Ms." <?php echo e(old('title') == 'Ms.' ? 'selected' : ''); ?>>Ms.</option>
                                                        </select>
                                                        <?php $__errorArgs = ['title'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="name" value="<?php echo e(old('name')); ?>"
                                                            id="name"
                                                            placeholder="Enter your name" required>
                                                        <?php $__errorArgs = ['name'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="honors" class="form-label">Honors</label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['honors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="honors" value="<?php echo e(old('honors')); ?>"
                                                            id="honors"
                                                            placeholder="Enter honors (if any)">
                                                        <?php $__errorArgs = ['honors'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="club" class="form-label">Club</label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['club'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="club" value="<?php echo e(old('club')); ?>"
                                                            id="club"
                                                            placeholder="Enter club name">
                                                        <?php $__errorArgs = ['club'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                        <textarea type="text"
                                                            class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="address" value="<?php echo e(old('address')); ?>"
                                                            id="address"
                                                            placeholder="Enter address" required></textarea>
                                                        <?php $__errorArgs = ['address'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                                        <select class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" id="country" required>
                                                            <option value="">Select country</option>
                                                        </select>
                                                        <?php $__errorArgs = ['country'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email"
                                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="email" value="<?php echo e(old('email', auth()->user()->email)); ?>"
                                                            id="email"
                                                            placeholder="Enter email" required>
                                                        <?php $__errorArgs = ['email'];
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="telephone" class="form-label">Telephone <span class="text-danger">*</span></label>
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
                                                            placeholder="Enter telephone" required>
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
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="accept_rules" name="accept_rules" required>
                                                            <label class="form-check-label" for="accept_rules">
                                                                I accept the rules and conditions of the competition
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-primary" id="saveBtn" disabled>Save</button>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xxl-2"></div>
                                            <div class="col-xxl-5 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                                                <a href="<?php echo e(route('exhibition_entries.index')); ?>"
                                                   class="btn btn-primary<?php echo e(is_null(auth()->user()->fapa) ? ' disabled' : ''); ?>"
                                                   <?php echo e(is_null(auth()->user()->fapa) ? 'tabindex="-1" aria-disabled="true"' : ''); ?>>
                                                    Upload your entries
                                                </a>
                                            </div>
                                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        let countries = [];

        function formatCountry(country) {
            if (!country.id) return country.text;
            return $(
                `<span><img src="${country.flag}" class="me-2" style="width:20px;height:15px;"/>${country.dial_code} ${country.text.replace(country.dial_code, '')}</span>`
            );
        }

        $(document).ready(function() {
            // List of allowed country names (case-insensitive)
            const allowedCountries = [
                "Australia", "Bangladesh", "Bhutan", "Brunei", "China", "Hong Kong", "India", "Indonesia", "Japan",
                "Korea", "Macao", "Malaysia", "Mauritius", "Myanmar", "Nepal", "Pakistan", "Philippines", "Singapore",
                "Sri Lanka", "Taiwan", "Thailand", "USA", "Vietnam"
            ];

            // Fetch countries from restcountries.com
            $.ajax({
                url: 'https://restcountries.com/v3.1/all',
                method: 'GET',
                success: function(data) {
                    countries = data
                        .filter(c => allowedCountries.some(name =>
                            c.name.common.toLowerCase() === name.toLowerCase()
                        ))
                        .map(c => ({
                            id: c.name.common,
                            text: `${c.idd.root ? c.idd.root + (c.idd.suffixes ? c.idd.suffixes[0] : '') : ''} ${c.name.common}`,
                            dial_code: c.idd.root ? c.idd.root + (c.idd.suffixes ? c.idd.suffixes[0] : '') : '',
                            flag: c.flags && c.flags.png ? c.flags.png : ''
                        }))
                        .filter(c => c.dial_code.trim() !== '');

                    $('#country').select2({
                        data: countries,
                        templateResult: formatCountry,
                        templateSelection: formatCountry,
                        placeholder: "Select country",
                        allowClear: true,
                        width: '100%'
                    });
                }
            });

            // Set telephone input on country select
            $('#country').on('select2:select', function (e) {
                const selected = countries.find(c => c.id === e.params.data.id);
                if (selected) {
                    $('#telephone').val(selected.dial_code + ' ');
                }
            });

            // Fetch user profile data via AJAX
            $.ajax({
                url: "<?php echo e(route('profile.show')); ?>",
                method: "GET",
                dataType: "json",
                success: function(profile) {
                    if (profile) {
                        $('#title').val(profile.title).trigger('change');
                        $('#name').val(profile.name);
                        $('#honors').val(profile.honors);
                        $('#club').val(profile.club);
                        $('#address').val(profile.address);
                        $('#email').val(profile.email);
                        $('#telephone').val(profile.telephone);

                        // For country, set after Select2 is initialized and countries are loaded
                        let setCountry = function() {
                            if ($('#country').hasClass("select2-hidden-accessible")) {
                                $('#country').val(profile.country).trigger('change'); // profile.country should be the full country name
                            } else {
                                setTimeout(setCountry, 100);
                            }
                        };
                        setCountry();
                    }
                }
            });

            // Enable Save button only if checkbox is checked
            $('#accept_rules').on('change', function() {
                $('#saveBtn').prop('disabled', !this.checked);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_ex/resources/views/pages-profile.blade.php ENDPATH**/ ?>