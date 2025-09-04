<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SwiftSolve School System')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

   <style>
        :root {
            --primary-orange: #D47F2F;
            --secondary-orange: #E3964A;
            --dark-orange: #B2621D;
            --light-orange: #FDF4E8;
            --accent-gold: #C19D60;
            --light-gold: #F9F5F0;
            --deep-charcoal: #2C3E50;
            --medium-charcoal: #4A5568;
            --light-charcoal: #718096;
            --off-white: #FCFAF7;
            --subtle-beige: #F8F5F0;
            --success: #38A169;
            --warning: #DD6B20;
            --danger: #E53E3E;
            --info: #3182CE;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--off-white);
            color: var(--deep-charcoal);
            line-height: 1.6;
        }

        /* Luxury Header - Orange Version */
        .luxury-header {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px rgba(212, 127, 47, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid var(--accent-gold);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-logo {
            font-size: 2rem;
            color: white;
            background: var(--accent-gold);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(193, 157, 96, 0.2);
        }

        .brand-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand-text p {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-top: 2px;
        }

        /* Navigation */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links {
            display: flex;
            gap: 15px;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 18px;
            right: 18px;
            height: 2px;
            background: var(--accent-gold);
        }

        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent-gold);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            min-width: 200px;
            z-index: 1000;
            margin-top: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .user-menu:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            color: var(--deep-charcoal);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--light-orange);
            color: var(--primary-orange);
        }

        .dropdown-divider {
            height: 1px;
            background: var(--subtle-beige);
            margin: 5px 0;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 80px);
            padding: 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--subtle-beige);
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            color: var(--deep-charcoal);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .breadcrumb {
            display: flex;
            gap: 12px;
            font-size: 0.95rem;
            color: var(--medium-charcoal);
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .breadcrumb-item:not(:last-child)::after {
            content: '/';
            color: var(--primary-orange);
        }

        .breadcrumb-link {
            color: var(--primary-orange);
            text-decoration: none;
        }

        .breadcrumb-link:hover {
            text-decoration: underline;
        }

        /* Content Container */
        .content-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            border: 1px solid var(--subtle-beige);
        }

        /* Alerts */
        .alert {
            padding: 1.2rem 1.8rem;
            border-radius: 8px;
            margin-bottom: 1.8rem;
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 4px solid;
        }

        .alert-success {
            background-color: #F0FFF4;
            border-left-color: var(--success);
            color: #2F855A;
        }

        .alert-warning {
            background-color: #FFFAF0;
            border-left-color: var(--warning);
            color: #C05621;
        }

        .alert-danger {
            background-color: #FFF5F5;
            border-left-color: var(--danger);
            color: #C53030;
        }

        .alert-info {
            background-color: #EBF8FF;
            border-left-color: var(--info);
            color: #2C5282;
        }

        /* Footer */
        .luxury-footer {
            background: var(--deep-charcoal);
            color: white;
            padding: 2.5rem;
            text-align: center;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 1.2rem;
        }

        .footer-link {
            color: var(--light-orange);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--accent-gold);
        }

        .copyright {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .header-container {
                flex-direction: column;
                gap: 20px;
                padding: 1.2rem;
            }

            .main-nav {
                width: 100%;
                justify-content: space-between;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-link {
                padding: 8px 14px;
                font-size: 0.9rem;
            }

            .main-content {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1.5rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .user-info {
                display: none;
            }

            .content-container {
                padding: 2rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .luxury-header {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .brand-text h1 {
                font-size: 1.5rem;
            }

            .brand-logo {
                width: 40px;
                height: 40px;
                font-size: 1.8rem;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
            }

            .content-container {
                padding: 1.5rem;
            }

            .page-header {
                margin-bottom: 2rem;
            }

            .page-title {
                font-size: 1.8rem;
            }
        }

        /* Enhanced Card Styling for Show Pages */
.enhanced-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.enhanced-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
}

.enhanced-card .card-header {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: white;
    padding: 1.25rem 1.5rem;
    border-bottom: 2px solid var(--accent-gold);
}

.enhanced-card .card-header h4 {
    margin: 0;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 1.5rem;
}

.enhanced-card .card-body {
    padding: 2rem;
}

/* Detail Row Styling */
.detail-row {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--subtle-beige);
    transition: background-color 0.2s ease;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-row:hover {
    background-color: var(--light-orange);
    border-radius: 6px;
}

.detail-label {
    font-weight: 600;
    color: var(--medium-charcoal);
    font-size: 0.95rem;
}

.detail-value {
    color: var(--deep-charcoal);
    font-size: 1rem;
}

/* Enhanced Button Styling */
.btn-enhanced {
    border-radius: 8px;
    padding: 0.5rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-enhanced:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--dark-orange) 0%, #9c5518 100%);
}

.btn-secondary {
    background: linear-gradient(135deg, var(--medium-charcoal) 0%, var(--deep-charcoal) 100%);
}

.btn-secondary:hover {
    background: linear-gradient(135deg, var(--deep-charcoal) 0%, #233445 100%);
}

/* Table Styling */
.enhanced-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    background: white;
}

.enhanced-table thead {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: white;
}

.enhanced-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 600;
    font-size: 0.95rem;
}

.enhanced-table td {
    padding: 1.25rem;
    border-bottom: 1px solid var(--subtle-beige);
    color: var(--medium-charcoal);
}

.enhanced-table tbody tr {
    transition: background-color 0.2s ease;
}

.enhanced-table tbody tr:last-child td {
    border-bottom: none;
}

.enhanced-table tbody tr:hover {
    background-color: var(--light-orange);
}

.enhanced-table .action-cell {
    white-space: nowrap;
}

/* Status Badges */
.status-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
}

.badge-active {
    background-color: rgba(56, 161, 105, 0.15);
    color: var(--success);
}

.badge-inactive {
    background-color: rgba(229, 62, 62, 0.15);
    color: var(--danger);
}

.badge-pending {
    background-color: rgba(221, 107, 32, 0.15);
    color: var(--warning);
}

/* Form Styling */
.enhanced-form {
    background: white;
    border-radius: 12px;
    padding: 2.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.form-label {
    font-weight: 600;
    color: var(--medium-charcoal);
    margin-bottom: 0.5rem;
}

.form-control {
    border: 1px solid var(--subtle-beige);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 3px rgba(212, 127, 47, 0.15);
}

/* Action Icons */
.action-icon {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.action-icon-view {
    background-color: rgba(49, 130, 206, 0.15);
    color: var(--info);
}

.action-icon-view:hover {
    background-color: var(--info);
    color: white;
}

.action-icon-edit {
    background-color: rgba(56, 161, 105, 0.15);
    color: var(--success);
}

.action-icon-edit:hover {
    background-color: var(--success);
    color: white;
}

.action-icon-delete {
    background-color: rgba(229, 62, 62, 0.15);
    color: var(--danger);
}

.action-icon-delete:hover {
    background-color: var(--danger);
    color: white;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .enhanced-table {
        display: block;
        overflow-x: auto;
    }

    .detail-label, .detail-value {
        font-size: 0.9rem;
    }

    .enhanced-card .card-body {
        padding: 1.5rem;
    }

    /* Enhanced button styles */
.btn {
    border-radius: 8px;
    padding: 0.5rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--dark-orange) 0%, #9c5518 100%);
}

.btn-secondary {
    background: linear-gradient(135deg, var(--medium-charcoal) 0%, var(--deep-charcoal) 100%);
}

.btn-secondary:hover {
    background: linear-gradient(135deg, var(--deep-charcoal) 0%, #233445 100%);
}

/* Table styling */
.enhanced-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    background: white;
}

.enhanced-table thead {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: white;
}

.enhanced-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 600;
    font-size: 0.95rem;
}

.enhanced-table td {
    padding: 1.25rem;
    border-bottom: 1px solid var(--subtle-beige);
    color: var(--medium-charcoal);
}

.enhanced-table tbody tr {
    transition: background-color 0.2s ease;
}

.enhanced-table tbody tr:last-child td {
    border-bottom: none;
}

.enhanced-table tbody tr:hover {
    background-color: var(--light-orange);
}

.enhanced-table .action-cell {
    white-space: nowrap;
}

/* Action icons */
.action-icon {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.action-icon-view {
    background-color: rgba(49, 130, 206, 0.15);
    color: var(--info);
}

.action-icon-view:hover {
    background-color: var(--info);
    color: white;
}

.action-icon-edit {
    background-color: rgba(56, 161, 105, 0.15);
    color: var(--success);
}

.action-icon-edit:hover {
    background-color: var(--success);
    color: white;
}

.action-icon-delete {
    background-color: rgba(229, 62, 62, 0.15);
    color: var(--danger);
}

.action-icon-delete:hover {
    background-color: var(--danger);
    color: white;
}

/* Form styling */
.enhanced-form {
    background: white;
    border-radius: 12px;
    padding: 2.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.form-label {
    font-weight: 600;
    color: var(--medium-charcoal);
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 1px solid var(--subtle-beige);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 3px rgba(212, 127, 47, 0.15);
}

/* Detail row styling */
.detail-row {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--subtle-beige);
    transition: background-color 0.2s ease;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-row:hover {
    background-color: var(--light-orange);
    border-radius: 6px;
}

.detail-label {
    font-weight: 600;
    color: var(--medium-charcoal);
    font-size: 0.95rem;
}

.detail-value {
    color: var(--deep-charcoal);
    font-size: 1rem;
}

/* Enhanced card styling */
.enhanced-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.enhanced-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
}

.enhanced-card .card-header {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: white;
    padding: 1.25rem 1.5rem;
    border-bottom: 2px solid var(--accent-gold);
}

.enhanced-card .card-header h4 {
    margin: 0;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 1.5rem;
}

.enhanced-card .card-body {
    padding: 2rem;
}

/* Staff Photo Styles */
.staff-photo-container {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--accent-gold);
    background: white;
}

.staff-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.staff-photo-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
}

