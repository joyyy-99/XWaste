# XWaste — Smart Waste Management System for Nairobi

**XWaste** is a web-based waste management platform designed to address Nairobi’s waste collection challenges through digitization, real-time tracking, and resident empowerment. Built for efficiency and transparency, XWaste allows residents to schedule pickups, manage subscriptions, request bins, and monitor garbage trucks — all from a single interface.

---

## 🚀 Features

### Resident Features
- 🏠 **Household Registration** with geolocation support
- 🗑️ **Garbage Bin Requests** for various waste types
- 📆 **Waste Pickup Scheduling** with interactive calendar
- 💳 **Secure Payments** (Card and Cash options via Stripe)
- 🛰️ **Real-time Garbage Truck Tracking** using Leaflet.js
- 💬 **Feedback Submission** for service improvement
- 📢 **Recycling Education** with interactive hover guides

### Admin Features
- 👤 Manage Residents, Employees, and Households
- 🚛 Register, Assign, and Track Garbage Trucks
- 💼 Oversee Payments, Subscriptions, and Feedback
- 📊 Central Dashboard for operational coordination

---

## 🧰 Tech Stack

| Layer       | Tools Used                      |
|-------------|---------------------------------|
| **Frontend**| HTML, CSS, JavaScript, Blade, Leaflet.js |
| **Backend** | Laravel (PHP)                  |
| **Database**| MySQL                           |
| **Payments**| Stripe API                      |
| **Mapping** | Leaflet.js (OpenStreetMap)      |
| **Deployment** | Apache / XAMPP / CI/CD Ready |

---

## 🏙️ Why XWaste?

Nairobi generates over 2,400 tonnes of waste daily, with only 45% processed or treated. XWaste addresses irregular collections, illegal dumping, and low recycling awareness by empowering residents to:
- Schedule services on demand
- Get transparent access to waste operations
- Promote sustainable recycling habits

---

## 📦 Project Structure

```plaintext
XWaste/
│
├── public/                  # Frontend HTML & assets
├── resources/views/         # Blade templates
├── app/                     # Laravel backend logic
├── routes/                  # Web routes (web.php)
├── database/                # Migrations and schema
├── .env                     # Environment config
└── README.md
````

---

## 🛠️ Setup & Installation

### 1. Clone the Repository

```bash
git clone https://github.com/joyyy-99/XWaste.git
cd XWaste
```

### 2. Configure Laravel

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### 3. Run the App Locally

```bash
php artisan serve
```

Then open `http://localhost:8000` in your browser.

## 💡 Future Improvements

* 📱 Mobile App Integration (Kotlin or React Native)
* 🇰🇪 M-Pesa Payments
* 🔔 SMS Pickup Reminders
* 🧍‍♂️ Employee Portal for field teams

---

## 👩🏽‍💻 Authors

* Joy Awino — [@joyyy-99](https://github.com/joyyy-99)
* Anita Kamau

---

> **Built with purpose. Powered by code. Designed for Nairobi.** 🌍

```

