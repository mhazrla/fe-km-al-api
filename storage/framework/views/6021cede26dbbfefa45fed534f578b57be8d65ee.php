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
                        <h5 class="title align-text-center"><?php echo e(__('Detail Personil')); ?></h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?php echo e(asset('assets')); ?>/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray"
                                    src="<?php echo e($data['foto'] ? $data['foto'] : 'asset(\'assets/img/default-avatar.png\')'); ?>">

                                <h5 class="title"><?php echo e($data['nama']); ?></h5>
                            </a>
                            <p class="description">
                                NRP : <?php echo e($data['nrp']); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('profile.update')); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Organization')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e($data['organization']['organization_name']); ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e($data['title']['title_name']); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Status')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e($data['status']['status_name']); ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Place of Birth')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e($data['tmp_lahir']); ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Time of Birth')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e($data['tgl_lahir']); ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Address')); ?></label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="10" readonly><?php echo e($data['alamat']); ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/pers/detail.blade.php ENDPATH**/ ?>