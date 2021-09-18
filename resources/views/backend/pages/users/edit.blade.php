@extends('backend.layout.master')

@section('styles')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }

    </style>
    <link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" />

@endsection()

@section('admin-content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Edit--{{ $user->name }}</h4>
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label" for="name">User Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label" for="email">User Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"
                                value="{{ $user->email }}">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label" for="password">Assign Roles</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>


@endsection()

@section('script')
    {{-- @include('backend.pages.roles.partials.script') --}}
    <script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection()
