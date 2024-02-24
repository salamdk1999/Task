# Task

**This project is a Laravel-based backend API that manages users and products. It includes features such as user
registration, login, CRUD operations for users and products, and dynamic pricing based on user types.**

## Installation

Clone the repository to your local machine: **git clone https://github.com/salamdk1999/Task.git**

Install the project dependencies using Composer:  **cd project-directory** then **composer install**

Create a copy of the **.env.example** file and rename it to **.env**. Update the necessary database configuration and other
environment variables in the .env file.

Generate an application key: **php artisan key:generate**

Run the database migrations: **php artisan migrate**

Seed the database with initial data: **php artisan db:seed**

Start the development server: **php artisan serve**

## Testing with Postman

### You can test this project by using Postman. Follow these steps:

1. Download and install Postman from the Postman website.
2. Import the Postman collection by clicking on the "Import" button in Postman and selecting the `Task/postman_collection/Task.postman_collection.json`.
3. Once imported, you will see the collection and its requests in the left sidebar.
4. Configure any necessary environment variables within Postman if required for authentication tokens, base URLs, or other configuration values.
5. Start testing the project by sending requests using the imported collection.

## Features

### Repository Pattern for Better Code Organization

This project follows the repository design pattern, which provides a structured and organized approach to separate the data access logic from the controllers. By adopting the repository pattern, the project achieves improved code organization, maintainability, and scalability.

### Data Transfer Objects (DTOs)

This project utilizes Data Transfer Objects (DTOs) are used in API responses to provide a clean and standardized representation of data.

### Language Translation

To support multilingual functionality, this project incorporates language translation capabilities. It allows for easy localization of the API responses by providing language files for different languages.

### Factory and Seeder for Test Data

To facilitate testing and development, this project uses Laravel's factory and seeder functionality to generate fake data.

### SEO-friendly Slugs for Products

In order to improve search engine optimization (SEO), this project utilizes slugs for product URLs. Slugs are URL-friendly representations of the product names or titles. They are generated automatically based on the product name and ensure that the URLs are human-readable and contain relevant keywords.

### Request Validation for Enhanced Security

To ensure enhanced security and data integrity, this project utilizes Laravel's request validation feature. Request validation allows for the validation of incoming requests to ensure that they meet specific criteria and constraints defined by the application. By validating user input, it safeguards against malicious data and helps prevent common security vulnerabilities such as SQL injection and cross-site scripting (XSS) attacks.

### Visualizing the Project Structure with XMind

A visual representation of the project structure can greatly aid in understanding and communicating the project's components, relationships, and dependencies. To facilitate this, an XMind file has been provided in the` Task/Xmind/Task.Xmind` directory. You can open this file using XMind, a popular mind mapping tool, to view and interact with the project structure diagram.

If you don't have XMind installed, you can also access a PDF version of the project structure diagram in the `Task/Xmind/Task.pdf` file. This allows everyone involved in the project to have a visual depiction of the project structure, helping to facilitate discussions, planning, and decision-making.
