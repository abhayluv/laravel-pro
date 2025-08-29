# Laravel Pro - Setup Guide

This guide will help you set up the Laravel Pro project on your local development environment.

## 🚀 Quick Start

### Prerequisites

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 18.x or higher
- **NPM**: Latest version
- **Database**: MySQL 8.0+ or PostgreSQL 13+

### Step-by-Step Installation

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd laravel-pro
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   ```

5. **Configure Environment Variables**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_pro
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

7. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed the Database**
   ```bash
   php artisan db:seed
   ```

9. **Build Frontend Assets**
   ```bash
   npm run build
   ```

10. **Set Storage Permissions**
    ```bash
    php artisan storage:link
    chmod -R 775 storage bootstrap/cache
    ```

11. **Start Development Server**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` to access the application.

## 🔧 Configuration

### Database Configuration

1. Create a new database for the project
2. Update database credentials in `.env` file
3. Run migrations: `php artisan migrate`
4. Seed initial data: `php artisan db:seed`

### Analytics Configuration

The analytics system is automatically configured and will start tracking pageviews once the application is running. To customize analytics settings:

1. Visit `/configurations` to access the configuration panel
2. Modify analytics tracking settings as needed
3. Save changes to apply new settings

### User Roles and Permissions

Default roles are created during seeding:

- **Admin**: Full access to all features
- **Manager**: Access to analytics and form management
- **User**: Basic access to dashboard and forms

## 📁 Project Structure

```
laravel-pro/
├── app/
│   ├── Console/Commands/          # Custom Artisan commands
│   ├── Http/
│   │   ├── Controllers/           # Application controllers
│   │   ├── Middleware/            # Custom middleware
│   │   └── Requests/              # Form request validation
│   ├── Models/                    # Eloquent models
│   ├── Providers/                 # Service providers
│   └── View/Components/           # Blade components
├── database/
│   ├── factories/                 # Model factories
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Database seeders
├── resources/
│   ├── css/                       # Stylesheets
│   ├── js/                        # JavaScript files
│   └── views/                     # Blade templates
├── routes/                        # Application routes
├── storage/                       # File storage
└── tests/                         # Application tests
```

## 🎯 Key Features

### Analytics Dashboard

The analytics dashboard provides comprehensive insights into your application's usage:

- **Key Metrics**: Unique visitors, total pageviews, bounce rate, and average session duration
- **Visitor Analytics**: Line chart showing visitor trends over time
- **Device Distribution**: Doughnut chart showing device usage breakdown
- **Top Channels**: Bar chart displaying traffic sources
- **Customer Demographics**: Geographic distribution of users
- **Top Pages**: Most visited pages with pageview counts
- **Recent Activity**: Live feed of user activities

### Configuration System

The dynamic configuration system allows real-time customization:

- **Sidebar Design**: Customize sidebar background, text colors, and fonts
- **Sidebar Links**: Configure active/inactive link states
- **Footer Design**: Customize footer text and styling
- **Live Preview**: See changes instantly without page refresh

### Master Form Management

Create and manage dynamic forms:

- **Form Builder**: Drag-and-drop form creation
- **Field Types**: Text, email, select, checkbox, radio, file upload
- **Validation**: Built-in validation rules
- **Data Export**: Export form submissions in CSV/Excel format

## 🔐 Security Features

- **CSRF Protection**: Built-in CSRF token protection
- **SQL Injection Prevention**: Eloquent ORM with parameter binding
- **XSS Protection**: Automatic HTML escaping in Blade templates
- **Authentication**: Secure user authentication system
- **Authorization**: Role-based access control
- **Input Validation**: Comprehensive form validation

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Run specific test files:

```bash
php artisan test --filter=AnalyticsTest
```

## 📦 Deployment

### Production Deployment

1. **Environment Setup**:
   ```bash
   cp .env.example .env
   # Configure production environment variables
   ```

2. **Optimize for Production**:
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Set Permissions**:
   ```bash
   chmod -R 755 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache
   ```

4. **Database Migration**:
   ```bash
   php artisan migrate --force
   ```

### Server Requirements

- **PHP**: 8.2 or higher
- **Extensions**: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- **Web Server**: Apache/Nginx
- **Database**: MySQL 8.0+ or PostgreSQL 13+

## 🆘 Troubleshooting

### Common Issues

1. **Permission Denied Errors**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

2. **Composer Memory Limit**
   ```bash
   COMPOSER_MEMORY_LIMIT=-1 composer install
   ```

3. **Node.js Version Issues**
   ```bash
   nvm use 18
   npm install
   ```

4. **Database Connection Issues**
   - Check database credentials in `.env`
   - Ensure database server is running
   - Verify database exists

5. **Chart.js Not Loading**
   ```bash
   npm run build
   php artisan view:clear
   ```

## 📞 Support

For support and questions:

- **Documentation**: Check the inline documentation in the code
- **Issues**: Create an issue on the GitHub repository
- **Email**: Contact the development team

---

**Built with ❤️ using Laravel 12**
