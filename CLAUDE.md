# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

AnisCMC is a Laravel 8 web application that serves as a Customer Material Control (CMC) system for managing purchase orders, requests, and material tracking. The application includes user management with role-based access control, fleet/armada management, news management, and a complete CMC workflow.

## Development Commands

### PHP/Laravel Commands
```bash
# Install dependencies
composer install

# Start development server
php artisan serve

# Database operations
php artisan migrate
php artisan migrate:fresh --seed
php artisan db:seed

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Generate application key
php artisan key:generate

# Run tests
vendor/bin/phpunit
```

### Frontend/Asset Commands
```bash
# Install Node.js dependencies
npm install

# Development build (watch for changes)
npm run dev
npm run watch

# Production build
npm run prod

# Hot reload development
npm run hot
```

## Architecture Overview

### Core Modules
1. **CMC System** - Purchase order requests and material control workflow
2. **User Management** - Role-based authentication with Admin, Commercial, Customer, and Warehouse roles
3. **Armada Management** - Fleet/truck management system
4. **News Management** - Internal news and announcements

### Key Models
- `User` - Authentication with JWT support, role-based access (1=Admin, 2=Commercial, 3=Customer, 4=Warehouse)
- `PoRequest` - Purchase order requests in the CMC workflow
- `CMCTimeline` - Timeline tracking for CMC processes
- `Truck` - Fleet/armada management
- `News` - News and announcements system

### Controllers Structure
- `NewCMCController` - Handles CMC request workflow (create, edit, view by role)
- `ArmadaController` - Fleet management CRUD operations
- `NewsController` - News management CRUD operations
- `StaffController` - User management and profile operations
- `HomeController` - Dashboard logic for different user roles

### Authentication & Authorization
- JWT-based authentication implemented
- Laravel's built-in Auth system with custom middleware
- Role-based access control through user roles (1-4)
- Protected routes under 'auth' middleware group

### Frontend Assets
- Bootstrap 4.6.0 for UI framework
- Laravel Mix for asset compilation
- SASS for styling with custom variables
- jQuery 3.6 for JavaScript functionality

### Database Structure
- Standard Laravel authentication tables
- CMC-specific tables: `po_requests`, `c_m_c_timelines`
- Supporting tables: `trucks`, `news`
- Migration files provide complete schema

### File Upload Structure
- User profiles: `public/web_files/user_profile/{id}/`
- Truck images: `public/web_files/truck/`
- PO attachments: `public/web_files/po_attachment/`
- Material files: `public/web_files/material/`

## Environment Setup

The application requires a `.env` file for configuration. Key environment variables needed:
- Database connection settings
- Application key
- JWT secret
- Mail configuration
- File storage settings