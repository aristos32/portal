# Laravel CRM Application - Comprehensive API Documentation

## Overview

This is a comprehensive Customer Relationship Management (CRM) system built with Laravel 12, featuring customer management, contract handling, job listings, and multi-language support (English/Greek). The application includes both web interfaces and API endpoints.

## Technology Stack

- **Framework**: Laravel 12 (PHP 8.2+)
- **Database**: PostgreSQL
- **Frontend**: Tailwind CSS, Vite
- **Authentication**: Laravel Breeze + Sanctum API
- **Containerization**: Docker
- **Queue**: Redis
- **Internationalization**: Multi-language support (en/gr)

---

## Table of Contents

1. [Authentication & Authorization](#authentication--authorization)
2. [Models & Database](#models--database)
3. [Web Routes & Controllers](#web-routes--controllers)
4. [API Endpoints](#api-endpoints)
5. [Middleware](#middleware)
6. [Blade Components](#blade-components)
7. [Frontend Assets](#frontend-assets)
8. [Usage Examples](#usage-examples)

---

## Authentication & Authorization

### Authentication System
The application uses Laravel Breeze for web authentication and Laravel Sanctum for API authentication.

#### Authentication Routes
- **Login**: `GET/POST /login`
- **Register**: `GET/POST /register`
- **Password Reset**: `GET/POST /forgot-password`
- **Email Verification**: `GET/POST /verify-email`

#### Protected Routes
All routes require authentication except public pages (home, about, contact).

```php
// Middleware: auth, verified
Route::middleware(['auth', 'verified'])->group(function () {
    // Protected routes here
});
```

---

## Models & Database

### Core Models

#### 1. User Model
**Location**: `app/Models/User.php`

System users (admins, customer service) who can login to the system.

```php
class User extends Authenticatable
{
    protected $fillable = [
        'first_name', 'last_name', 'identity_number', 'identity_type',
        'email', 'password', 'phone', 'cellphone', 'birthdate', 'nationality'
    ];

    protected $hidden = ['password', 'remember_token'];
}
```

**Usage Example**:
```php
// Create new user
$user = User::create([
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password')
]);

// Find user
$user = User::findOrFail(1);
```

#### 2. Customer Model
**Location**: `app/Models/Customer.php`

Business customers who cannot login but are managed by system users.

```php
class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'identity_number', 'identity_type',
        'type', 'gender', 'email', 'phone', 'cellphone',
        'profession', 'birthdate', 'nationality'
    ];

    // Relationships
    public function infos() // hasMany CustomerInfo
    public function contracts() // hasMany Contract
    public function employers() // hasMany Employer
    public function addresses() // hasMany Address
    public function licenses() // hasMany License
    public function latestTransaction() // hasOne Transaction

    // Helper method
    public function getFirstAddress() // Returns formatted address string
}
```

**Usage Example**:
```php
// Create customer
$customer = Customer::create([
    'first_name' => 'Jane',
    'last_name' => 'Smith',
    'email' => 'jane@example.com',
    'phone' => '+1234567890'
]);

// Get customer with relationships
$customer = Customer::with(['contracts', 'addresses'])->find(1);

// Get first address
$address = $customer->getFirstAddress();
```

#### 3. Contract Model
**Location**: `app/Models/Contract.php`

Generic CRM contracts (trading accounts, insurance contracts, etc.).

```php
class Contract extends Model
{
    protected $fillable = [
        'name', 'number', 'description', 'balance',
        'notes', 'last_transaction_at', 'start_date', 'expiry_date'
    ];

    // Relationships
    public function customer() // belongsTo Customer
    public function transactions() // hasMany Transaction

    // Status accessor
    public function getStatusAttribute() // Returns 'expired' or 'active'
}
```

**Usage Example**:
```php
// Create contract
$contract = Contract::create([
    'customer_id' => 1,
    'name' => 'Trading Account',
    'number' => 'TA-001',
    'balance' => 10000.00,
    'start_date' => now(),
    'expiry_date' => now()->addYear()
]);

// Check contract status
$status = $contract->status; // 'active' or 'expired'
```

#### 4. Job Model
**Location**: `app/Models/Job.php`

Job listings management.

```php
class Job extends Model
{
    protected $table = 'job_listings';
    protected $guarded = [];

    // Relationships
    public function employer() // belongsTo Employer
    public function tags() // belongsToMany Tag
}
```

#### 5. Address Model
**Location**: `app/Models/Address.php`

Customer addresses.

```php
class Address extends Model
{
    protected $fillable = [
        'type', 'street', 'city', 'state', 'area_code', 'country'
    ];

    public function customer() // belongsTo Customer
    public function getFullAddress() // Returns formatted address string
}
```

#### 6. Transaction Model
**Location**: `app/Models/Transaction.php`

Financial transactions related to contracts.

```php
class Transaction extends Model
{
    protected $fillable = [
        'contract_id', 'amount', 'type', 'description',
        'notes', 'transaction_date'
    ];

    public function contract() // belongsTo Contract
}
```

#### 7. Supporting Models

- **Employer** (`app/Models/Employer.php`): Job employers
- **Tag** (`app/Models/Tag.php`): Job tags
- **CustomerInfo** (`app/Models/CustomerInfo.php`): Additional customer information
- **License** (`app/Models/License.php`): Customer licenses
- **Trade** (`app/Models/Trade.php`): Trading records

---

## Web Routes & Controllers

### Route Structure
All routes are prefixed with locale (`{locale}` where locale is 'en' or 'gr'):

#### Public Routes
```php
// Redirect routes
GET / → /en/home
GET /dashboard → /en/home (authenticated users)

// Localized public routes
GET /{locale}/home        // Home page
GET /{locale}/contact     // Contact page
GET /{locale}/about       // About page
GET /test                 // Test page (skillonnet view)
```

#### Protected Routes (Require Authentication)

##### Customer Management
**Controller**: `CustomerController`

```php
GET    /{locale}/customers           // List customers
GET    /{locale}/customers/{id}      // Show customer details
PATCH  /{locale}/customers/{id}      // Update customer
```

**Usage Examples**:
```php
// Show customer
public function show(Request $request, $id)
{
    $customer = Customer::findOrFail($id);
    $contracts = Contract::where('customer_id', $customer->id)
        ->orderByDesc('expiry_date')
        ->orderByDesc('balance')
        ->paginate(10);
    
    return view('customers.show', compact('customer', 'contracts'));
}

// Update customer
public function update(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        // ... other validation rules
    ]);
    
    $customer = Customer::findOrFail($id);
    $customer->update($validated);
    
    return redirect()->route('customers.show', $customer->id)
        ->with('status', 'Customer updated successfully');
}
```

##### Job Management
**Controller**: `JobController`

```php
GET     /{locale}/jobs              // List jobs
POST    /{locale}/jobs              // Create job
GET     /{locale}/jobs/create       // Show create form
GET     /{locale}/jobs/{job}        // Show job details
GET     /{locale}/jobs/{job}/edit   // Show edit form
PATCH   /{locale}/jobs/{job}        // Update job
DELETE  /{locale}/jobs/{job}        // Delete job
```

**Usage Examples**:
```php
// List jobs with pagination
public function index()
{
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', compact('jobs'));
}

// Store new job
public function store()
{
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    // Send notification email
    Mail::to($job->employer->user)->queue(new JobPosted($job));
    
    return redirect('/jobs');
}
```

##### Contract Management
**Controller**: `ContractController`

```php
GET /{locale}/accounts               // List accounts/contracts
GET /{locale}/accounts/create        // Show create form
```

##### Search Functionality
**Controller**: `SearchController`

```php
POST /{locale}/search               // Search customers
```

**Usage Example**:
```php
public function search(Request $request)
{
    $validated = $request->validate([
        'state-id' => 'nullable|integer',
        'name' => 'nullable|string',
        'surname' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
    ]);

    $customers = null;
    
    if ($validated['state-id']) {
        $customers = Customer::where('identity_number', $validated['state-id'])->get();
    } elseif ($validated['name']) {
        $customers = Customer::whereRaw('LOWER(first_name) LIKE ?', 
            ['%' . strtolower($validated['name']) . '%'])->get();
    }
    // ... additional search logic
    
    return view('customers.all', compact('customers'));
}
```

##### Address Management
**Controller**: `AddressController`

```php
GET /{locale}/addresses             // List addresses
```

##### Profile Management
**Controller**: `ProfileController`

```php
GET     /{locale}/profile           // Show profile
PATCH   /{locale}/profile           // Update profile
DELETE  /{locale}/profile           // Delete profile
```

---

## API Endpoints

### Base URL
```
/api/
```

### Authentication
API routes use Sanctum authentication:
```php
Route::middleware('auth:sanctum')->group(function () {
    // Protected API routes
});
```

### Available Endpoints

#### User Authentication
```php
GET /api/user                       // Get authenticated user
```

**Usage Example**:
```bash
curl -H "Authorization: Bearer {token}" \
     -H "Accept: application/json" \
     http://localhost:8082/api/user
```

#### Stock Management (Planned - Controllers Not Yet Implemented)
```php
GET /api/stock/get/{symbol}                    // Get latest stock price
GET /api/stock/report                          // Get all stock reports
GET /api/stock/report/{symbol}                 // Get stock report for symbol
```

**Note**: The `StockHandleController` is referenced in routes but not yet implemented.

---

## Middleware

### Custom Middleware

#### 1. SetLocale Middleware
**Location**: `app/Http/Middleware/SetLocale.php`

Handles internationalization by setting the application locale based on the URL parameter.

```php
class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->route('locale');
        
        if (!in_array($locale, ['en', 'gr'])) {
            $locale = config('app.locale', 'en');
        }
        
        App::setLocale($locale);
        return $next($request);
    }
}
```

**Usage**: Automatically applied to all localized routes.

#### 2. LoginActions Middleware
**Location**: `app/Http/Middleware/LoginActions.php`

Handles custom login actions and redirects.

### Built-in Middleware Used
- `auth`: Authentication required
- `verified`: Email verification required
- `auth:sanctum`: API authentication

---

## Blade Components

### Layout Components

#### 1. Main Layout
**Location**: `resources/views/components/layout.blade.php`

Base layout for all pages.

```blade
<x-layout heading="Page Title">
    <!-- Page content -->
</x-layout>
```

#### 2. Navigation Components

**Top Menu**: `resources/views/components/top-menu.blade.php`
```blade
<x-top-menu />
```

**Navigation Links**:
```blade
<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
    Home
</x-nav-link>
```

#### 3. Form Components

**Text Input**:
```blade
<x-text-input 
    name="first_name" 
    value="{{ old('first_name') }}" 
    placeholder="Enter first name" 
/>
```

**Input Label**:
```blade
<x-input-label for="email" value="Email Address" />
```

**Input Error**:
```blade
<x-input-error :messages="$errors->get('email')" />
```

#### 4. Button Components

**Primary Button**:
```blade
<x-primary-button type="submit">
    Save Changes
</x-primary-button>
```

**Secondary Button**:
```blade
<x-secondary-button onclick="history.back()">
    Cancel
</x-secondary-button>
```

**Danger Button**:
```blade
<x-danger-button onclick="confirmDelete()">
    Delete
</x-danger-button>
```

#### 5. Utility Components

**Alert Messages**:
```blade
<x-alert type="success" message="Record saved successfully!" />
```

**Status Bar**:
```blade
<x-status-bar />
```

**Modal**:
```blade
<x-modal name="confirm-deletion">
    <p>Are you sure you want to delete this record?</p>
</x-modal>
```

#### 6. Business-Specific Components

**Customer Information Row**:
```blade
<x-customer-info-row 
    label="Full Name" 
    value="{{ $customer->first_name }} {{ $customer->last_name }}" 
/>
```

**Customer Contracts**:
```blade
<x-customer-contracts :contracts="$customer->contracts" />
```

**Job Card**:
```blade
<x-job-card :job="$job" />
<x-job-card-wide :job="$job" />
```

**Language Switcher**:
```blade
<x-language-switcher current-locale="{{ app()->getLocale() }}" />
```

---

## Frontend Assets

### JavaScript
**Location**: `resources/js/`

- `app.js`: Main application JavaScript
- `bootstrap.js`: Bootstrap configuration

### CSS
**Location**: `resources/css/`

- Tailwind CSS configuration
- Custom styles

### Build Configuration
- **Vite**: `vite.config.js`
- **Tailwind**: `tailwind.config.js`
- **PostCSS**: `postcss.config.js`

---

## Usage Examples

### Complete Customer Management Flow

#### 1. Search for Customer
```php
// POST /{locale}/search
$request = [
    'name' => 'John',
    'email' => 'john@example.com'
];

// Returns customers matching criteria
```

#### 2. View Customer Details
```php
// GET /{locale}/customers/1
// Returns customer with contracts, paginated
$customer = Customer::with(['contracts' => function($query) {
    $query->orderByDesc('expiry_date')->orderByDesc('balance');
}])->findOrFail(1);
```

#### 3. Update Customer Information
```php
// PATCH /{locale}/customers/1
$data = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john.doe@example.com',
    'phone' => '+1234567890'
];

$customer = Customer::findOrFail(1);
$customer->update($data);
```

### Job Management Flow

#### 1. Create Job Listing
```php
// GET /{locale}/jobs/create - Show form
// POST /{locale}/jobs - Store job

$job = Job::create([
    'title' => 'Software Developer',
    'salary' => '$80,000',
    'employer_id' => 1
]);

// Automatically sends email notification
Mail::to($job->employer->user)->queue(new JobPosted($job));
```

#### 2. Browse Jobs
```php
// GET /{locale}/jobs
$jobs = Job::with('employer')->latest()->simplePaginate(3);
```

### API Usage Examples

#### Authentication
```bash
# Login to get token (via web interface)
# Then use token for API calls

curl -H "Authorization: Bearer {your-token}" \
     -H "Accept: application/json" \
     -X GET \
     http://localhost:8082/api/user
```

#### Get Stock Information (When Implemented)
```bash
curl -H "Accept: application/json" \
     -X GET \
     http://localhost:8082/api/stock/get/AAPL

curl -H "Accept: application/json" \
     -X GET \
     http://localhost:8082/api/stock/report
```

### Docker Usage

#### Start Application
```bash
# Quick start
./update.sh

# Manual start
docker-compose up -d
docker-compose exec app npm run dev
docker-compose exec app php artisan migrate:fresh --seed
```

#### Development Commands
```bash
# Install dependencies
docker-compose exec app composer install
docker-compose exec app npm install

# Run migrations
docker-compose exec app php artisan migrate
docker-compose exec app php artisan migrate:fresh --seed

# Clear caches
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan config:clear

# Run tests
docker-compose exec app php artisan test

# Access Tinker
docker-compose exec app php artisan tinker
```

### Database Operations

#### Using Tinker
```php
# docker-compose exec app php artisan tinker

// Create test data
\App\Models\Job::factory(100)->create();
\App\Models\Customer::factory(50)->create();

// Query data
\App\Models\User::all();
\App\Models\Customer::with('contracts')->get();
\App\Models\Contract::where('balance', '>', 1000)->get();
```

#### Direct Database Access
```bash
# PostgreSQL
psql -h localhost -p 5432 -U administrator -d portal
```

### Localization Usage

#### Route Examples
```php
// English routes
http://localhost:8082/en/home
http://localhost:8082/en/customers
http://localhost:8082/en/jobs

// Greek routes
http://localhost:8082/gr/home
http://localhost:8082/gr/customers
http://localhost:8082/gr/jobs
```

#### In Blade Templates
```blade
<!-- Get localized message -->
{{ __('messages.welcome') }}

<!-- Language switcher component -->
<x-language-switcher current-locale="{{ app()->getLocale() }}" />
```

---

## Error Handling & Debugging

### Logging
```php
use Illuminate\Support\Facades\Log;

Log::info('Customer updated', ['customer_id' => $customer->id]);
Log::error('Update failed', ['error' => $exception->getMessage()]);
```

### Debug Tools
- **Laravel Debugbar**: Available in development
- **Log Files**: `storage/logs/laravel.log`
- **Xdebug**: Configured for VS Code

### Common Troubleshooting

#### Permission Issues
```bash
docker-compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
docker-compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

#### Missing Application Key
```bash
docker-compose exec app php artisan key:generate
```

#### Asset Issues
```bash
docker-compose exec app npm run dev
# Check if Vite is running on http://localhost:5173/
```

---

## Testing

### Run Tests
```bash
docker-compose exec app php artisan test
```

### Example Test Structure
- `tests/Feature/`: Integration tests
- `tests/Unit/`: Unit tests
- `tests/Feature/Auth/`: Authentication tests
- `tests/Feature/ProfileTest.php`: Profile management tests

---

## Environment Configuration

### Required Environment Variables
```env
# Database
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=portal
DB_USERNAME=administrator
DB_PASSWORD=password

# Application
APP_NAME="Laravel CRM"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8082

# Cache/Queue
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_HOST=redis
```

---

## Security Considerations

1. **Authentication**: Laravel Breeze + Sanctum
2. **Authorization**: Route middleware protection
3. **Validation**: Request validation on all inputs
4. **CSRF Protection**: Enabled for web routes
5. **SQL Injection**: Eloquent ORM protection
6. **XSS Protection**: Blade template escaping

---

This documentation covers all publicly accessible APIs, functions, and components in your Laravel CRM application. For any specific implementation details or additional functionality, refer to the individual controller and model files in your codebase.