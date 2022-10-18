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
        <div class="row">
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Tinggi') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraTinggi }}</h6>
                        </div>
                    </div>
                </div>
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Menengah') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraMenengah }}</h6>
                        </div>
                    </div>
                </div>
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Perwira Pertama') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $perwiraPertama}}</h6>
                        </div>
                    </div>
                </div>
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Bintara Tinggi') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $bintaraTinggi}}</h6>
                        </div>
                    </div>
                </div>
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Bintara') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $bintara}}</h6>
                        </div>
                    </div>
                </div>
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ __('Tamtama') }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $tamtama}}</h6>
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
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#Modal{{ $per['per_id'] }}">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>

                                            {{-- <form action="{{ route('destroy', $per['per_id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-round btn-icon"
                                                    onclick="return alert('Delete Data?')">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>

                                            </form> --}}

                                            {{-- MODAL DELETE --}}
                                            <div class="modal fade" id="Modal{{ $per['per_id'] }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                            <h5 class="txtInfo modal-title">Are you sure?</h5>
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal" aria-label="Close"> X
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-white">
                                                            <p>data will be deleted forever! </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btnClose"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('destroy', $per['per_id']) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btnDelete">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- MODAL DELETE --}}
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
