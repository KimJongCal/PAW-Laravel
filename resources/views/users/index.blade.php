@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Table Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('alert-success'))
                        <div class="alert alert-success">
                            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                        </div>
                    @endif
                    <hr>
                    <a class="btn btn-primary" href="{{ route('users.create') }}">Add Users</a>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->email }}</td>
                                <td>
                                <form action="{{ route('users.destroy', $datas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-warning" href="{{ route('users.edit',$datas->id) }}">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
