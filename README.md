# **SHAS – Self Hosted Assessment System**

![Status](https://img.shields.io/badge/Status-In%20Development-yellow)
![License](https://img.shields.io/badge/License-MIT-blue)
![Tech Stack](https://img.shields.io/badge/Tech%20Stack-Apache%20%7C%20PHP%20%7C%20JSON%20%7C%20jQuery-green)
![AI Proof](https://img.shields.io/badge/AI%20Proof-Enabled-orange)

SHAS (Self Hosted Assessment System) is a lightweight and secure platform designed for teachers, institutions, and developers who want **full control** over their quiz/assessment environment.
Built to run **locally** on your own machine, SHAS avoids third-party dependency, ensures privacy, and provides a flexible workflow for quiz creation and distribution.

## 🚀 **Key Features**

### ✔️ **Create Quizzes Easily**

Design quizzes directly in the interface.
All quizzes are saved as **encrypted JSON files**, ensuring portability and security.

### ✔️ **Host Locally**

Turn your machine into a quiz server with Apache + PHP.
Perfect for classrooms, labs, or offline environments.

### ✔️ **AI-Proof & Cheat-Resistant**

* Prevent copy-paste
* Disable screenshots
* Block devtools/inspection attempts
* Protect test integrity in modern environments

### ✔️ **Work Saving**

SHAS can store students’ answers or progress, ensuring work is not lost in long assessments.

---

## 🛠️ **Tech Stack**

| Component  | Description                           |
| ---------- | ------------------------------------- |
| **Apache** | Local hosting & routing               |
| **PHP**    | Server-side logic and quiz processing |
| **JSON**   | Lightweight encrypted quiz storage    |
| **jQuery** | UI interactions & AJAX handling       |

---

## 📁 **Project Structure**

```
shas/
│── assets/
│── backend/
│── quizzes/          # Encrypted JSON quiz files
│── index.php
│── README.md
└── ...
```

---

## 🔧 **Installation**

### 1. Install Requirements

* XAMPP / WAMP / Apache + PHP environment
* PHP 7.4+ recommended

### 2. Clone Repository

```
git clone https://github.com/yourusername/shas.git
```

### 3. Start Local Server

Place the project inside your Apache `htdocs`:

```
htdocs/shas/
```

Start Apache, then open:

```
http://localhost/shas
```

---

## ✏️ **How It Works**

1. **Create Quiz**
   Build questions → Save → System encrypts JSON file.

2. **Host Locally**
   Students connect to your LAN or local hotspot.

3. **Students Attempt Quiz**
   Interface is protected against AI tools & copying.

4. **View/Export Results**
   Stored safely within your environment.

---

## 🔐 **Security Notes**

SHAS implements:

* Clipboard lockdown
* Screenshot prevention (browser-level best effort)
* Anti-DevTools scripts
* Encrypted quiz files
* Local-only hosting option

---

## 🤝 **Contributing**

Pull requests are welcome!
For major changes, please open an issue first.

---

## 📜 **License**

This project is licensed under the **MIT License**.

---

## 📝 **Summary Insight**

SHAS is built as a compact, privacy-focused assessment system for real-world learning environments—simple to deploy, flexible to customize, and resilient against modern cheating methods. Whether you’re an educator or developer, it offers an independent, secure foundation for hosting your own assessments.

