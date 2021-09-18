@extends('backend.layout.master')

@section('styles')

    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

@endsection()

@section('admin-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div style="display: flex;justify-content:space-between;">
                        <h4 class="card-title float-left">Roles List</h4>
                        <p class="float-right">
                            <a class="btn btn-primary float-left" href="{{ route('admin.admins.create') }}">Create new
                                admin</a>
                        </p>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered "
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10%">Sl</th>
                                <th width="20%">Name</th>
                                <th width="20%">Email</th>
                                <th width="30%">Roles</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->index + 1 }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @foreach ($admin->roles as $role)
                                            <span class="badge bg-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('role.edit'))
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}"><i
                                                    class="far fa-edit"></i></a>
                                        @endif

                                        <form id="delete-form-{{ $admin->id }}"
                                            action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST"
                                            class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @if (Auth::guard('admin')->user()->can('role.edit'))
                                            <a href=""
                                                onclick="event.preventDefault();deleteConfirmation('{{ $admin->id }}');"><i
                                                    class="fas fa-trash"></i></a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>



@endsection()

@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

    <script>
        function deleteConfirmation(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })

        }
        $('#datatable-buttons').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    title: 'Sold_Products_' + $("#date").val() + '-' + $("#date2").val(),
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'pdf',
                    filename: function() {
                        return $('#year').val() + '-' + $('#month').val() + ' - Data comparaison';
                    },
                    messageBottom: null,
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'print',
                    messageTop: function() {
                        printCounter++;

                        if (printCounter === 1) {
                            return 'This is the first time you have printed this document.';
                        } else {
                            return 'You have printed this document ' + printCounter + ' times';
                        }
                    },
                    messageBottom: null
                }
            ]
        });
        // var table = $('#datatable-buttons').DataTable();
    </script>
@endsection()
