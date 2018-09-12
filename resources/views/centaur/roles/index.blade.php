@extends('Centaur::layout')

@section('title', 'Uloge')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-success btn-lg" href="{{ route('roles.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Kreiraj Ulogu
            </a>
        </div>
        <h1>Uloge</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ime</th>
                            <th>Slug</th>
                            <th>Dozvole</th>
                            <th>Mogućnosti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ implode(", ", array_keys($role->permissions)) }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Promijeni
                                    </a>
                                    <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-danger" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Izbriši
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop