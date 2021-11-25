@extends('layouts.master_admin')


@section('title')
    Users
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
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users [ {{ $count_users }} ]</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable users
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>username</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($all_users as $user)

                                        <tr>
                                            <td class="p-0 m-0 text-center"><img
                                                    src="{{ URL::asset('img/' . $user->pic) }}" alt="" width="70px"
                                                    height="70px"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <span class="dropdown pl-2">
                                                    <button class="btn btn-outline-secondary p-1 pr-2 pl-2" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu bg-warning"
                                                        aria-labelledby="dropdownMenuButton">

                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#deleteUserId"
                                                            data-username="{{ $user->username }}"
                                                            data-id="{{ $user->id }}" data-toggle="modal"
                                                            href="#deleteUserId">Delete</a>

                                                        <a class="dropdown-item" href="/users_update/{{ $user->id }}">Edite</a>
                                                        <a class="dropdown-item" href="/profile/{{ $user->id }}">Show
                                                            profile</a>
                                                        <a class="dropdown-item" href="/msgs/{{ $user->id }}">Open messages</a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modal delete user -->
        <div class="modal fade" id="deleteUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('delete_user') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" name="id" id="id">
                            you are sure deleted user?
                            <input type="text" name="username" id="username" class="form-control" disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                            <button type="submit" class="btn btn-danger">Yes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop

    @section('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $('#deleteUserId').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var username = button.data('username')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #username').val(username);
            })
        </script>


        @if (session()->has('success_delete'))
            <script>
                swal("Done", "{{ session()->get('success_delete') }}", "success");
            </script>
        @endif
       
    @stop
