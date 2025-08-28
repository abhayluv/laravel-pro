# Master Form Module

A comprehensive form management system built with Laravel 12, featuring all types of form fields with validation, file uploads, and modern UI components including **CKEditor 5** for rich text editing.

## Features

### 📋 Form Fields Included

1. **Text Fields**
   - Full Name (required, max 255 characters)
   - Email (required, unique, email validation)
   - Phone Number (required, max 20 characters)
   - Address (optional, max 1000 characters)

2. **Selection Fields**
   - Gender (Radio buttons: Male, Female, Other)
   - Single Selection (Dropdown with numeric values)
   - Multi Selection (Checkboxes with numeric values)
   - Languages (Checkboxes: English, Hindi, Gujarati)

3. **File Upload Fields**
   - Image Upload (JPG, JPEG, PNG, GIF, max 2MB)
   - Video Upload (MP4, AVI, MOV, FLV, WMV, WEBM, max 10MB)
   - Image and Video preview functionality

4. **Date & Time Fields**
   - Date Field
   - Time Field
   - DateTime Field
   - Date Range (Start and End dates)

5. **Interactive Fields**
   - Range Slider (0-100 with visual feedback)
   - Star Rating (1-5 stars with hover effects)
   - Digital Signature (Canvas-based drawing)
   - **Text Editor (CKEditor 5 with rich formatting)**

6. **Security Fields**
   - Password (with confirmation)
   - Captcha (Auto-generated with refresh)

### 🎨 UI Features

- **Grid and List Views** for data listing
- **Status Toggle** with real-time AJAX updates
- **Search and Filter** functionality
- **Responsive Design** with Tailwind CSS
- **Modern Form Components** with validation
- **File Preview** for images and videos
- **Interactive Elements** (sliders, star ratings, signature)
- **Rich Text Editor** with CKEditor 5

### 🔧 Technical Features

- **Complete CRUD Operations** (Create, Read, Update, Delete)
- **Form Validation** with custom error messages
- **File Upload Management** with automatic cleanup
- **Database Relationships** and proper indexing
- **AJAX Status Updates** without page refresh
- **Security Features** (CSRF protection, file validation)
- **Sample Data Generation** with factories and seeders
- **CKEditor 5 Integration** for rich text editing

## Installation & Setup

### 1. Database Migration
```bash
php artisan migrate
```

### 2. Storage Link
```bash
php artisan storage:link
```

### 3. Seed Sample Data (Optional)
```bash
php artisan db:seed --class=MasterFormSeeder
```

### 4. Build Assets
```bash
npm run build
```

## Usage

### Accessing the Module
1. Navigate to the sidebar
2. Click on "Master Form" (appears below "General Settings")
3. You'll see the listing page with grid/list view options

### Creating a New Form
1. Click "+ New Master Form" button
2. Fill in the required fields (marked with *)
3. Upload files if needed
4. Use interactive elements (slider, stars, signature)
5. **Use CKEditor for rich text formatting** in the Text Editor field
6. Submit the form

### Managing Forms
- **View**: Click "View" to see all details
- **Edit**: Click "Edit" to modify the form
- **Delete**: Click "Delete" to remove the form
- **Toggle Status**: Use the switch to activate/deactivate

## CKEditor 5 Integration

### Features
- **Rich Text Formatting**: Bold, italic, underline, strikethrough
- **Text Alignment**: Left, center, right, justify
- **Lists**: Bulleted and numbered lists
- **Links**: Insert and edit hyperlinks
- **Tables**: Create and edit tables
- **Media Embed**: Embed videos and other media
- **Font Colors**: Text and background colors
- **Headings**: Multiple heading levels
- **Undo/Redo**: Full editing history

### Toolbar Configuration
The CKEditor toolbar includes:
- Undo/Redo
- Headings (H1, H2, H3, etc.)
- Text formatting (Bold, Italic, Underline, Strikethrough)
- Links, Blockquotes, Tables, Media Embed
- Lists (Bulleted and Numbered)
- Indentation controls
- Font colors and background colors
- Text alignment
- Remove formatting

### Customization
The CKEditor is configured with:
- **Language**: English
- **Height**: 200px minimum, 400px maximum
- **Styling**: Custom Tailwind CSS integration
- **Focus States**: Indigo color scheme matching the app design

## File Structure

```
app/
├── Models/
│   └── MasterForm.php              # Eloquent model with relationships
├── Http/Controllers/
│   └── MasterFormController.php    # CRUD operations and validation
├── Database/
│   ├── Migrations/
│   │   └── create_master_forms_table.php
│   ├── Factories/
│   │   └── MasterFormFactory.php
│   └── Seeders/
│       └── MasterFormSeeder.php

resources/views/master-forms/
├── index.blade.php                 # Listing with grid/list views
├── create.blade.php                # Create form with all fields + CKEditor
├── edit.blade.php                  # Edit form with pre-filled data + CKEditor
└── show.blade.php                  # Detailed view with HTML rendering

resources/views/layouts/
└── app.blade.php                   # Main layout with CKEditor CDN

resources/css/
└── app.css                         # Custom CKEditor styling
```

## Database Schema

