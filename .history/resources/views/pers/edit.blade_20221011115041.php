@extends('layouts.app', [
    'namePage' => 'Add Personil',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . '/img/bg14.jpg',
])

@section('content')
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
                        <h5 class="title align-text-center">{{ __('Add Data') }}</h5>
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
                        <form method="post" action="{{ route('update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            @include('alerts.success')
                            <input type="hidden" name="per_id" value="{{ $data['per_id'] }}">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <label>{{ __(' Name') }}</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Full Name"
                                            value="{{ $data['nama'] }}">
                                        @include('alerts.feedback', ['field' => 'nama'])
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>{{ __(' NRP') }}</label>
                                        <input type="text" name="nrp" class="form-control" placeholder="NRP"
                                            value="{{ $data['nrp'] }}">
                                        @include('alerts.feedback', ['field' => 'nrp'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group ">

                                        @include('alerts.feedback', ['field' => 'status_id'])
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>{{ __(' Title') }}</label>

                                        @include('alerts.feedback', ['field' => 'title_id'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <label>{{ __(' Place of Birth') }}</label>
                                        <input type="text" name="tmp_lahir" class="form-control"
                                            placeholder="Place of Birth" value="{{ $data['tmp_lahir'] }}">
                                        @include('alerts.feedback', ['field' => 'tmp_lahir'])
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group ">
                                        <label>{{ __(' Date of Birth') }}</label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                            placeholder="Date of Birth" value="{{ $data['tgl_lahir'] }}">
                                        @include('alerts.feedback', ['field' => 'tgl_lahir'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>{{ __(' Photo') }}</label>
                                        <input type="file" name="foto" class="form-control">
                                        @include('alerts.feedback', ['field' => 'foto'])
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>{{ __(' Address') }}</label>
                                        <textarea class="form-control" placeholder="Full Address" name="alamat" style="height: 100px">{{ $data['alamat'] }}</textarea>
                                        @include('alerts.feedback', ['field' => 'alamat'])
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ">
                                <button type="submit"
                                    class="btn btn-round flex-fill btn-dark">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });

        // API CALL
    </script>
@endpush
