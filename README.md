# Reminder Application

Reminder Application is a simple task management tool built with Laravel. It allows users to create reminders for various tasks and manage them easily.

![Screenshot of the Reminder App](https://github.com/mdabagh/reminder/blob/main/reminder-screenshot.png)

## Installation

To install the application, follow these steps:

1. Clone the repository using the command below:
```bash
git clone https://github.com/mdabagh/reminder.git
```

2. Create a new database for the application.

3. Copy the `.env.example` file to `.env` and update the database information. You can do this using the command below:
```bash
cp .env.example .env
```

4. Install the dependencies using Composer. Run the command below to install the dependencies:
```bash
composer install
```

5. Generate an application key using the command below:
```bash
php artisan key:generate
```

6. Run the database migrations using the command below:
```bash
php artisan migrate
```

7. (Optional) Seed the database with initial data using the commands below:
```bash
php artisan db:seed --class=CategoriesMainSeeder
php artisan db:seed --class=UsersTableSeeder
```
The above commands will create a test user with the following credentials:
```
Username: user1@example.com
Password: 12345678
```

## Usage

To use the application, follow these steps:

1. Register a new account or login with an existing one.

2. Create a new category for your reminders.

3. Create a new reminder and assign it to a category.

4. View, edit, or delete your reminders as needed.

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

