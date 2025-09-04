@extends('layouts.app')

@section('title', 'My Profile')

@section('breadcrumb')
    <div class="breadcrumb-item">
        <span class="separator">/</span>
        <span>My Profile</span>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="enhanced-card">
            <div class="card-header">
                <h4>Profile Information</h4>
            </div>
            <div class="card-body text-center">
                <div class="mb-4">
                    <img src="{{ Auth::user()->profile_photo_url }}"
                         alt="Profile" class="user-avatar" style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">{{ Auth::user()->name }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ Auth::user()->email }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Role</div>
                    <div class="detail-value">Administrator</div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-enhanced">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="enhanced-card">
            <div class="card-header">
                <h4>Account Details</h4>
            </div>
            <div class="card-body">
                <div class="detail-row">
                    <div class="detail-label">Account Created</div>
                    <div class="detail-value">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Last Updated</div>
                    <div class="detail-value">{{ Auth::user()->updated_at->format('M d, Y') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email Status</div>
                    <div class="detail-value">
                        @if (Auth::user()->email_verified_at)
                            <span class="badge-active">Verified</span>
                        @else
                            <span class="badge-pending">Not Verified</span>
                        @endif
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Account Status</div>
                    <div class="detail-value">
                        <span class="badge-active">Active</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
