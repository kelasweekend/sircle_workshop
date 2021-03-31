@extends('layouts.app')

@section('title')
    Dashboard Artikel
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <a href="{{ route('create') }}" class="btn btn-info text-white mb-3">Create Blog</a>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Artikel</th>
                                    <th scope="col">Slug Url</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($blog as $item)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$item->title}}</td>
                                        <td>{{route('detail',$item->slug_url)}}</td>
                                        <td>
                                            <div class="flex">
                                                <a href="{{route('edit', $item->id)}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('hapus', $item->id)}}" class="btn btn-secondary"><i class="fas fa-trash"></i></a>
                                            </div>
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
