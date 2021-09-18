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
                            <h4 class="card-title">Role Edit--{{ $role->name }}</h4>
                            <form class="row g-3" action="{{ route('admin.roles.update',$role->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                  <label class="form-label">Role Name</label>
                                  <input type="text" value="{{ $role->name }}" placeholder="Please enter role name" class="form-control "  name="name" >
                                  @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Permissions</label>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" " {{ App\User::roleHasPermission($role,$permissions) ? 'checked':'' }} class="form-check-input" value="1" id="checkPermissionAll" >
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr />
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($permissionGroups as $group)
                                    <div class="row">
                                        @php
                                            $permissions = App\User::getPermissionByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        <div class="col-5">
                                            <div class="form-check mb-3">
                                                <input type="checkbox"  {{ App\User::roleHasPermission($role,$permissions) ? 'checked':'' }} class="form-check-input" id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox',this)" >
                                                <label class="form-check-label" for="checkPermission_">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-7 role-{{ $i }}-management-checkbox">

                                            @foreach ($permissions as $permission)
                                            <div class="form-check mb-3">
                                                <input type="checkbox" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked':'' }} class="form-check-input" value="{{ $permission->name }}" id="checkPermission_{{ $permission->id }}" >
                                                <label class="form-check-label" for="checkPermission_{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>

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
