<?php $__env->startSection('content'); ?>
    <div class="panel-header panel-header-sm container-fluid">
        <div class="container">
            <div class="row">
                <h5 class="title align-text-center"><?php echo e(__('Dashboard')); ?></h5>

            </div>
        </div>
    </div>
    <div class="container">

        <div class="col">
            <div class="row ">
                <div class="col-md-4 col-sm-12">
                    <div class="card" style="height: 12rem;">
                        <div class="card-header text-center ">
                            <img src="<?php echo e(asset('assets/img/logo-tni-ad.png')); ?>" alt="" width="30%"
                                height="70px">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted"><?php echo e(__('TNI - ANGKATAN DARAT')); ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo e($angkatanDarat); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card" style="height: 12rem;">
                        <div class="card-header text-center ">
                            <img src="<?php echo e(asset('assets/img/logo-tni-au.png')); ?>" alt="" width="30%"
                                height="70px">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted"><?php echo e(__('TNI - ANGKATAN UDARA')); ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo e($angkatanUdara); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card" style="height: 12rem;">
                        <div class="card-header text-center ">
                            <img src="<?php echo e(asset('assets/img/logo-tni-al.png')); ?>" alt="" width="30%"
                                height="70px">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted"><?php echo e(__('TNI - ANGKATAN LAUT')); ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo e($angkatanLaut); ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> DATA PERSONIL</h4>
                </div>
                <div class="card-body">
                    <form id="live-search" action="" class="styled" method="post">
                        <fieldset>
                            <input type="text" class="text-input" id="filter" placeholder="search" />
                            <span id="filter-count"></span>
                        </fieldset>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Organization</th>
                                    <th>Title</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $pers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <input type="hidden" class="delete_id" value="<?php echo e($per['per_id']); ?>">

                                        <td class="text-center">
                                            <img class="avatar border-gray"
                                                src="<?php echo e($per['foto'] ? $per['foto'] : 'asset(\'assets/img/default-avatar.png\')'); ?>">
                                        </td>
                                        <td><?php echo e($per['nrp']); ?></td>
                                        <td><?php echo e($per['nama']); ?></td>
                                        <td><?php echo e($per['organization']['organization_name']); ?></td>
                                        <td><?php echo e($per['title']['title_name']); ?></td>
                                        <td class="td-actions text-center d-flex justify-content-around">
                                            <a href="<?php echo e(route('show', $per['per_id'])); ?>"><button type="button"
                                                    rel="tooltip" class="btn btn-info btn-sm">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </button></a>
                                            <a href="<?php echo e(route('edit', $per['per_id'])); ?>"><button type="button"
                                                    rel="tooltip" class="btn btn-success btn-sm">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button></a>
                                            <form action="<?php echo e(route('destroy', $per['per_id'])); ?>" method="POST"
                                                class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger btn-sm btn-delete"><i
                                                        class="now-ui-icons ui-1_simple-remove"></i></button>
                                            </form>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            no data
                                        </td>
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

<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-delete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Data tidak akan bisa dipulihkan lagi",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'destroy/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

        $(document).ready(function() {
            $("#filter").keyup(function() {

                // Retrieve the input field text and reset the count to zero
                var filter = $(this).val(),
                    count = 0;

                // Loop through the comment list
                $("table tbody tr").each(function() {

                    // If the list item does not contain the text phrase fade it out
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).fadeOut();

                        // Show the list item if the phrase matches and increase the count by 1
                    } else {
                        $(this).show();
                        count++;
                    }
                });

                // Update the count
                var numberItems = count;
                $("#filter-count").text("Number of Filter = " + count);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Home',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/pers/home.blade.php ENDPATH**/ ?>