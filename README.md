## About Project
MyRestaurant is a web-based reservation system built with Laravel 12 and MySQL. It allows guests to book reservations, supervisors to manage reservation statuses, and admins to oversee all reservations for reporting purposes.
    
## Features
Role-based access control: Guest, Supervisor, Admin
 * Guests can create and view their reservation history
 * Supervisors can change reservation statuses (e.g. open, reserve, cancel, complete)
 * Admins have access to all reservation data for reporting
 * Flash messages and error handling for better user experience

## Installation
1. Clone the Repository
git clone https://github.com/YourUsername/MyRestaurant.git
cd MyRestaurant

2. Install PHP & JS Dependencies
composer install
npm install && npm run dev

3. Set Up Environment File
cp .env.example .env

Update your .env file with database and app settings.

4. Generate Application Key
php artisan key:generate

5. Run Migrations
php artisan migrate

6. Seed Default Roles and Test Data (Optional)
php artisan db:seed

7. Start the Development Server
php artisan serve


Visit http://localhost:8000 to access the application.
