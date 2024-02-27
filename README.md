# Quiz Application

This application allows users to take a quiz by answering random questions. It provides a simple interface for answering questions and shows whether the selected answer is correct or wrong.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the Repository**: Clone the application repository to your local machine:

   ```bash
   git clone <repository-url>
2. Install Dependencies: Navigate to the project directory and install Composer dependencies:
    ```bash
     composer install
3. Generate Application Key: Generate the application key:
     ```bash
     php artisan key:generate
4. Run Migrations: Run database migrations to create the necessary tables:
     ```bash
     php artisan migrate
5. Seed Database: Optionally, seed the database with fake questions, options, and correct answers:
     ```bash
     php artisan db:seed 
6. Running the Application Locally: Start the local development server:
     ```bash
     php artisan serve


## Admin Login

To access the admin dashboard.

- **Username:** admin@admin.com
- **Password:** password

Please note that it's recommended to change the default password after logging in for security reasons. If you forget the password, you can use the "Forgot Password" feature to reset it.

## user Login

To access the user dashboard:

- **Username:** user@user.com
- **Password:** password

Please note that it's recommended to change the default password after logging in for security reasons. If you forget the password, you can use the "Forgot Password" feature to reset it.

