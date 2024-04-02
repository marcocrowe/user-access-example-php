# PHP Style Guide

PHP naming conventions help to ensure consistency and readability in your code. Here are some common PHP naming conventions:

## Class Names

Class names should be declared in TitleCase (also known as PascalCase) where each word starts with a capital letter, and there are no underscores between words. Example: `class ProductRepository`.

**Bad Example:**

| Class Name           | Reason                                         |
|----------------------|------------------------------------------------|
| `product_repository` | snake_case is not recommended for class names. |

## Interface Names

Interface names should follow the same convention as class names, using TitleCase. Example: `interface ProductRepositoryInterface`.

## Method Names

Method names should be declared in camelCase, where the first letter of each word is lowercase, and subsequent words start with a capital letter. Example: `getAllProducts()`.

## Property Names

Properties should also be declared in camelCase. Example: `$productName`.

## Constants

Constants should be declared in all uppercase letters, with underscores separating words. Example: `define("MAX_CONNECTIONS", 10)`.

## Function Names

Function names should follow the same convention as method names, using camelCase. Example: `calculateTotalPrice()`.

## Variables

Variable names should also be declared in camelCase. Example: `$productPrice`.

## File Names

File names should be declared in lowercase letters and underscores separating words. Example: `product_repository.php`.

## Namespace Names

Namespace names should follow the same convention as class names, using StudlyCaps. Example: `namespace App\Repositories`.

## Acronyms and Abbreviations

Acronyms and abbreviations should be treated as words in terms of casing. For example, `XMLHttpRequest` would be treated as `XmlHttpRequest`.

## Indentation and Formatting

Use consistent indentation (e.g., 4 spaces or tabs) to improve readability. Follow a consistent style for braces and line breaks. For example, some prefer braces on the same line, while others prefer them on a new line.

## Comments

Use clear and concise comments to explain code where necessary. Use PHPDoc style comments for documenting classes, methods, and functions.

## Database Table and Column Names

Database table and column names should be lowercase and use underscores to separate words. Example: `products`, `product_name`.

---

Adhering to these conventions helps make your code more maintainable and understandable for yourself and other developers who might work with your codebase.
