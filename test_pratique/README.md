# PHP MVC Project

A modern PHP MVC (Model-View-Controller) project with user management and contact form functionality.

## Features

- 🏗️ MVC Architecture
- 🔒 User Authentication System
- 📝 Contact Form with Validation
- 🕒 Time Display with Timezone Support
- 📊 Data Display with Modern UI
- 🎨 Tailwind CSS Integration
- 🛡️ Security Features (XSS Protection, SQL Injection Prevention)
- 📱 Responsive Design

## Requirements

- PHP 8.2 or higher
- MySQL 5.7 or higher
- Composer
- Web Server (Apache/Nginx)

## Installation

1. Clone the repository:
```bash
git clone [https://github.com/Nguemoue/afreetech_recrutment.git]
cd [test_pratique]
```

2. Install dependencies:
```bash
composer install
```

3. Configure your database:
   - Update the database credentials in `config/database.php`

4. Run database migrations:
```bash
php app/Database/migrations/create_users_table.php
```

5. Configure your web server:
   - Point the document root to the `public` directory
   - Ensure mod_rewrite is enabled (for Apache)

## Project Structure

```
├── app/
│   ├── Controllers/
│   │   ├── ContactController.php
│   │   └── HomeController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Contact.php
│   ├── Views/
│   │   ├── contact/
│   │   └── home/
│   ├── Core/
│   │   ├── Router.php
│   │   └── Response.php
│   └── Database/
│       ├── Database.php
│       └── migrations/
├── config/
│   └── database.php
├── public/
│   └── index.php
└── vendor/
```

## Available Routes

- `/` - Home page with feature cards
- `/contact` - Contact form
- `/array-display` - User information display
- `/show-hours` - Current time display

## User Management

The project includes a complete user management system with the following features:

- User registration
- User authentication
- User profile management
- Secure password hashing
- Email uniqueness validation

## Security Features

- Password hashing using PHP's built-in `password_hash()`
- PDO prepared statements to prevent SQL injection
- XSS protection with `htmlspecialchars()`
- Input validation and sanitization
- Secure session handling

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- Tailwind CSS for the beautiful UI components
- PHP 8.2 for the modern features
- All contributors who have helped with this project 