# Encryption App (Laravel)

## Overview
**Encryption App** is a Laravel-based application that demonstrates secure data encryption and decryption using Laravel’s built-in cryptography features. This project is designed as a learning reference, experimental project, or a foundational codebase for applications that require secure handling of sensitive data.

The application leverages Laravel’s officially supported encryption services, ensuring compliance with modern security standards.

---

## Key Features
- Secure data encryption and decryption
- Environment-based encryption key management (`APP_KEY`)
- Standard Laravel project structure
- Ready for extension and further development
- Automated testing support using PHPUnit

---

## Tech Stack
- PHP ^8.x
- Laravel Framework
- Composer (PHP Dependency Manager)
- Node.js & NPM
- Vite (Frontend asset bundler)
- PHPUnit (Testing framework)

---

## System Requirements
- PHP >= 8.0
- Composer
- Node.js >= 16.x
- NPM or Yarn
- Database (MySQL / PostgreSQL / SQLite)

---

## Installation Guide

### 1. Clone the Repository
```bash
git clone https://github.com/Kazetama/encryption.git
cd encryption
```

### 2. Install Backend Dependencies
```bash
composer install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

**Important:**  
The `APP_KEY` must never be committed to version control.

---

### 4. Database Setup
Configure your database in `.env`, then run:
```bash
php artisan migrate
```

---

### 5. Frontend Setup
```bash
npm install
npm run build
```

Development mode:
```bash
npm run dev
```

---

### 6. Run the Application
```bash
php artisan serve
```

Access the app at:
http://127.0.0.1:8000

---

## Encryption Example

```php
use Illuminate\Support\Facades\Crypt;

$encrypted = Crypt::encryptString('Sensitive Data');
$decrypted = Crypt::decryptString($encrypted);
```

Laravel uses AES-256-CBC encryption by default.

---

## Project Structure
```
app/            Application logic
config/         Configuration files
database/       Migrations & seeders
routes/         Routes
resources/      Views & frontend assets
tests/          Automated tests
```

---

## Testing
```bash
php artisan test
```

---

## Security Notes
- Do not commit `.env` files
- Use different `APP_KEY` values per environment
- Never store sensitive data in plaintext

---

## Contributing
1. Fork the repository
2. Create a feature branch
3. Commit changes
4. Open a Pull Request

---

## License
No license specified yet. Consider adding an MIT License.

---

## Disclaimer
This project is a reference implementation. Additional security reviews are required for production use.
