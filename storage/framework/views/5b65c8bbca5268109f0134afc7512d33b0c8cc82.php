<?php $__env->startSection('content'); ?>
    <div class="panel-header panel-header-sm container-fluid">
        <div class="container">
            <div class="row">
                <ul class="d-flex list-unstyled">
                    <li>
                        <a href="javascript:history.back()" class="mr-3">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAAD1ElEQVRYhe2X32scVRTHP+fOhtSCTXbvrNY2tU8lFh+U0oiIiBrzpu0K4h8gWkrVhwbaFbpbBjcF02IjRUVQ/AuUNsmLNImIiPiz4oPaqk9NouLeSVIfUomZOT7MJGw3u5tsFPrS78vO3jlzvp97ziznLtzSTZa0E1zy/V5UC4IMADuBXemtaWAGdMITuRA49/P/CnDC9/cbZRh4fIN5pxCKFee+/U8Ah6Bju82PKHokjZ1T4TwwBlz52/NmALZEUY9RvUfhAEgByAEq6JsmDAcDWG4b4JWurmxHpuND4DFgEfSsp3ommJv7qxV0kMtti0WOKzII3AZMedHyM8HCwsKGAQ5Bx53W/4ik5LOxUDjl3DetjOtV7r7jPrx4FNgtyqdmzg0EsFQfZxo9vN3mR1LzaU94oF1zgMrCn997wkPAjAqPRNaeaRS3pgLpC/cVcB0jD1eq1e8aPRiAWba2dygMf2oFEvj+vkj5DOj0hL7AuUu199dUIH3bBfRsK/PI2ncF+brk+4+2BHDuEugIYKIk941+tV9Kvt9LUvo5T7VhyVbMQZ4DBNWGbazVUhyfBuaBJ0r5/J6mAKL6NIAK55u87RJZ/63UfFHQA0Nh+PF6AMPz89cUvQCAaqEpAEg/gFEdr08SgClb+x5wGFhU9KlXw3BqPfMao3EAURloAcBuAGPMD3Xrm9p5rWKRH5Mrvbt2PVMXd1f6+Uetedn6b5PsHGCrIpNl669rWgnd6q8sIzIbqUIyQ1ZVXwFdN+tmFUUrXnHtcn0FfgduR3UHsDLRtBK6I+mOD5O2oJ3+AyCyI736rXa5vgJXAWLVvXXr6oXuRdD3SVowVrJ2o5MRgBjSnHK1BYBOACRT7UYFEFfC8HngHWCrIOMnre3fOIA5CKCiF5sCqMhoSlkIcrltDfJsqhLFbLZL0GRTImNNAYacuwJMAblY5HijZAHEXhi+kEIoInGjuFp1mkwRyIJcHKpWf2kKkBBSBFSRwcD397WCULRvyLlPWpmf8P39ih4FYs9QXGvXQCetPafIy8BMjD54KgxnW5k0Nbd2p0G+AHoQ3qg4d7Q+puEgMWE4SNKKHoN8Wba2r13zIJ+/3yCfAz3ApOfcsUZxTY9kQXd3d+RlPgD6geugI0txfHp4fv5aK+NiNtvVaTLFtOxbQCa86J9n2zqSrUJAJrL2dZCXSKo1DzqqMJqByxgzA0Ac98SwNz2UHgSyQIxwznPu2KYOpbUq53L3IuY14MmNxAOTnlCsP/1sGmBFpXx+D6qFZKTqLpL+AkyDTCPpH5Nq9dd28t7STdW/Pnx34qtx+LgAAAAASUVORK5CYII=">
                        </a>
                    </li>
                    <li>
                        <h5 class="title align-text-center"><?php echo e(__('Add Data')); ?></h5>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-tasks">
                    <div class="card-header">
                        <form method="post" action="<?php echo e(route('store')); ?>" autocomplete="off" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <label><?php echo e(__(' Name')); ?></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Full Name"
                                            value="<?php echo e(old('nama')); ?>">
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'nama'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo e(__(' NRP')); ?></label>
                                        <input type="text" name="nrp" class="form-control" placeholder="NRP"
                                            value="<?php echo e(old('nrp')); ?>">
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'nrp'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo e(__(' Organization')); ?></label>
                                        <select class="form-control" name="organization_id">
                                            <option selected disabled>Select Organization</option>
                                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($organization['organization_id']); ?>"
                                                    <?php if($organization['organization_id'] == old('organization_id')): ?> selected <?php endif; ?>>
                                                    <?php echo e($organization['organization_name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'title_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo e(__(' Title')); ?></label>
                                        <select class="form-control" name="title_id">
                                            <option selected disabled>Select Title</option>
                                            <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($title['title_id']); ?>"
                                                    <?php if($title['title_id'] == old('title_id')): ?> selected <?php endif; ?>>
                                                    <?php echo e($title['title_name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'title_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label><?php echo e(__(' Status')); ?></label>
                                        <select class="form-control" name="status_id">
                                            <option selected disabled>Select Status</option>
                                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status['status_id']); ?>"
                                                    <?php if($status['status_id'] == old('status_id')): ?> selected <?php endif; ?>>
                                                    <?php echo e($status['status_name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'status_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <label><?php echo e(__(' Place of Birth')); ?></label>
                                        <input type="text" name="tmp_lahir" class="form-control"
                                            placeholder="Place of Birth" value="<?php echo e(old('tmp_lahir')); ?>">
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'tmp_lahir'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <label><?php echo e(__(' Date of Birth')); ?></label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                            placeholder="Date of Birth" value="<?php echo e(old('tgl_lahir')); ?>">
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'tgl_lahir'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label><?php echo e(__(' Photo')); ?></label>
                                        <input type="file" name="foto" class="form-control">
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'foto'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label><?php echo e(__(' Address')); ?></label>
                                        <textarea class="form-control" placeholder="Full Address" name="alamat" style="height: 100px"><?php echo e(old('alamat')); ?></textarea>
                                        <?php echo $__env->make('alerts.feedback', ['field' => 'alamat'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ">
                                <button type="submit"
                                    class="btn btn-round flex-fill btn-dark"><?php echo e(__('Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });

        // API CALL
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Create',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/pers/create.blade.php ENDPATH**/ ?>