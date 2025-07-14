# URL Shortener API (Laravel 12)

A RESTful API that allows users to shorten long URLs, retrieve the original URL, update or delete the short URL, and view usage statistics.

---

## 🚀 Features

- Create short URLs from long URLs  
- Retrieve original URLs using a shortcode  
- Update and delete short URLs  
- Track access count (number of times the short URL is used)  
- Redirect endpoint for short URL access  

---

## 🛠️ Tech Stack

- Laravel 12 (PHP Framework)  
- MySQL (Database, using XAMPP)  
- Composer (PHP package manager)  
- NPM (optional for assets — not required for API only)

---

📥 Installation Guide
1. Clone the repository
➡️ Clone the repository and open it in your code editor.

2. Install PHP dependencies
composer install

3. Install JavaScript dependencies
npm install

4. Copy .env and generate app key
cp .env.example .env
php artisan key:generate

5. Configure .env file
Open .env and update your database settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

6. Run migrations
php artisan migrate

7. Serve the application
php artisan serve






