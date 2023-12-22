@extends('welcome')

@section('JUDUL', 'Data Pengguna')

@section('CONTENT')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pengguna</h3>
            <a href="/user/create" class="btn btn-sm btn-success float-end">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-collapse">
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Opsi</th>
                @foreach ($user as $index => $u)
                    <tr>
                        <td>{{ ($user->currentPage() - 1) * $user->perPage() + $index + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>
                            <form action="user/{{ $u->id }}" method="post">
                                <a href="user/{{ $u->id }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="user/{{ $u->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{ $user->links() }}

@endsection
