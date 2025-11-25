# MiniMartBD

[🔗 Live Link](http://minimartbd.ct.ws/)

MiniMartBD is a **dynamic e-commerce website** built with PHP, MySQL, and Tailwind CSS. It allows users to browse products, manage a shopping cart, place orders, and for admins to manage products and view orders.

---

## 🗂 Project Structure

MiniMartBD/
├── assets/
│   ├── css/
│   │   └── tailwind.css       <-- Tailwind CSS file (compiled)
│   ├── js/
│   │   └── main.js            <-- Your custom JS (optional)
│   └── images/                <-- Product images, logos
│
├── includes/
│   ├── db.php                 <-- Database connection
│   ├── header.php             <-- Site header (navigation bar)
│   ├── footer.php             <-- Site footer
│   └── functions.php          <-- Reusable PHP functions
│
├── admin/
│   ├── index.php              <-- Admin dashboard
│   ├── add_product.php        <-- Add new product
│   ├── edit_product.php       <-- Edit product
│   ├── delete_product.php     <-- Delete product
│   └── manage_orders.php      <-- View orders
│
├── pages/
│   ├── products.php           <-- List all products
│   ├── product_detail.php     <-- Single product view
│   ├── cart.php               <-- Shopping cart page
│   ├── checkout.php           <-- Checkout page
│   └── orders.php             <-- User orders page
│
├── index.php                  <-- Home page
├── login.php                  <-- User login
├── register.php               <-- User registration
├── logout.php                 <-- User logout
└── .htaccess                  <-- Optional for URL rewriting


---

## ⚡ Features

- User authentication (register, login, logout)  
- Product listing and detail view  
- Shopping cart and checkout system  
- Order management for users  
- Admin panel for adding, editing, deleting products and viewing orders  
- Responsive design with Tailwind CSS  
- Clean and reusable PHP code structure  

---

## 💻 Technologies Used

- **Frontend:** HTML, CSS, Tailwind CSS, JavaScript  
- **Backend:** PHP (Procedural)  
- **Database:** MySQL (via phpMyAdmin/XAMPP)  
- **Server:** XAMPP (Apache + MySQL)  

---

## 🚀 Getting Started

1. Clone the repository into your XAMPP `htdocs` folder:

```bash
git clone https://github.com/niloyahmadramjan/minimartbd.git

Start XAMPP (Apache + MySQL)

Create a MySQL database and import the SQL file (if any)

Update database credentials in includes/db.php

Open your browser: http://localhost/minimardbd/


📁 Folder Structure Explained

assets/ → All static files like CSS, JS, and images

includes/ → Common PHP files like database connection, header/footer, functions

admin/ → Admin panel for managing products and orders

pages/ → User-facing pages for products, cart, checkout, and orders




👨‍💻 Author

Md Ramjan Ali – Full-stack developer
