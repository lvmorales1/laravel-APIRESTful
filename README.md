
# RESTful API using Laravel

This project implements a RESTful API using Laravel, which provides and receives information from a MySQL database. The API is secure and uses JWT authentication to authenticate user requests.

## Prerequisites

Before you begin, make sure you have installed the following:

-   PHP >= 8.3
-   Composer
-   MySQL

## Configuration

1.  **Clone the repository:**
    
    ```bash
    git clone git@github.com:lvmorales1/laravel-APIRESTful.git
    cd laravel-APIRESTful
    ```

2. **Install Composer dependencies:**
    
    ```bash
    composer install
    ```

3. **Create a `.env` file in the project root and copy the contents from the `.env.example` file into it:**
    
    ```bash
    cp .env.example .env
    ```

Configure the necessary environment variables in the .env file, including the database and JWT settings.

4. **Generate an application key:**
    
    ```bash
    php artisan key:generate
    ```

5. **Run the database migrations:**
    
    ```bash
    php artisan migrate
    ```

6. **Start the development server:**
    
    ```bash
    php artisan serve
    ```

The API will be accessible at http://localhost:8000.


## Authentication

The API uses JWT (JSON Web Token) authentication. To authenticate a request, include the JWT token in the `Authorization: Bearer token` header.

## Endpoints

### List all items

-   **URL:** `/api/items`
-   **Method:** GET
-   **Query Parameters:** None
-   **Authentication:** Yes, JWT token required

### Get information about a specific item

-   **URL:** `/api/items/{id}`
-   **Method:** GET
-   **URL Parameters:** `{id}` - Item ID
-   **Authentication:** Yes, JWT token required

### Request Examples

#### List all items
    ```bash
    curl -X GET http://localhost:8000/api/items \
    -H "Authorization: Bearer your-jwt-token"
    ```

#### Get information about a specific item
    ```bash
    curl -X GET http://localhost:8000/api/items/1 \
    -H "Authorization: Bearer your-jwt-token"
    ```

## API Documentation
The API is documented using Swagger UI. To access the interactive API documentation, start the server and visit:
    ``` bash
    http://localhost:8000/api/documentation
    ```

## Testing
To run the automated tests, use the following command:
    ```bash
    php artisan test
    ```

## License
This project is licensed under the MIT License. See the `LICENSE` file for more information.

