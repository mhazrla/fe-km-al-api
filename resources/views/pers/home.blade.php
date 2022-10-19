@extends('layouts.app')

@section('content')
    <div class="panel-header panel-header-sm container-fluid">
        <div class="container">
            <div class="row">
                <h5 class="title align-text-center">{{ __('Dashboard') }}</h5>

            </div>
        </div>
    </div>
    <div class="container">

        <div class="col">
            <div class="row ">
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Tinggi') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraTinggi }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Menengah') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraMenengah }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Pertama') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraPertama }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Bintara Tinggi') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $bintaraTinggi }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Bintara') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $bintara }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Tamtama') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $tamtama }}</h6>
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
                            <h1>Live Search</h1>
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
                                    <th>Title</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pers as $per)
                                    <tr>
                                        <input type="hidden" class="delete_id" value="{{ $per['per_id'] }}">

                                        <td class="text-center">
                                            <img class="avatar border-gray"
                                                src="{{ $per['foto'] ? $per['foto'] : 'asset(\'assets/img/default-avatar.png\')' }}">
                                        </td>
                                        <td>{{ $per['nrp'] }}</td>
                                        <td>{{ $per['nama'] }}</td>
                                        <td>{{ $per['title']['title_name'] }}</td>
                                        <td class="td-actions text-center d-flex justify-content-around">
                                            <a href="{{ route('show', $per['per_id']) }}"><button type="button"
                                                    rel="tooltip" class="btn btn-info btn-sm">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </button></a>
                                            <a href="{{ route('edit', $per['per_id']) }}"><button type="button"
                                                    rel="tooltip" class="btn btn-success btn-sm">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button></a>
                                            <form action="{{ route('destroy', $per['per_id']) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm btn-delete"><i
                                                        class="now-ui-icons ui-1_simple-remove"></i></button>
                                            </form>

                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            no data
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
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
@endpush
