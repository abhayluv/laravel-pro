# Users Seeder Documentation

## Overview

The `UsersSeeder` is a comprehensive database seeder that creates users with different roles and establishes relationships between users, roles, and permissions. It provides a complete user management system with hierarchical access control.

## Features

### 🎯 **Core Functionality**
- ✅ **User Creation**: Creates users with complete profile information
- ✅ **Role Assignment**: Assigns appropriate roles to each user
- ✅ **Permission Management**: Establishes role-permission relationships
- ✅ **Hierarchical Access**: Implements role-based access control (RBAC)
- ✅ **Data Integrity**: Uses `firstOrCreate` to prevent duplicate entries

### 👥 **User Types Created**

#### **Admin Users (3 users)**
- **Primary Admin**: `admin@example.com` - System Administrator
- **Additional Admins**: `alex.admin@example.com`, `maria.admin@example.com`
- **Permissions**: Full system access (all permissions)
- **Password**: `password123`

#### **Manager Users (3 users)**
- **Primary Manager**: `manager@example.com` - John Manager
- **Additional Managers**: `david.manager@example.com`, `lisa.manager@example.com`
- **Permissions**: Most system permissions (excluding user management)
- **Password**: `password123`

#### **Employee Users (4 users)**
- **Primary Employee**: `employee@example.com` - Jane Employee
- **Additional Employees**: `mike.employee@example.com`, `emma.employee@example.com`, `tom.employee@example.com`
- **Permissions**: Basic view permissions and master form access
- **Password**: `password123`

#### **HR Users (3 users)**
- **Primary HR**: `hr@example.com` - Sarah HR
- **Additional HR**: `rachel.hr@example.com`, `chris.hr@example.com`
- **Permissions**: User management and basic system access
- **Password**: `password123`

## Database Structure

### User Profile Fields
```php
[
    'name' => 'Full Name',
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email Address',
    'password' => 'Hashed Password',
    'phone' => 'Phone Number',
    'gender' => 'Gender (1=male, 2=female, 3=other)',
    'date_of_birth' => 'Date of Birth',
    'address' => 'Full Address',
    'role_id' => 'Role ID (Foreign Key)',
    'email_verified_at' => 'Email Verification Timestamp'
]
```

### Role Hierarchy
```
Admin (Full Access)
├── All permissions
├── User management
├── System configuration
└── Master form management

Manager (Limited Access)
├── Most permissions
├── No user management
├── System configuration
└── Master form management

HR (User Management)
├── User management permissions
├── Basic system access
├── Master form access
└── No role/permission management

Employee (Basic Access)
├── Configuration view
├── Master form view/add/edit
└── No administrative functions
```

## Permission Matrix

| Permission | Admin | Manager | HR | Employee |
|------------|-------|---------|----|----------|
| `configuration.view` | ✅ | ✅ | ✅ | ✅ |
| `configuration.edit` | ✅ | ✅ | ❌ | ❌ |
| `roles.view` | ✅ | ✅ | ❌ | ❌ |
| `roles.add` | ✅ | ✅ | ❌ | ❌ |
| `roles.edit` | ✅ | ✅ | ❌ | ❌ |
| `roles.delete` | ✅ | ✅ | ❌ | ❌ |
| `roles.status` | ✅ | ✅ | ❌ | ❌ |
| `users.view` | ✅ | ❌ | ✅ | ❌ |
| `users.add` | ✅ | ❌ | ✅ | ❌ |
| `users.edit` | ✅ | ❌ | ✅ | ❌ |
| `users.delete` | ✅ | ❌ | ❌ | ❌ |
| `users.status` | ✅ | ❌ | ✅ | ❌ |
| `master.view` | ✅ | ✅ | ✅ | ✅ |
| `master.add` | ✅ | ✅ | ✅ | ✅ |
| `master.edit` | ✅ | ✅ | ✅ | ✅ |
| `master.delete` | ✅ | ✅ | ❌ | ❌ |
| `master.status` | ✅ | ✅ | ❌ | ❌ |

## Usage

### Running the Seeder

```bash
# Run all seeders (recommended)
php artisan db:seed

# Run only the users seeder
php artisan db:seed --class=UsersSeeder

# Run specific seeders in order
php artisan db:seed --class=RolesTableSeeder
php artisan db:seed --class=PermissionsSeeder
php artisan db:seed --class=UsersSeeder
```

### Database Seeder Integration

The `UsersSeeder` is integrated into the main `DatabaseSeeder`:

```php
// database/seeders/DatabaseSeeder.php
$this->call([
    RolesTableSeeder::class,    // Creates roles first
    PermissionsSeeder::class,   // Creates permissions second
    UsersSeeder::class,         // Creates users with role/permission relationships
    MasterFormSeeder::class,    // Creates master form data
]);
```

