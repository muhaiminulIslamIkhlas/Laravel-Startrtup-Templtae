@extends('backend.layout.master')

@section('styles')
<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>

@endsection()

@section('admin-content')

<div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create New Role</h4>
                            <form class="row g-3" action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label class="form-label">Role Name</label>
                                  <input type="text" placeholder="Please enter role name" class="form-control "  name="name" >
                                  @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Permissions</label>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" " class="form-check-input" value="1" id="checkPermissionAll" >
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr />
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($permissionGroups as $group)
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox',this)" >
                                                <label class="form-check-label" for="checkPermission_">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-7 role-{{ $i }}-management-checkbox">
                                            @php
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                            @if ($permission->group_name == $group->name)
                                            <div class="form-check mb-3">
                                                <input type="checkbox" name="permissions[]" class="form-check-input" value="{{ $permission->name }}" id="checkPermission_{{ $permission->id }}" >
                                                <label class="form-check-label" for="checkPermission_{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @endif

                                            @php
                                                $j++;
                                            @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                    $i++;
                                @endphp
                                   @endforeach
                                </div>



                                <div class="col-12">
                                  <button class="btn btn-outline-success" type="submit">Save Role</button>
                                </div>
                              </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div>


@endsection()

@section('script')
@include('backend.pages.roles.partials.script')
@endsection()
