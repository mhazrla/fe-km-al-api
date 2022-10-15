@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
])

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
            @forelse ($titles as $title)
                <div class="mb-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="card" style="height: 8rem;">
                        <div class="card-body text-center">
                            <h6 class="mb-3 text-muted">{{ $title['title_name'] }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">0</h6>
                        </div>
                    </div>
                </div>
            @empty
                no datas
            @endforelse
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
                                        <td class="text-center"><img class="avatar border-gray" src="{{ $per['foto'] }}"
                                                alt="..."></td>
                                        <td>{{ $per['nrp'] }}</td>
                                        <td>{{ $per['nama'] }}</td>
                                        <td>{{ $per['title']['title_name'] }}</td>
                                        <td class="td-actions text-center d-flex justify-content-around">
                                            <a href="{{ route('show', $per['per_id']) }}"><button type="button"
                                                    rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                                    <i class="now-ui-icons users_single-02"></i>
                                                </button></a>
                                            <a href="{{ route('edit', $per['per_id']) }}"><button type="button"
                                                    rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button></a>

                                            <form action="{{ route('destroy', $per['per_id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-round btn-icon"
                                                    onclick="return alert('Delete Data?')">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>

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

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
