# 🛍️ Product Catalog - CodeIgniter 4 Project

Hey there! 👋 This is a simple but functional product catalog web app built with CodeIgniter 4. Perfect for learning MVC architecture and basic CRUD operations.

## 📋 What This Project Does

This is a basic product management system where you can:
- View all products in a nice table format
- Add new products with name and price
- Delete products you don't need anymore
- See product count and creation dates
- Get validation errors if you mess up the form

Think of it like a mini inventory system for a small store! 🏪

## ✨ Features Implemented

### Basic Features
- **Product Listing** - Shows all products in a clean table
- **Add Products** - Form to create new products with validation
- **Delete Products** - Remove products with confirmation dialog
- **Flash Messages** - Success/error notifications that look professional
- **Input Validation** - Server-side validation for product name and price
- **Responsive Design** - Custom CSS that looks good on different screen sizes

### Extra Credit Features 🌟
- **Product Counter** - Shows total number of products
- **Formatted Pricing** - Displays prices with proper currency formatting ($19.99)
- **Timestamps** - Shows when each product was created
- **Form Persistence** - Keeps your input if validation fails
- **CSRF Protection** - Security feature to prevent form attacks
- **Confirmation Dialogs** - "Are you sure?" popup before deleting
- **Clean UI** - Custom styling that doesn't look like it's from 2005

## 📁 File Structure (MVC Components)

Here's how the code is organized following MVC pattern:

```
app/
├── Controllers/
│   └── Products.php          # 🎮 Handles all product-related requests
├── Models/
│   └── ProductModel.php      # 🗃️ Manages database operations & validation
├── Views/
│   └── products/
│       ├── index.php         # 👀 Main product listing page
│       └── create.php        # ➕ Add new product form
├── Database/
│   └── Migrations/
│       └── CreateProductsTable.php  # 🏗️ Database table structure
└── Config/
    └── Routes.php            # 🛣️ URL routing configuration
```

### What Each Component Does:

**Controller (`Products.php`):**
- `index()` - Gets all products and shows the main page
- `create()` - Shows the "add product" form
- `store()` - Processes form submission and saves to database
- `delete()` - Removes a product (with safety checks)

**Model (`ProductModel.php`):**
- Defines the database table structure
- Sets up validation rules (name required, price must be positive)
- Handles all database operations automatically

**Views:**
- `index.php` - The main catalog page with product table
- `create.php` - Form for adding new products

## 🗄️ Database Setup

The database table is already set up through migrations! Here's what it looks like:

```sql
products table:
- id (auto-increment primary key)
- name (varchar 255)
- price (decimal 10,2)
- created_at (datetime)
- updated_at (datetime)
```

If you need to run the migration manually:
```bash
php spark migrate
```

## 🚀 Installation & Setup

1. **Clone or download** this project to your XAMPP htdocs folder

2. **Start XAMPP** and make sure Apache and MySQL are running

3. **Navigate to project folder** in terminal:
   ```bash
   cd c:\xampp\htdocs\webdev2-exercise2-product-catalog
   ```

4. **Install dependencies** (if needed):
   ```bash
   composer install
   ```

5. **Set up environment file**:
   - Copy `env` to `.env`
   - Update database settings in `.env` if needed

6. **Run database migration**:
   ```bash
   php spark migrate
   ```

7. **Access the application**:
   - **For XAMPP users**: Open your browser and go to: `http://localhost/webdev2-exercise2-product-catalog/public/products`
   - **Alternative - Using CodeIgniter's development server**:
     ```bash
     php spark serve
     ```
     Then go to: `http://localhost:8080/products`

## 🎯 How to Use

1. **View Products**: Go to `/products` to see all products
2. **Add Product**: Click "Add New Product" button, fill out the form
3. **Delete Product**: Click the red "Delete" button next to any product
4. **Validation**: Try submitting empty fields to see error messages

### URL Routes:
- `GET /products` - Main product listing
- `GET /products/create` - Add product form
- `POST /products/store` - Submit new product
- `DELETE /products/delete/{id}` - Delete a product

## 🏆 Extra Credit Features Explained

**Why these features are cool:**

1. **Product Counter** - Shows you have X products at a glance
2. **Price Formatting** - Makes prices look professional with $ and 2 decimals
3. **Timestamps** - Track when products were added (useful for inventory)
4. **Form Validation** - Prevents bad data from getting into your database
5. **Flash Messages** - User-friendly feedback instead of ugly error pages
6. **CSRF Protection** - Security best practice (prevents malicious form submissions)
7. **Custom Styling** - Looks way better than default browser styles

## 🛠️ Technologies Used

- **CodeIgniter 4** - PHP framework (makes MVC easy)
- **PHP 8+** - Server-side programming language
- **MySQL** - Database for storing products
- **HTML5 & CSS3** - Frontend structure and styling
- **XAMPP** - Local development environment

## 🤓 Learning Notes

This project demonstrates:
- **MVC Architecture** - Separation of concerns
- **Database Migrations** - Version control for database structure
- **Form Validation** - Both client and server-side
- **CRUD Operations** - Create, Read, Update, Delete
- **Security Practices** - CSRF protection, input sanitization
- **User Experience** - Flash messages, confirmations, form persistence

## 🐛 Common Issues

**Server won't start?**
- Make sure you're in the right directory
- Check if port 8080 is already in use

**Database errors?**
- Make sure MySQL is running in XAMPP
- Check your database credentials in `.env`
- Run `php spark migrate` to create tables

**Page not found?**
- Make sure you're going to `/products` not just `/`
- Check that mod_rewrite is enabled in Apache

---

Made with ❤️ for Web Development 2 class. Happy coding! 🚀
