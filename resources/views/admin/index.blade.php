@extends('layouts.master_admin')


@section('title')
    Admin
@endsection


@section('style')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@stop

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4>Count Users</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $count_users }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <h4>Today's Users</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $today_users }}</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h4>All Messages</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $count_msgs }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                <h4>Today's msg</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $today_msgs }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h4>All visits</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $coun_v }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <h4>Today's visits</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="lead">{{ $today_v }}</p>
                            </div>
                        </div>
                    </div>
            

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        last 50 members
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>username</th>
                                        <th>gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($all_users as $user)


                                        <tr>
                                            <td class="p-0 m-0 text-center"><img src="{{ URL::asset('img/' . $user->pic) }}"
                                                    alt="" width="70px" height="70px"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    @stop