# CLAUDE.md - Developer Context

## Project Overview
This is a PHP tutoring project containing sample solutions (Musterlösungen) for a test assignment created during the first meeting on October 14, 2025. The project is part of pr24 GmbH's tutoring program.

## Project Structure

```
14102025 - test Aufgabe/
└── Meeting#1-14102025/
    ├── aufgabe1.php        # Exercise 1: Sum of even numbers
    ├── aufgabe2.php        # Exercise 2: Contact form validation
    ├── aufgabe3.php        # Exercise 3: OOP User class
    ├── aufgabe4.php        # Exercise 4: Database (MySQLi)
    ├── aufgabe4PDO.php     # Exercise 4: Database (PDO variant)
    └── formular.php        # HTML form for Exercise 2
```

## File Descriptions

### aufgabe1.php
**Purpose**: Array manipulation and conditional logic
- Function: `summeGeraderZahlen(array $zahlenArray): int`
- Demonstrates: foreach loops, modulo operator, array traversal
- Input: Array of integers
- Output: Sum of all even numbers
- Example: `[1, 2, 3, 4, 5, 6]` returns `12` (2+4+6)

**Key Concepts**:
- Array iteration with `foreach`
- Modulo operator (`%`) for even/odd detection
- Variable accumulation pattern

### aufgabe2.php
**Purpose**: Server-side form validation
- Validates POST data from contact form
- Fields: name, email, nachricht (message)
- Demonstrates: Input validation, security (htmlspecialchars for XSS prevention)

**Validation Rules**:
1. Name must not be empty
2. Email must be valid format (using `filter_var()`)
3. Message must not be empty

**Security Measures**:
- `trim()` to remove whitespace
- `htmlspecialchars()` to prevent XSS
- `filter_var($email, FILTER_VALIDATE_EMAIL)` for email validation

**Related File**: `formular.php` - The HTML form that submits to this script

### aufgabe3.php
**Purpose**: Object-oriented programming fundamentals
- Class: `User`
- Properties: `private $username`, `private $email`
- Methods:
  - `__construct(string $username, string $email)` - Constructor
  - `setUsername(string $newUsername): void` - Setter method
  - `getUserDetails(): string` - Getter method

**OOP Concepts Demonstrated**:
- Encapsulation (private properties)
- Constructor pattern
- Getter/Setter methods
- Type declarations (PHP 7.4+)
- `$this` reference
- Object instantiation

### aufgabe4.php
**Purpose**: Database connectivity using MySQLi
- Database: `test_db`
- Table: `products` (columns: id, name, price)
- Connection method: MySQLi object-oriented approach

**Key Features**:
- Connection error handling with `connect_error`
- SQL query execution with `query()`
- Result iteration with `fetch_assoc()`
- HTML table output
- Price formatting with `number_format()`
- XSS prevention with `htmlspecialchars()`
- Proper connection closing

**Database Credentials** (default local setup):
- Host: `localhost`
- Username: `root`
- Password: `` (empty)
- Database: `test_db`

### aufgabe4PDO.php
**Purpose**: Database connectivity using PDO (improved approach)
- Same database structure as aufgabe4.php
- Uses PDO instead of MySQLi for better portability

**PDO Advantages Demonstrated**:
- Exception-based error handling (`try-catch`)
- Prepared statement support (framework ready)
- Database-agnostic DSN pattern
- Cleaner iteration with foreach directly on statement
- Better security configuration

**Configuration Options**:
- `PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION` - Exception handling
- `PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC` - Associative arrays
- `PDO::ATTR_EMULATE_PREPARES => false` - Native prepared statements
- `charset=utf8mb4` - Proper character encoding

### formular.php
**Purpose**: HTML contact form
- Simple HTML5 form
- Fields: name (text), email (email), nachricht (textarea)
- Method: POST
- Action: `aufgabe2.php`
- Basic CSS styling included

## Technical Requirements

