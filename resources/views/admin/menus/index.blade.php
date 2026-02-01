@extends('layouts.light.master')
@section('title', 'Menus')

@section('breadcrumb-title')
<h3>Menus</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Menus</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0 shadow-sm">
                <div class="card-header p-3 d-flex align-items-center">
                    <h5 class="mb-0">Menus</h5>
                    <div class="ml-auto">
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                 <tr>
                                     <th>Menu Name</th>
                                     <th>Website Location</th>
                                     <th width="10">Action</th>
                                 </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>0</td>
                                    <td>category-menu</td>
                                    <td>
                                        <a href="{{ route('admin.category-menus.index') }}" class="btn btn-primary">Build</a>
                                    </td>
                                </tr> --}}
                                @foreach($menus as $menu)
                                <tr>
                                    <td><strong>{{ $menu->name }}</strong></td>
                                    <td>
                                        @switch($menu->slug)
                                            @case('header-menu')
                                                <span class="badge badge-primary">Main Header (Orange Bar)</span>
                                                @break
                                            @case('topbar-menu')
                                                <span class="badge badge-info">Top Strip (Above Header)</span>
                                                @break
                                            @case('quick-links')
                                                <span class="badge badge-success">Footer (Bottom Columns)</span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">Custom Menu</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-primary px-3">Build Links</a>
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
</div>
@endsection