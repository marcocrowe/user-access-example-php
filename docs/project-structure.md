# Project Structure

```txt
project-root/
│
├── config/
│   └── database.php           # Database configuration file
│
├── src/
│   ├── Controller/
│   │   ├── CustomerController.php    # Controller handling customer actions
│   │   └── SellerController.php      # Controller handling seller actions
│   │
│   ├── Model/
│   │   ├── Customer.php             # Customer model
│   │   ├── Order.php                # Order model
│   │   └── Product.php              # Product model
│   │
│   ├── Repository/
│   │   ├── CustomerRepository.php    # Repository for customer data access
│   │   ├── OrderRepository.php       # Repository for order data access
│   │   └── ProductRepository.php     # Repository for product data access
│   │
│   ├── Service/
│   │   └── CartService.php     # Service for managing shopping cart
│   │
│   └── View/
│       ├── customer/          # Views for customer-related pages
│       │   ├── login.php
│       │   ├── register.php
│       │   └── ...
│       │
│       ├── seller/            # Views for seller-related pages
│       │   ├── login.php
│       │   ├── dashboard.php
│       │   └── ...
│       │
│       └── shared/            # Shared views/components
│           ├── header.php
│           ├── footer.php
│           └── ...
│
├── public/
│   ├── css/
│   │   └── styles.css         # CSS files
│   │
│   ├── js/
│   │   └── script.js          # JavaScript files
│   │
│   ├── img/
│   │   └── product1.jpg       # Image files
│   │
│   └── index.php              # Entry point for the application
│
└── vendor/                     # Composer dependencies
```
