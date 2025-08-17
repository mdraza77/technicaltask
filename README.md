# Laravel Recycling Facility Directory - Technical Task

This application was developed as a technical task. The goal is to create a directory to manage recycling facilities, featuring user authentication, CRUD for facilities, search functionality, and data ownership.



---

## Features Implemented

-   **User Authentication:**
    -   Secure user registration and login system.
    -   Password reset functionality.
    -   Protected routes accessible only to authenticated users.

-   **Facility Management (CRUD):**
    -   Feature to create new facilities.
    -   A paginated view to list all facilities.
    -   Functionality to edit and update facility details.

-   **Data Ownership & Security:**
    -   Each user can only view, edit, or delete their own facilities.
    -   No user can access another user's data, ensuring data privacy.

-   **Search Functionality:**
    -   Ability to search for facilities by their business name or address.
    -   Search results work seamlessly with pagination.

-   **Trash & Restore (Soft Deletes):**
    -   Functionality to soft delete (move to trash) facilities.
    -   A dedicated trash page to view all soft-deleted records.
    -   Ability to restore trashed facilities.
    -   A feature to **permanently delete** a facility from the database.

-   **Many-to-Many Relationship:**
    -   A many-to-many relationship is established between Facilities and Materials.
    -   Users can select multiple recyclable materials when creating or editing a facility.

---

## Tech Stack

-   **Backend:** Laravel 11
-   **Frontend:** Tailwind CSS, Blade Templates
-   **Database:** MySQL
-   **Authentication:** Laravel Breeze
-   **Development Environment:** Laragon

---

## Installation Steps

Follow the steps below to set up the project on your local machine:

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/mdraza77/technicaltask.git
    cd technicaltask
    ```

2.  **Install Dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Set Up the Environment File:**
    -   Copy the `.env.example` file to a new file named `.env`.
    ```bash
    cp .env.example .env
    ```
    -   Open your `.env` file and set your database name, username, and password.
    ```
    DB_DATABASE=recycling_directory
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5.  **Run Database Migrations & Seeding:**
    -   This command will create all necessary tables and populate them with dummy data.
    -   This is a destructive command and will wipe all existing data from the database.
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Compile Frontend Assets:**
    ```bash
    npm run dev
    ```

7.  **Start the Development Server:**
    ```bash
    php artisan serve
    ```
    You can now access the application at `http://127.0.0.1:8000`.

---

## Login Credentials

You can log in and test the application's features using the following dummy account created by the seeder:

-   **Email:** `mdraza8297@gmail.com`
-   **Password:** `raza123123`

## 👨‍💻 About the Developer

This project was created by **Md Raza**. I am a passionate web developer interested in building modern and efficient applications with Laravel and other technologies.

- 🔗 **LinkedIn:** [https://www.linkedin.com/in/md-raza-web-developer/](https://www.linkedin.com/in/md-raza-web-developer/)
- 🐙 **GitHub:** [https://github.com/mdraza77](https://github.com/mdraza77)
- 🌐 **Portfolio:** [https://mdraza77.github.io/Portfolio/](https://mdraza77.github.io/Portfolio/)
- 📧 **Email:** [mdraza8397@gmail.com](mailto:mdraza8397@gmail.com)