### PHP Version
- Minimum PHP 7.4+ (for typed properties)
- Recommended: PHP 8.0+

### Extensions Required
- `mysqli` extension (for aufgabe4.php)
- `pdo_mysql` extension (for aufgabe4PDO.php)
- `filter` extension (for email validation)

### Database Setup
For exercises 4 and 4PDO, you need:
```sql
CREATE DATABASE test_db;
USE test_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (name, price) VALUES
    ('Product 1', 19.99),
    ('Product 2', 29.99),
    ('Product 3', 39.99);
```

## Running the Project

### Local Development Server
```bash
# From the project root
php -S localhost:8000 -t "Meeting#1-14102025"
```

Then access:
- Exercise 1: `http://localhost:8000/aufgabe1.php`
- Exercise 2 Form: `http://localhost:8000/formular.php`
- Exercise 3: `http://localhost:8000/aufgabe3.php`
- Exercise 4 (MySQLi): `http://localhost:8000/aufgabe4.php`
- Exercise 4 (PDO): `http://localhost:8000/aufgabe4PDO.php`

### XAMPP/WAMP/MAMP
Place the folder in your web server's document root (htdocs/www) and access via browser.

## Code Quality Notes

### Strengths
- **Comprehensive comments**: Every code block is well-documented in German
- **Security awareness**: XSS prevention, input validation, prepared statement readiness
- **Best practices**: Type hints, error handling, proper resource cleanup
- **Educational value**: Progressive difficulty, clear examples, alternative approaches

### Areas for Production Enhancement
1. **Configuration**: Database credentials should be in separate config files
2. **Environment variables**: Use `.env` files for sensitive data
3. **Error logging**: Don't expose errors in production, log them instead
4. **CSRF protection**: Add tokens to forms
5. **Input sanitization**: More robust validation rules
6. **Password security**: If handling auth, use `password_hash()`
7. **Autoloading**: Use Composer PSR-4 for class loading
8. **Testing**: Add PHPUnit tests

## Common Issues & Solutions

### Database Connection Fails
- Ensure MySQL/MariaDB is running
- Check credentials match your local setup
- Verify database `test_db` exists
- Confirm PHP extensions are enabled

### Forms Not Working
- Check POST method is used
- Verify file paths in form action
- Enable error reporting: `error_reporting(E_ALL);`
- Check PHP execution permissions

### Character Encoding Issues
- Ensure UTF-8 encoding in HTML `<meta charset="UTF-8">`
- Set database charset to `utf8mb4`
- Use `charset=utf8mb4` in PDO DSN

## Git Information
- Repository initialized on: 2025-10-14
- Main branch: `main`
- Latest commit message: "initial commit. First meeting 14.10.2025. Test Aufgabe Mosterlösungen"

## Learning Objectives

Each exercise targets specific competencies:
1. **Exercise 1**: Array manipulation, loops, conditionals
2. **Exercise 2**: Form handling, validation, security basics
3. **Exercise 3**: OOP fundamentals, encapsulation
4. **Exercise 4**: Database connectivity, SQL basics, two different approaches

## Next Steps for Tutoring Sessions

Potential follow-up exercises:
- Session handling and authentication
- File upload with validation
- RESTful API development
- MVC pattern implementation
- Composer and dependency management
- Unit testing with PHPUnit
- Advanced OOP (inheritance, interfaces, traits)
- Modern PHP frameworks (Laravel, Symfony)

## Notes for Claude Code

When assisting with this project:
1. Exercises are **educational sample solutions** - focus on explaining concepts
2. Code is in **German** - maintain language consistency in comments
3. **Security** is emphasized - preserve XSS prevention, validation patterns
4. Both **MySQLi and PDO** approaches are taught - explain trade-offs
5. This is a **tutoring context** - explanations should be beginner-friendly
6. Files are standalone examples - they don't depend on each other
7. Database setup is **not included** - may need to help students create it
