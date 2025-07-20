# CampusConnect

CampusConnect is a straightforward web application designed for university students to easily share and download Notes and Questions related to their courses.  
The project is developed using raw HTML, CSS, JavaScript, and PHP, ensuring simplicity and ease of understanding.

---

## Features

- File Upload  
  Students can upload both Notes and Questions files.

- Filtering  
  Files can be filtered by type: Notes or Questions.

- Search Bar  
  A basic search input is provided in the navigation bar for convenience.

- User Authentication  
  Users can sign up and log in using email and password.

- Access Control  
  Only authenticated users are allowed to download files.

- File Cards Display  
  Each file card displays the following information:
  - Course Name  
  - Short Description (only for Notes)  
  - Course Code, Department, Batch  
  - Semester, Year, Level, Term  
  - Exam Type 
  - File Type 
  - Uploaded By
  - Upload Timestamp  
  - Download button  
  - Delete button (can be delete by admin and owner of the file)

- User Interface  
  - Sticky top navigation bar for easy access  
  - Clean, responsive grid layout for displaying file cards

- Database Design  
  Simple and well-structured MySQL database supporting all functionalities.

---

## Technology Stack

- Frontend: HTML, CSS, Vanilla JavaScript  
- Backend: PHP
- Database: MySQL

---

## Setup and Running Instructions

1. Database Creation  
   Import the provided `database.sql` file into your local MySQL or phpMyAdmin environment to create the required database and tables.

2. Project Files  
   Place the project files inside your local server's root directory (e.g., `htdocs` for XAMPP).

3. Start Server  
   Run Apache and MySQL services via XAMPP or your preferred local server stack.

4. Access Application  
   Open your browser and navigate to:  
   `http://localhost/CampusConnect/`

5. Usage  
   - Register a new account via the Sign Up page  
   - Log in with your credentials  
   - Upload notes or questions  
   - Browse and filter files on the homepage  
   - Download files (authentication required)  
   - Delete your own uploaded files if needed

---

## Future Plans

- **Chat Box & AI Chatbot**  
  Implement a real-time chat feature and AI-powered chatbot to help students with queries.

- **Clubs & Events Information**  
  Add sections to display information about university clubs and upcoming events.

- **Profile Update**  
  Enable users to update their profile details including profile picture, department, and password.

- **Enhanced Search**  
  Improve the search functionality for more efficient file discovery.

- **Mobile Responsiveness**  
  Optimize UI for mobile devices for better accessibility.

---
