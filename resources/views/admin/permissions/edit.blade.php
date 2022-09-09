@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Permission')}}</h1>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary btn-sm shadow-sm">{{ __('Kembali') }}</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Jenis Permission</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $permission->title) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Simpan')}}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
