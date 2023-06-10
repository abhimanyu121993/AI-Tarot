@extends('admin.includes.layout', ['breadcrumb_title' => 'Fetch Permission'])
@section('title', 'Fetch Permissions')

@section('main-content')
    <div class="card">
        <div class="card-header">
            Fetch Permission
        </div>
        <div class="card-body">
            <form action="{{ route('admin.fetchPermission') }}" method="post">
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-6">
                        <label for="role" class="form-label">Role Name</label>
                        @csrf
                        <select name="role" class="form-select" onChange='permissions(this)'>
                            <option value="" selected hidden>--Select Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-md-6 ">
                        <button class="btn btn-primary mt-4" type="submit">Fetch</button>
                    </div>
                    <!--end col-->
                </div>
            </form>
        </div>
    </div>

    @if (isset($selectrole))
        <div class="card">
            <div class="card-header">
                Permissions
            </div>
            <div class="card-body">
                <form action="{{ route('admin.assignPermission') }}" method="post">
                    @csrf
                    <input type="hidden" name='roleid' value="{{ $selectrole->id }}">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Permissions Name</th>
                                <th>Menu</th>
                                <th>Create</th>
                                <th>Read</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!isset($permissionnames))
                                <tr>
                                    <td colspan="7">No permission assigned</td>
                                </tr>
                            @else
                                @foreach ($permissionnames as $pname)
                                    <tr>
                                        <th>
                                            {{ $pname->name }}
                                        </th>
                                        @foreach ($pname->permissions as $permission)
                                            <td>
                                                <input type="checkbox" class="form-check" value="{{ $permission->name }}"
                                                    name='rolepermissions[]'
                                                    {{ $selectrole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit"> Update Permission</button>
                </form>
            </div>
        </div>
    @endif
@endsection

@section('script-area')
@endsection