```sql
CREATE TABLE master_forms (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    gender ENUM('1','2','3') NOT NULL COMMENT '1-male, 2-female, 3-other',
    single_selection BIGINT UNSIGNED NULL,
    multi_selection JSON NULL,
    image_path VARCHAR(255) NULL,
    video_path VARCHAR(255) NULL,
    languages JSON NULL,
    password VARCHAR(255) NOT NULL,
    date_field DATE NULL,
    time_field TIME NULL,
    datetime_field DATETIME NULL,
    date_range_start DATE NULL,
    date_range_end DATE NULL,
    range_slider_value INT DEFAULT 50,
    address TEXT NULL,
    signature TEXT NULL,
    text_editor LONGTEXT NULL,        # Stores CKEditor HTML content
    star_rating INT DEFAULT 0,
    captcha VARCHAR(255) NULL,
    status BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Validation Rules

### Required Fields
- `full_name`: Required, max 255 characters
- `email`: Required, valid email, unique
- `phone_number`: Required, max 20 characters
- `gender`: Required, must be 1, 2, or 3
- `single_selection`: Required, integer
- `multi_selection`: Required, array of integers
- `password`: Required, min 8 characters, confirmed

### Optional Fields
- `image`: Image file (JPG, JPEG, PNG, GIF), max 2MB
- `video`: Video file (MP4, AVI, MOV, FLV, WMV, WEBM), max 10MB
- `languages`: Array of strings (English, Hindi, Gujarati)
- `date_field`: Valid date
- `time_field`: Valid time format (H:i)
- `datetime_field`: Valid datetime
- `date_range_start/end`: Valid dates, end must be after start
- `range_slider_value`: Integer between 0-100
- `address`: String, max 1000 characters
- `signature`: String (base64 image data)
- `text_editor`: String (HTML content from CKEditor)
- `star_rating`: Integer between 0-5
- `captcha`: String

## Custom Error Messages

All validation rules include custom error messages for better user experience:

```php
'full_name.required' => 'Full name is required.',
'email.unique' => 'This email address is already registered.',
'image.mimes' => 'Only JPG, JPEG, PNG, and GIF files are allowed.',
'password.confirmed' => 'Password confirmation does not match.',
// ... and many more
```

## JavaScript Features

### Interactive Components
1. **Image/Video Preview**: Real-time preview when files are selected
2. **Star Rating**: Hover effects and click functionality
3. **Range Slider**: Visual feedback with value display
4. **Digital Signature**: Canvas-based drawing with save/clear
5. **Captcha**: Auto-generation with refresh button
6. **Status Toggle**: AJAX updates without page refresh
7. **CKEditor 5**: Rich text editing with full toolbar

### AJAX Functionality
- Status toggle updates via fetch API
- Real-time form validation feedback
- File upload progress (if needed)
- CKEditor content synchronization with form submission

## Styling

### Custom CSS
- Range slider styling for cross-browser compatibility
- Star rating hover effects
- Custom scrollbars for multi-selection
- File upload button styling
- Signature canvas styling
- **CKEditor custom styling** with Tailwind integration

### CKEditor Styling
```css
.ck-editor__editable {
    min-height: 200px !important;
    max-height: 400px !important;
}

.ck-editor__editable_inline {
    border: 1px solid #d1d5db !important;
    border-radius: 0.375rem !important;
}

.ck.ck-editor__main > .ck-editor__editable.ck-focused {
    border-color: #4f46e5 !important;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important;
}
```

### Tailwind Classes
- Responsive grid layouts
- Modern form styling
- Interactive hover states
- Consistent spacing and typography

## Testing

Run the included tests:
```bash
php artisan test tests/Feature/MasterFormTest.php
```

Test coverage includes:
- Authentication requirements
- Form creation
- Page rendering
- Database operations
- **CKEditor presence in forms**

## Security Features

1. **CSRF Protection**: All forms include CSRF tokens
2. **File Validation**: Strict file type and size validation
3. **SQL Injection Prevention**: Eloquent ORM with parameter binding
4. **XSS Prevention**: Proper output escaping
5. **Authentication**: All routes require authentication
6. **Authorization**: Verified email requirement
7. **CKEditor Security**: Content sanitization and validation

## Performance Optimizations

1. **Database Indexing**: Proper indexes on frequently queried fields
2. **File Storage**: Efficient file organization in storage
3. **Pagination**: Large datasets are paginated
4. **Lazy Loading**: Relationships loaded only when needed
5. **Asset Optimization**: Minified CSS and JS
6. **CKEditor CDN**: Fast loading from CDN

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive design
- Progressive enhancement for older browsers
- Canvas support for signature functionality
- **CKEditor 5 compatibility** across all modern browsers

## Troubleshooting

### Common Issues

1. **File Uploads Not Working**
   - Ensure storage link is created: `php artisan storage:link`
   - Check file permissions on storage directory
   - Verify file size limits in PHP configuration

2. **Database Errors**
   - Run migrations: `php artisan migrate`
   - Check database connection settings
   - Verify table structure

3. **Assets Not Loading**
   - Build assets: `npm run build`
   - Check Vite configuration
   - Verify public/build directory exists

4. **AJAX Not Working**
   - Check CSRF token in meta tag
   - Verify JavaScript console for errors
   - Ensure proper route definitions

5. **CKEditor Not Loading**
   - Check internet connection (CDN access)
   - Verify CKEditor CDN links in app.blade.php
   - Check browser console for JavaScript errors
   - Ensure jQuery is loaded before CKEditor

## Future Enhancements

Potential improvements for the module:
- Advanced search with filters
- Bulk operations (import/export)
- Form templates
- **Advanced CKEditor plugins** (file upload, image editing)
- File compression and optimization
- API endpoints for mobile apps
- Advanced validation rules
- Form analytics and reporting
- **CKEditor custom builds** for specific use cases

## Support

For issues or questions:
1. Check the troubleshooting section
2. Review the validation rules
3. Test with sample data
4. Check browser console for JavaScript errors
5. Verify Laravel logs for PHP errors
6. **Check CKEditor documentation** for editor-specific issues

---

**Master Form Module** - A comprehensive form management solution for Laravel applications with CKEditor 5 integration for rich text editing.
