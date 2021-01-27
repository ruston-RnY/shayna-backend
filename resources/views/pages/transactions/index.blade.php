@extends('layouts.admin')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Data Transaksi</h4>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Total Transaksi</th>
                                    <th>Status Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telpon }}</td>
                                        {{-- <td>{{ $item->address }}</td> --}}
                                        <td>Rp {{ number_format($item->transaction_total) }}</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">    
                                            @elseif($item->transaction_status == 'FAILED')
                                                <span class="badge badge-warning">
                                            @else
                                                <span>        
                                            @endif
                                            {{ $item->transaction_status }}
                                                </span>
                                        </td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm">
                                                <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                            <button type="button" 
                                                class="btn btn-info btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#myModal"
                                                data-title="Detail Transaksi {{ $item->uuid }}"
                                                data-isi="{{ route('transactions.show', $item->id) }}"><i class="fa fa-eye"></i>
                                            </button>                                          
                                            <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('apakah anda yakin ?')"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center p-5" colspan="6">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->  
    </div>  
</div>  
@endsection

