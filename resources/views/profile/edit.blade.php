@extends('layouts.app')

@section('title', 'Edit Profile')

@section('breadcrumb')
    <div class="breadcrumb-item">
        <a href="{{ route('profile.show') }}" class="breadcrumb-link">
            <i class="fas fa-user"></i> My Profile
        </a>
    </div>
    <div class="breadcrumb-item">
        <span class="separator">/</span>
        <span>Edit Profile</span>
    </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="enhanced-card">
            <div class="card-header">
                <h4><i class="fas fa-user-edit me-2"></i>Edit Profile Information</h4>
            </div>

            <div class="card-body">
                <!-- Success Message -->
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>Profile updated successfully!
                    </div>
                @endif

                <!-- Profile Photo Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="position-relative d-inline-block">
                              <img id="profilePhotoPreview"
     src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url . '?v=' . Storage::disk('public')->lastModified(Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=FFFFFF&background=D47F2F' }}"
     alt="Profile Photo"
     class="user-avatar rounded-circle"
     style="width: 150px; height: 150px; object-fit: cover; border: 3px solid var(--accent-gold);">

                                <label for="profile_photo" class="btn btn-primary rounded-circle position-absolute"
                                       style="bottom: 10px; right: 10px; width: 40px; height: 40px; cursor: pointer;">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                            <!-- Temporary Debug Info -->
<div class="mt-3 p-2 bg-light rounded">
    <small class="text-muted">
        <strong>Debug Info:</strong><br>
        DB Path: <code>{{ Auth::user()->profile_photo_path ?? 'NULL' }}</code><br>
        Full URL: <code>{{ Auth::user()->profile_photo_url }}</code><br>
        File Exists:
        @if(Auth::user()->profile_photo_path)
            {{ Storage::disk('public')->exists(Auth::user()->profile_photo_path) ? 'YES' : 'NO' }}
        @else
            N/A
        @endif
    </small>
</div>

                            <div class="mt-2">
                                <small class="text-muted">Click camera icon to change photo</small>
                            </div>

                            @error('profile_photo')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" id="profileUpdateForm" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- File input INSIDE the form -->
                    <input type="file" id="profile_photo" name="profile_photo"
                           class="d-none" accept="image/*">

                    <!-- Hidden field for photo removal -->
                    <input type="hidden" name="remove_photo" id="remove_photo" value="0">

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" name="name" type="text" class="form-control"
                               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" name="email" type="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required autocomplete="email">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-warning">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    Your email address is not verified.
                                </p>

                                <button form="send-verification" class="btn btn-sm btn-outline-warning">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </div>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-success">
                                    <i class="fas fa-check-circle me-1"></i>
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        @endif
                    </div>

                    <hr class="my-4">

                    <!-- Password Confirmation -->
                    <div class="mb-4">
                        <label for="current_password" class="form-label">Confirm Password to Save Changes</label>
                        <input id="current_password" name="current_password" type="password" class="form-control"
                               placeholder="Enter your current password" required autocomplete="current-password">
                        @error('current_password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-enhanced">
                            <i class="fas fa-arrow-left me-2"></i>Back to Profile
                        </a>

                        <div>
                            <button type="button" id="removePhotoBtn" class="btn btn-outline-danger btn-enhanced me-2 d-none">
                                <i class="fas fa-trash me-2"></i>Remove Photo
                            </button>
                            <button type="submit" class="btn btn-primary btn-enhanced">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Email Verification Form -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mt-3">
                        @csrf
                    </form>
                @endif
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="enhanced-card mt-4">
            <div class="card-header bg-danger text-white">
                <h4><i class="fas fa-exclamation-triangle me-2"></i>Delete Account</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">
                    Once your account is deleted, all of its resources and data will be permanently deleted.
                    Before deleting your account, please download any data or information that you wish to retain.
                </p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-enhanced" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    <i class="fas fa-trash-alt me-2"></i>Delete Account
                </button>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Are you sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    This action cannot be undone. All your data will be permanently deleted.
                                </p>

                                <form method="POST" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                                    @csrf
                                    @method('delete')

                                    <div class="mb-3">
                                        <label for="delete_password" class="form-label">Enter your password to confirm</label>
                                        <input id="delete_password" name="password" type="password" class="form-control"
                                               placeholder="Your password" required>
                                        @error('password', 'userDeletion')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" form="deleteAccountForm" class="btn btn-danger">
                                    <i class="fas fa-trash-alt me-2"></i>Permanently Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profilePhotoInput = document.getElementById('profile_photo');
        const profilePhotoPreview = document.getElementById('profilePhotoPreview');
        const removePhotoBtn = document.getElementById('removePhotoBtn');
        const removePhotoInput = document.getElementById('remove_photo');
        const defaultAvatar = 'https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=FFFFFF&background=D47F2F';
        const cameraIcon = document.querySelector('label[for="profile_photo"]');

        // Handle camera icon click to trigger file input
        cameraIcon.addEventListener('click', function() {
            profilePhotoInput.click();
        });

        // Handle profile photo upload
        profilePhotoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) { // 5MB limit
                    alert('File size must be less than 5MB');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePhotoPreview.src = e.target.result;
                    removePhotoBtn.classList.remove('d-none');
                };
                reader.readAsDataURL(file);

                // Reset remove photo flag
                removePhotoInput.value = '0';
            }
        });

        // Handle photo removal
        removePhotoBtn.addEventListener('click', function() {
            profilePhotoPreview.src = defaultAvatar;
            removePhotoInput.value = '1';
            profilePhotoInput.value = '';
            this.classList.add('d-none');
        });

        // Form validation
        const form = document.getElementById('profileUpdateForm');

        form.addEventListener('submit', function(e) {
            const password = document.getElementById('current_password').value;

            if (!password) {
                e.preventDefault();
                alert('Please enter your password to confirm changes.');
                document.getElementById('current_password').focus();
            }
        });

        // Delete modal validation
        const deleteModal = document.getElementById('confirmDeleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('shown.bs.modal', function () {
                document.getElementById('delete_password').focus();
            });
        }

        // Check if user has a custom photo and show remove button
        @if(Auth::user()->profile_photo_path)
            removePhotoBtn.classList.remove('d-none');
        @endif
    });
</script>
@endpush
@endsection
