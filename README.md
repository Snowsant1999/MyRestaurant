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
```shell
git clone https://github.com/Snowsant1999/MyRestaurant.git
cd MyRestaurant
```

2. Install PHP & JS Dependencies
```shell
composer install
npm install
```

3. Set Up the Environment File
```shell
cp .env.example .env
```
Then edit the .env file with your database credentials and app settings.

4. Generate the Application Key
```shell
php artisan key:generate
```
5. Run Migrations
```shell
php artisan migrate
```

6. Seed Default Roles and Test Data
```shell
php artisan db:seed
```
This will create default roles and pre-defined Supervisor and Admin accounts (since they don't need to register manually).

7. Start the Development Server
```shell
php artisan serve
```

Visit http://localhost:8000 in your browser to access the application.
