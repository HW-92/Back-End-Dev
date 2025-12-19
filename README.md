# St Alphonsus Primary School - Information Management System

A web-based back-end development project created to digitise the school records for St Alphonsus Primary School. This system replaces paper-based records with a secure, relational database solution.

## 📋 Features

* **Secure Admin Dashboard:** Protected login system for administrators.
* **Class Management:** View classes, capacities, and assigned teachers.
* **Pupil Management (CRUD):** Add, View, Edit, and Delete pupil records.
* **Complex Relationships:** Manage Many-to-Many links between pupils and parents (up to 2 parents per child).
* **Search Functionality:** Unified search bar for finding pupils, teachers, or parents by name.
* **Responsive Design:** Clean, card-based UI that works on different screen sizes.

## 🛠️ Technologies Used

* **Language:** PHP (Server-side scripting)
* **Database:** MySQL (Relational Database)
* **Frontend:** HTML5, CSS3 (Custom "Card" layout)
* **Server:** Apache (via XAMPP)

## ⚙️ Installation & Setup

To run this project locally, follow these steps:

1.  **Clone the repository**
    ```bash
    git clone [https://github.com/HW-92/Back-End-Dev.git](https://github.com/HW-92/Back-End-Dev.git)
    ```

2.  **Set up the Database**
    * Open **phpMyAdmin** (usually `http://localhost/phpmyadmin`).
    * Create a new database named `st_alphonsus_school`.
    * Click **Import** and select the `st_alphonsus_school.sql` file located in this repository.
    * Click **Go** to generate the tables and dummy data.

3.  **Configure Connection (If needed)**
    * Check `db_connect.php` to ensure the credentials match your local server.
    * *Default XAMPP Settings:* User: `root`, Password: `` (empty).

4.  **Run the Website**
    * Move the project folder into your server's root directory (e.g., `htdocs` in XAMPP).
    * Open your browser and navigate to: `http://localhost/st_alphonsus_school/`

## 🔑 Login Credentials

The system includes a pre-configured admin account for testing purposes:

* **Username:** `admin`
* **Password:** `admin123`

## 📂 Project Structure

* `index.php` - Public landing page.
* `view_classes.php` - Main secure hub for admins.
* `db_connect.php` - Database connection settings.
* `style.css` - Custom styling for the interface.
* `view_*.php` - Read-only list views for Classes, Teachers, and Parents.
* `edit_*.php` - Forms to update records.
