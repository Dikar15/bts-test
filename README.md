# Checklist API with Laravel Passport

## 📌 Overview
Sebuah aplikasi backend berbasis Laravel 9 yang menyediakan fitur:
- Register & Login menggunakan Laravel Passport
- CRUD Checklist dan Item Checklist
- API berbasis RESTful

---

## 🛠️ Setup & Installation

### 1️⃣ Clone Repository
```sh
git clone https://github.com/Dikar15/bts-test.git
```

### 2️⃣ Install Dependencies
```sh
composer install
cp .env.example .env
php artisan key:generate
```

### 3️⃣ Konfigurasi Database
Edit file `.env` sesuai database lokal Anda:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```
Lalu jalankan:
```sh
php artisan migrate
```
Kemudian jalankan:
```sh
php artisan config:clear
php artisan serve
```

---

## 🔥 API Endpoints
Gunakan Postman untuk menguji API berikut:

| Method | Endpoint | Description |
|--------|---------|-------------|
| `POST` | `/api/register` | Register User |
| `POST` | `/api/login` | Login & Get Token |
| `POST` | `/api/logout` | Logout User |
| `GET` | `/api/checklists` | Get Checklist |
| `POST` | `/api/checklists` | Create Checklist |
| `PUT` | `/api/checklists/{id}` | Update Checklist |
| `DELETE` | `/api/checklists/{id}` | Delete Checklist |
| `POST` | `/api/checklists/{id}/items` | Add Checklist Item |
| `PUT` | `/api/checklists/items/{id}` | Update Checklist Item |
| `DELETE` | `/api/checklists/items/{id}` | Delete Checklist Item |
