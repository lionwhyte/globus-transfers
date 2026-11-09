# Globus-Transfers 🚐💨

Professional multi-language transfer and booking web application built with Laravel, Tailwind CSS, and MySQL.

## 🚀 About The Project
Globus-Transfers is a robust booking system designed for private transfer services. It features dynamic route calculation, multi-language support (middleware-driven localization), secure booking workflows, automated PDF invoice generation with QR codes (HRVHUB30 standard), and email notifications.

## 🛠️ Built With
* **Framework:** [Laravel](https://laravel.com/) (PHP)
* **Frontend:** Tailwind CSS, Blade Templates, JavaScript (Google Maps API)
* **Database:** MySQL
* **Payments & PDFs:** Srmklive PayPal, Dompdf, Milon Barcode
* **Environment:** XAMPP, Node.js, Composer

## ✨ Key Features
* **Multi-Language Support:** Seamless localization via custom middleware (`/hr/`, `/en/`).
* **Dynamic Route Search & Pricing:** Real-time distance, duration, and tiered vehicle pricing (Standard, Minivan, Minibus).
* **Automated Invoicing:** Generates customized PDF invoices with QR codes (HRVHUB30) for bank transfers.
* **Clean Architecture:** Refactored controller logic utilizing Form Requests and Service Layers (`InvoiceService`).
* **Email Workflows:** Automated confirmation emails for both customers and company administration.

## ⚙️ Getting Started (Local Installation)

1. Clone the repository:
    git clone [https://github.com/lionwhyte/globus-transfers.git](https://github.com/lionwhyte/globus-transfers.git)

2. Install PHP dependencies:
    composer install

3. Install frontend dependencies:
    npm install && npm run build

4. Copy the environment file and configure your database:
    cp .env.example .env
    php artisan key:generate

5. Run database migrations and seeders:
    php artisan migrate


6. Start the local development server:
    php artisan serve
