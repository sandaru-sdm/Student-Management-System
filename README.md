# Student Management System

## Purpose
The Student Management System (SMS) is a web-based application designed to streamline the management of students, assignments, and academic resources. This project is ideal for academic officers to efficiently manage student data, distribute assignments, and maintain educational resources.

---

## Features
- **User Management**: Authentication for academic officers.
- **Student Management**: Add, view, and manage student details.
- **Assignment Management**: Upload, distribute, and manage assignments.
- **Notes Management**: Share and organize study materials.

---

## Prerequisites
### Software Requirements
- **PHP**: Version 7.4 or higher.
- **MySQL**: Version 5.7 or higher.
- **Web Server**: Apache (included in XAMPP or WAMP).
- **Stripe API**: For payment integration.
- **SMTP Server**: For email functionalities.

---

## Installation

### Step 1: Install Required Software
1. **XAMPP** (Recommended):
   - [Download XAMPP](https://www.apachefriends.org/index.html) and install it.
2. **Composer**:
   - [Download Composer](https://getcomposer.org/download/) for PHP dependency management.

### Step 2: Set Up the Project
1. Extract the project files into the `htdocs` directory (if using XAMPP).
   ```
   htdocs/Student-Management-System
   ```
2. Import the `sms.sql` database:
   - Open `phpMyAdmin`.
   - Create a database named `sms`.
   - Import the `sms.sql` file located in the project directory.

### Step 3: Configure the Database
Edit the `connection.php` file to match your database credentials:
```php
new mysqli("localhost", "YOUR_DB_USER", "YOUR_DB_PASSWORD", "sms", "3306");
```

### Step 4: Install Dependencies
Run the following command in the project root (if dependencies are managed via Composer):
```bash
composer install
```

---

## How to Run
1. Start the Apache and MySQL servers using XAMPP.
2. Navigate to `http://localhost/Student-Management-System` in your web browser.
3. Log in using the default credentials:
   - **Username**: `admin`
   - **Password**: `admin123`

---

## Stripe Payment Gateway
### Configuration
1. Sign up for a [Stripe](https://stripe.com/) account.
2. Obtain your API keys from the Stripe dashboard.
3. Add the API keys to the designated configuration file (`config.php` or similar):
   ```php
   \$stripe = [
       "secret_key"      => "sk_test_your_secret_key",
       "publishable_key" => "pk_test_your_publishable_key",
   ];
   ```

### Testing Payments
Use Stripe's test card numbers to simulate payments:
- Card Number: `4242 4242 4242 4242`
- Expiry Date: Any future date
- CVV: Any 3-digit number

---

## Email Sending Mechanism
### Configuration
1. Set up an SMTP server (e.g., Gmail, SendGrid).
2. Update the email configuration in `config.php` or a similar file:
   ```php
   \$mail->isSMTP();
   \$mail->Host = 'smtp.gmail.com';
   \$mail->SMTPAuth = true;
   \$mail->Username = 'your_email@gmail.com';
   \$mail->Password = 'your_password';
   \$mail->SMTPSecure = 'tls';
   \$mail->Port = 587;
   ```
3. Test email functionality by triggering an email action (e.g., user registration).

---

## Project Structure
```
Student-Management-System/
├── AcademicOfficer/
│   ├── addStudentProcess.php
│   ├── manageAssignments.php
│   └── ...
├── connection.php
├── index.php
├── sms.sql
├── css/
│   ├── bootstrap.css
│   └── style.css
└── js/
    └── main.js
```

---

## Contribution
Feel free to contribute to this project by submitting issues or pull requests.

---

## License
This project is licensed under the MIT License.

---

## Acknowledgments
- **Bootstrap**: For responsive design.
- **Stripe**: For payment integration.
- **PHPMailer**: For email functionalities.

---