## Code Structure

### Main Seeder Class
```php
class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Get existing roles and permissions
        // 2. Create primary users for each role
        // 3. Assign permissions to roles
        // 4. Create additional sample users
    }
}
```

### Helper Methods

#### `assignPermissionsToRoles()`
- Assigns appropriate permissions to each role
- Implements role-based access control
- Uses `sync()` method for many-to-many relationships

#### `createSampleUsers()`
- Creates additional users for each role
- Provides realistic test data
- Maintains data consistency

## Security Features

### Password Security
- All passwords are hashed using Laravel's `Hash::make()`
- Default password: `password123` (should be changed in production)
- Email verification timestamps set for all users

### Data Protection
- Uses `firstOrCreate()` to prevent duplicate entries
- Validates role existence before assignment
- Proper foreign key relationships

### Access Control
- Hierarchical permission system
- Role-based access control (RBAC)
- Principle of least privilege

## Testing

### Verification Commands
```bash
# Check total users created
php artisan tinker --execute="echo App\Models\User::count();"

# Check users by role
php artisan tinker --execute="App\Models\Role::withCount('users')->get()->each(function(\$role) { echo \$role->name . ': ' . \$role->users_count . PHP_EOL; });"

# Check role permissions
php artisan tinker --execute="App\Models\Role::with('permissions')->get()->each(function(\$role) { echo \$role->name . ': ' . \$role->permissions->pluck('name')->implode(', ') . PHP_EOL; });"
```

### Sample Test Data
```php
// Test admin login
$admin = User::where('email', 'admin@example.com')->first();
// Password: password123

// Test role relationship
$user = User::with('role')->first();
echo $user->role->name; // Output: Admin

// Test permission relationship
$role = Role::with('permissions')->where('slug', 'admin')->first();
echo $role->permissions->count(); // Output: 19 (all permissions)
```

## Customization

### Adding New Users
```php
// In the createSampleUsers() method
$newUsers = [
    [
        'name' => 'New User',
        'first_name' => 'New',
        'last_name' => 'User',
        'email' => 'new.user@example.com',
        'phone' => '+1234567903',
        'gender' => 1, // 1=male, 2=female, 3=other
        'date_of_birth' => '1990-01-01',
        'address' => '123 New Street, New City, NC 12345',
    ]
];
```

### Modifying Permissions
```php
// In the assignPermissionsToRoles() method
$customPermissions = $permissions->filter(function ($permission) {
    return in_array($permission->name, [
        'custom.permission1',
        'custom.permission2',
    ]);
})->pluck('id')->toArray();
```

### Adding New Roles
```php
// First add the role in RolesTableSeeder
// Then add role assignment logic in UsersSeeder
$newRole = Role::where('slug', 'new-role')->first();
// Create users with this role
```

## Best Practices

### Production Considerations
1. **Change Default Passwords**: Update all default passwords in production
2. **Email Verification**: Implement proper email verification workflow
3. **Role Review**: Review and adjust permissions based on business requirements
4. **Data Privacy**: Ensure compliance with data protection regulations
5. **Audit Trail**: Implement logging for user actions

### Development Tips
1. **Use Factories**: For large datasets, consider using UserFactory
2. **Environment Variables**: Use environment-specific data
3. **Testing**: Create comprehensive tests for role-permission relationships
4. **Documentation**: Keep permission matrix updated
5. **Version Control**: Track changes to roles and permissions

## Troubleshooting

### Common Issues

#### "Attempt to read property 'id' on null"
- **Cause**: Roles or permissions don't exist
- **Solution**: Run `RolesTableSeeder` and `PermissionsSeeder` first

#### "Invalid datetime format"
- **Cause**: Incorrect data type for gender field
- **Solution**: Use integers (1, 2, 3) instead of strings ('male', 'female', 'other')

#### "Duplicate entry"
- **Cause**: Seeder run multiple times
- **Solution**: Use `firstOrCreate()` method (already implemented)

### Debug Commands
```bash
# Check if roles exist
php artisan tinker --execute="echo App\Models\Role::count();"

# Check if permissions exist
php artisan tinker --execute="echo App\Models\Permission::count();"

# Check user-role relationships
php artisan tinker --execute="App\Models\User::with('role')->get()->each(function(\$u) { echo \$u->email . ' -> ' . (\$u->role ? \$u->role->name : 'No Role') . PHP_EOL; });"
```

## Conclusion

The `UsersSeeder` provides a robust foundation for user management with role-based access control. It creates a complete user ecosystem with proper relationships and permissions, making it easy to test and develop applications with different user access levels.

For production use, remember to:
- Change default passwords
- Review and customize permissions
- Implement proper security measures
- Add comprehensive logging and monitoring