/* Position Badge */
.position-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 500;
    background-color: rgba(212, 127, 47, 0.15);
    color: var(--primary-orange);
}

/* Enhanced Table Adjustments for Photo Column */
.enhanced-table th:first-child,
.enhanced-table td:first-child {
    width: 70px;
    text-align: center;
}

/* Pagination Styles */
.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.375rem;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: var(--primary-orange);
    background-color: #fff;
    border: 1px solid #dee2e6;
    text-decoration: none;
}

.page-item:first-child .page-link {
    border-top-left-radius: 0.375rem;
    border-bottom-left-radius: 0.375rem;
}

.page-item:last-child .page-link {
    border-top-right-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: var(--primary-orange);
    border-color: var(--primary-orange);
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

.page-link:hover {
    z-index: 2;
    color: var(--dark-orange);
    background-color: #e9ecef;
    border-color: #dee2e6;
}

/* Responsive adjustments for staff photos */
@media (max-width: 992px) {
    .staff-photo-container {
        width: 40px;
        height: 40px;
    }

    .position-badge {
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
    }
}

@media (max-width: 768px) {
    .staff-photo-container {
        width: 35px;
        height: 35px;
    }

    .staff-photo-placeholder {
        font-size: 0.8rem;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .enhanced-table {
        display: block;
        overflow-x: auto;
    }

    .detail-label, .detail-value {
        font-size: 0.9rem;
    }

    .enhanced-card .card-body {
        padding: 1.5rem;
    }

    .enhanced-form {
        padding: 1.5rem;
    }
}
}
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Luxury Header -->
    <header class="luxury-header">
        <div class="header-container">
            <div class="brand">
                <div class="brand-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="brand-text">
                    <h1>SwiftSolve School System</h1>
                    <p>Excellence in Education</p>
                </div>
            </div>

            <nav class="main-nav">
                <div class="nav-links">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{ url('/students') }}" class="nav-link {{ request()->is('students*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Students
                    </a>
                    <a href="{{ url('/staff') }}" class="nav-link {{ request()->is('staff*') ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i> Staff
                    </a>
                    <a href="{{ url('/academics') }}" class="nav-link {{ request()->is('academics*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Academics
                    </a>
                    <a href="{{ url('/finance') }}" class="nav-link {{ request()->is('finance*') ? 'active' : '' }}">
                        <i class="fas fa-dollar-sign"></i> Finance
                    </a>
                </div>

                <div class="user-menu">
    <img src="{{ Auth::user()->profile_photo_url }}"
         alt="User" class="user-avatar">
    <div class="user-info">
        <span class="user-name">{{ Auth::user()->name }}</span>
        <span class="user-role">Administrator</span>
    </div>

    <div class="dropdown-menu">
        <a href="{{ route('profile.show') }}" class="dropdown-item">
            <i class="fas fa-user-circle"></i> My Profile
        </a>
        <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </form>
    </div>
</div>

            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">@yield('title', 'Dashboard')</h1>
            <div class="breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </div>
                @hasSection('breadcrumb')
                    @yield('breadcrumb')
                @endif
            </div>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i>
                {{ session('warning') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                {{ session('info') }}
            </div>
        @endif

        <!-- Content Container -->
        <div class="content-container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="luxury-footer">
        <div class="footer-content">
            <div class="footer-links">
                <a href="#" class="footer-link">About Us</a>
                <a href="#" class="footer-link">Contact</a>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
                <a href="#" class="footer-link">Help Center</a>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} SwiftSolve School System. All rights reserved.
                | Version 1.0.0
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
