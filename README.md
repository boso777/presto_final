# Presto.it - Advanced E-commerce Platform

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-4.x-FB70A9?style=for-the-badge&logo=livewire)](https://livewire.laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap)](https://getbootstrap.com)
[![Google Cloud Vision](https://img.shields.io/badge/Google_Cloud_Vision-API-4285F4?style=for-the-badge&logo=google-cloud)](https://cloud.google.com/vision)

Presto.it is a high-performance, feature-rich multi-language marketplace platform. It allows users to post classified ads, manage articles, and features a sophisticated content moderation (Revisor) system powered by AI-driven image analysis.

---

## 🚀 Key Features

- **Multi-language Support:** Full localization in English, Spanish, and Italian.
- **AI Content Moderation:** Integrated with **Google Cloud Vision API** for:
    - **Safe Search:** Automatically detects adult content, violence, and medical/racy images.
    - **Image Labeling:** Automated categorization and tagging based on image content.
    - **Face Detection:** Smart image processing to identify and handle human faces.
- **Revisor Dashboard:** A dedicated workflow for moderators to review, accept, or reject pending articles.
- **Full-Text Search:** High-speed searching using **Laravel Scout** with **TNTSearch**.
- **Responsive Design:** Modern UI built with **Bootstrap 5** and **Livewire** for a seamless, SPA-like experience.
- **Secure Authentication:** Robust user management system powered by **Laravel Fortify**.
- **Asynchronous Workflows:** Heavy tasks like image resizing and AI analysis are offloaded to **Laravel Jobs** for a faster user experience.

---

## 🛠 Technical Stack

### Backend
- **Framework:** Laravel 12.x
- **Search Engine:** Laravel Scout + TNTSearch
- **Authentication:** Laravel Fortify
- **Task Scheduling & Queues:** Laravel Jobs & Queues (Redis/Database) for asynchronous processing.

### Frontend
- **Reactivity:** Livewire 4.x
- **Styling:** Bootstrap 5 & Custom Minimalist CSS (Vanilla)
- **Design:** Architectural "Square" aesthetics with 0px border-radius.
- **Typography:** Inter (Google Fonts)
- **Asset Bundling:** Vite 8.0

### APIs & Services
- **Image Intelligence:** Google Cloud Vision API
- **Image Manipulation:** Spatie Image (Resizing, Watermarking, Filtering)

---

## 🎨 Design Philosophy

The platform follows a **Modern Minimalist** approach:
- **Clean Aesthetics:** "Squared-off" UI (0px border-radius) for an architectural and professional look.
- **Premium Palette:** A carefully curated selection of warm neutrals (#CB997E, #FFF1E6, #EDDCD2) that provide a high-end feel.
- **White Space:** Heavy emphasis on spacing and typography hierarchy to ensure an intuitive and clutter-free user experience.
- **UI Consistency:** Custom CSS variables define the global theme, ensuring a seamless look across all components.

---

## 🏗 Architectural Highlights

- **Asynchronous Processing:** Utilizes Laravel Jobs to process image optimizations and AI checks in the background, ensuring zero latency for the end-user.
- **Custom Middleware:** Secure access control for the Revisor role via `IsRevisor` middleware.
- **Eloquent Relationships:** Complex data structures managed through clean, optimized ORM relationships.
- **Blade Components:** Modular and reusable UI components for consistent design.

---

## 📦 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/presto-final.git
   cd presto-final
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Note: Configure your database and Google Cloud Vision API keys in the `.env` file.*

4. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Start the Queues:**
   To process background jobs (images, AI), run:
   ```bash
   php artisan queue:work
   ```

6. **Start the application:**
   ```bash
   npm run dev
   # In another terminal
   php artisan serve
   ```

---

## 👨‍💻 Developed by

**Roberto Ingrao**  
*Full Stack Web Developer*

Dedicated to building scalable, user-centric applications with the latest technologies. This project demonstrates proficiency in Laravel ecosystem, AI integration, and modern frontend workflows.

---

*This project was developed as a showcase for technical skills in full-stack development, specifically focusing on the Laravel framework and third-party API integrations.*
