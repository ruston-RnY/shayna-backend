@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="box-title">Tambah Foto Product</h4>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label><br>                  
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('is_default') is-invalid @enderror" type="radio" name="is_default" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('is_default') is-invalid @enderror" type="radio" name="is_default" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                    </div>                                    
                    @error('is_default')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('product-galleries.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection