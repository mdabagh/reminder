## Reminder Application

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
The above commands will create a test user with thefollowing credentials:
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

## Setting up a Cron Job for Sending Reminders

To set up a cron job in CentOS 7 to send reminders using the Reminder Application, follow these steps:

1. Create a bash script file with the `curl` command inside. For example, create a file named `reminder-curl.sh` with the following content:

   `````bash
   #!/bin/bash

   token="YOUR_TOKEN"
   curl -X POST -d "token=${token}" http://www.example.com/reminders/check >/dev/null 2>&1
   ```

   Replace `YOUR_TOKEN` with your own token.

2. Make the bash script file executable with the command:

   ```bash
   chmod +x reminder-curl.sh
   ```

3. Edit the cron job file with the command:

   ````bash
   crontab -e
   ```

4. Add a new line to the end of the file to specify the frequency of the cron job and the path to the bash script file. For example, to run the script every 10 minutes, add the following line:

   ````cron
   */10 * * * * /path/to/reminder-curl.sh
   ```

   Replace `/path/to` with the actual path to the bash script file.

5. Save and exit the file. The cron job will now run according to the specified schedule.

## Configuring the Token

To configure the token in Linux, you need to set the token value in the `.env` file in the Reminder Application. Here's how you can do it:

1. Open the `.env` file in the Reminder Application.

2. Find the line that starts with `APP_TOKEN=` and set the value to your token. For example:

   ````env
   APP_TOKEN=123456789
   ```

3. Save and close the file.

That's it! You have now set up a cron job in CentOS 7 to send reminders using the Reminder Application, and configured the token for the application.



---


# Reminder API

A simple API built with Laravel Sanctum for managing reminders and categories.

## Authentication

To authenticate with the API, send a POST request to `/api/login` with your email and password in the request body. You will receive an API token in the response, which can be used to authenticate subsequent requests.

## Endpoints

The following endpoints are available in the API:

### Reminders

To access reminders endpoints, authentication with an API token is required.

#### Get all reminders

```
GET /api
```

#### Create a new reminder

```
POST /api/reminders/store
```

#### Get a reminder by ID

```
GET /api/reminders/{id}/edit
```

#### Update a reminder

```
PUT /api/reminders/{id}
```

#### Delete a reminder

```
DELETE /api/reminders/{id}
```

### Categories

To access categories endpoints, authentication with an API token is required.

#### Create a new category

```
POST /api/categories/store
```

## Usage

To use the API, send requests with the required parameters. For GET requests, include your API token in the `Authorization` header.

For example, to get all reminders:

```
GET /api
Authorization: Bearer your-api-token
```

To create a new category:

```
POST /api/categories/store
Authorization: Bearer your-api-token
```

For more information on the available endpointsand their parameters, see the documentation in the code.

## Conclusion

This API provides a simple and secure way to manage reminders and categories. By following the instructions in this document, you can easily authenticate with the API and use its endpoints to create, read, update, and delete reminders and categories.
