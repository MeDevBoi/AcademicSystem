# Prototype Academic System - Practical Work

## Overview
This project is a prototype academic system developed to manage and record student grades for various courses. The system includes three user roles: Administrator, Lecturer, and Student, each with specific functionalities and access levels.

## User Roles and Functionalities

### Administrator
- Create and delete student groups, courses, lecturers, and students.
- Assign lecturers and students to courses, and courses to specific groups.

### Lecturer
- Input, edit, and manage grades for students in their courses.

### Student
- View grades for their courses.

## Author
- **Student:** Muhammad Umer Ali
- **Supervisor:** Dr. V. Liubinas

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [OOP Principles](#oop-principles)
- [SOLID Principles](#solid-principles)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/academic-management-system.git
    ```
2. Navigate to the project directory:
    ```bash
    cd academic-management-system
    ```
3. Set up the database and configure the database connection in the `db.php` file.
4. Run the application on a local server.

## Usage

After setting up the application, you can access the admin dashboard to manage users, groups, lecturers, students, and subjects, as well as generate reports.

## OOP Principles

### Encapsulation

- **Description**: Encapsulation is the bundling of data and methods that operate on the data within one unit, typically a class, and restricting access to some of the object's components.
- **Example**: The `student` class encapsulates student-related data and operations.

```php
class student {
    private $id;
    private $name;
    private $group_id;

    public function __construct($id, $name, $group_id) {
        $this->id = $id;
        $this->name = $name;
        $this->group_id = $group_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGroup() {
        return $this->group_id;
    }
}
```
### Inheritance
- **Description**: Inheritance is a mechanism where a new class inherits the properties and methods of an existing class.
- **Example**: If there were a base User class, both Student and Lecturer classes could inherit from it.

```php
class User {
    protected $id;
    protected $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class Student extends User {
    private $group_id;

    public function __construct($id, $name, $group_id) {
        parent::__construct($id, $name);
        $this->group_id = $group_id;
    }

    public function getGroup() {
        return $this->group_id;
    }
}

class Lecturer extends User {
    private $subjects;

    public function __construct($id, $name, $subjects) {
        parent::__construct($id, $name);
        $this->subjects = $subjects;
    }

    public function getSubjects() {
        return $this->subjects;
    }
}
```
### Abstraction
- **Description**: Abstraction is the concept of hiding the complex implementation details and showing only the necessary features of an object.
- **Example**: The db class abstracts the complexity of database operations.

```php
class db {
    private $connection;

    public function __construct($host, $user, $password, $database) {
        $this->connection = new mysqli($host, $user, $password, $database);
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection->close();
    }
}

```
## SOLID Principals 

### Single Responsibility Principle (SRP)
- **Description**: A class should have only one reason to change, meaning it should have only one job or responsibility.
- **Example**: The auth class is solely responsible for user authentication.

```php
class auth {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($username, $password) {
        // Logic for logging in
    }

    public function register($username, $password, $email) {
        // Logic for registering a new user
    }
}

```

### Open/Closed Principle (OCP)

- **Description**: Software entities should be open for extension but closed for modification.
- **Example**:  Using interfaces and inheritance to extend functionality without modifying existing code.

```php
interface GradeAssigner {
    public function assign($student, $subject, $grade);
}

class SimpleGradeAssigner implements GradeAssigner {
    public function assign($student, $subject, $grade) {
        // Assign grade
    }
}

class AdvancedGradeAssigner implements GradeAssigner {
    public function assign($student, $subject, $grade) {
        // Advanced logic for assigning grades
    }
}

```

### Liskov Substitution Principle (LSP)


- **Description**: Subtypes must be substitutable for their base types without altering the correctness of the program.
- **Example**: Any instance of UserRole can replace another without affecting the functionality.

```php
function printRole(UserRole $user) {
    echo $user->getRole();
}

$student = new Student(1, 'John Doe', 101);
$lecturer = new Lecturer(2, 'Jane Smith', ['Math', 'Science']);

printRole($student);  // Output: Student
printRole($lecturer); // Output: Lecturer

```
### Interface Segregation Principle (ISP)

- **Description**: No client should be forced to depend on methods it does not use.
- **Example**: Creating specific interfaces for different user actions.

```php
interface Authenticatable {
    public function login($username, $password);
    public function register($username, $password, $email);
}

interface Manageable {
    public function add($entity);
    public function delete($entity);
}

class UserManager implements Authenticatable, Manageable {
    public function login($username, $password) {
        // Login logic
    }

    public function register($username, $password, $email) {
        // Registration logic
    }

    public function add($entity) {
        // Add logic
    }

    public function delete($entity) {
        // Delete logic
    }
}

```
### Dependency Inversion Principle (DIP)
- **Description**: High-level modules should not depend on low-level modules. Both should depend on abstractions.
- **Example**: Using dependency injection for the db class.

```php
class UserService {
    private $db;

    public function __construct(db $db) {
        $this->db = $db;
    }

    public function getUser($id) {
        return $this->db->query("SELECT * FROM users WHERE id = $id");
    }
}

```

## Contributing
We welcome contributions to enhance the functionality and improve the code quality of the Academic Management System. Please fork the repository and submit pull requests for review.
