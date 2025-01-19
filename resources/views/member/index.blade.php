@extends('master.master')  
@section('title', 'Kelola User')  

@section('content')  
  
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">  
    <div class="content flex-row-fluid" id="kt_content">  
        <div class="row g-5 g-xl-12">  
            <!--begin::Col-->  
            <div class="col-xl-12">  
                <div class="py-12">      
                    <!--begin::Table widget 13-->  
                    <div class="card card-flush h-xl-100">  
                        <!--begin::Header-->  
                        <div class="card-header pt-7">  
                            <!--begin::Title-->  
                            <h3 class="card-title align-items-start flex-column">  
                                <span class="card-label fw-bold text-gray-800">Kelola Users</span>  
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Users: {{ $users->count() }}</span>  
                            </h3>  
                            <!--end::Title-->  
                            <!--begin::Toolbar-->  
                            <div class="card-toolbar">  
                                <a href="{{ route('member.create') }}">  
                                    <button class="btn btn-primary btn-sm">  
                                        <i class="ki-duotone ki-plus-square fs-2">  
                                            <span class="path1"></span>  
                                            <span class="path2"></span>  
                                            <span class="path3"></span>  
                                        </i>  
                                        Tambah User  
                                    </button>  
                                </a>  
                            </div>  
                            <!--end::Toolbar-->  
                        </div>  
                        <!--end::Header-->  
  
                        <!--begin::Body-->  
                        <div class="card-body">  
                            @if (session('success'))          
                                <div class="alert alert-success">          
                                    {{ session('success') }}          
                                </div>          
                            @endif      
                            <div class="table-responsive">          
                                <table class="table table-striped table-bordered" id="tabel_users">      
                                    <thead>  
                                        <tr>  
                                            <th>No</th>  
                                            <th>Name</th>  
                                            <th>Email</th>  
                                            <th>Actions</th>  
                                        </tr>  
                                    </thead>  
                                    <tbody>  
                                        @foreach ($users as $key => $user)    
                                            <tr>    
                                                <td>{{ $key + 1 }}</td>    
                                                <td>{{ $user->name }}</td>    
                                                <td>{{ $user->email }}</td>    
                                                <td>    
                                                    <a href="{{ route('member.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>    
                                                    <form action="{{ route('member.destroy', $user) }}" method="POST" style="display:inline;">    
                                                        @csrf    
                                                        @method('DELETE')    
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>    
                                                    </form>    
                                                </td>    
                                            </tr>    
                                        @endforeach    
                                    </tbody>    
                                </table>  
                            </div>  
                        </div>  
                        <!--end: Card Body-->  
                    </div>  
                    <!--end::Table widget 13-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
@endsection  