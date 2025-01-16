@extends('master.master')

@section('content')
    <div class="container">
        <div class="py-12">    
        <div class="container md-1">
        <div class="row">
            <!-- Profile Details Section -->
            <div class="row">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <h3 class="card-title">Profile Details</h3>
                        </div>
                        <div class="collapse show">
                            <form method="POST" action="{{ route('profile.update') }}" id="profile-update-form"
                                class="form">
                                @csrf
                                @method('PATCH')

                                <div class="card-body border-top p-9">
                                    <!-- Name -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="name"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ old('name', $user->name) }}" required />
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="email" name="email"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ old('email', $user->email) }}" required />
                                            @error('email')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                            <!-- Password Update Form -->
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PATCH')

                                <div class="card-body border-top p-9">
                                    <!-- Current Password -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Current
                                            Password</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" name="current_password"
                                                class="form-control form-control-lg form-control-solid" required />
                                            @error('current_password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">New Password</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" name="password"
                                                class="form-control form-control-lg form-control-solid" />
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Confirm Password</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg form-control-solid" />
                                            @error('password_confirmation')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Account Section -->
                    <div class="row">
                        <!-- Profile Details Section -->
                                <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <h3 class="card-title">Delete Account</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-gray-600">Once your account is deleted, all data will be permanently removed.
                                Please confirm your password to proceed.</p>
                            <form method="POST" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Password</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg form-control-solid" required />
                                        @error('password')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    $('#errorModal').modal('show');
                });
            </script>
        @endif
    </div>
@endsection
