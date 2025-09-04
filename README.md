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
git clone https://github.com/Snowsant1999/MyRestaurant.git
cd MyRestaurant
<br>
2. Install PHP & JS Dependencies
composer install
npm install && npm run dev
<br>
3. Set Up Environment File
cp .env.example .env
Update your .env file with database and app settings.
<br>
4. Generate Application Key
php artisan key:generate
<br>
5. Run Migrations
php artisan migrate
<br>
6. Seed Default Roles and Test Data
php artisan db:seed
This is for the supervisor and admin account. Because both of them dont have to register a new account.

7. Start the Development Server
php artisan serve
Visit http://localhost:8000 to access the application.
