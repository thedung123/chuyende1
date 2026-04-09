1. Giới thiệu

Đây là project xây dựng hệ thống quản lý khóa học sử dụng framework Laravel.
Hệ thống hỗ trợ quản lý khóa học và bài học với các chức năng CRUD, upload ảnh, soft delete, relationship và pagination.

2. Yêu cầu hệ thống

Trước khi chạy project cần cài đặt:

PHP >= 8.1
Composer
MySQL
Laravel >= 10
XAMPP hoặc Laragon
3. Cách cài đặt project
Bước 1: Clone project
git clone <link-project>

Hoặc nếu copy thư mục:

copy project vào htdocs
Bước 2: Mở project
cd course-management
Bước 3: Cài thư viện Laravel
composer install
Bước 4: Tạo file môi trường
cp .env.example .env
Bước 5: Generate key
php artisan key:generate
Bước 6: Cấu hình database

Mở file:

.env

Sửa:

DB_DATABASE=course_management
DB_USERNAME=root
DB_PASSWORD=
Bước 7: Tạo database

Mở phpMyAdmin

Tạo database:

course_management
Bước 8: Chạy migration
php artisan migrate
Bước 9: Link storage (upload ảnh)
php artisan storage:link
Bước 10: Chạy project
php artisan serve

Truy cập:

http://127.0.0.1:8000
4. Các chức năng chính

Hệ thống hỗ trợ:

Quản lý Course
Thêm khóa học
Sửa khóa học
Xóa khóa học
Soft delete
Khôi phục khóa học
Upload ảnh khóa học
Phân trang danh sách khóa học
Quản lý Lesson
Thêm lesson
Sửa lesson
Xóa lesson
Quan hệ với Course (One-to-Many)
5. Công nghệ sử dụng

Project sử dụng:

Laravel Framework
PHP
MySQL
Blade Template Engine
MVC Architecture
6. Mô hình hoạt động

Project được xây dựng theo mô hình:

MVC

Bao gồm:

Model

Quản lý dữ liệu database

View

Hiển thị giao diện người dùng

Controller

Xử lý logic giữa Model và View

7. Relationship sử dụng

Project sử dụng:

One-to-Many Relationship

Giữa:

Course và Lesson

Một Course có nhiều Lesson

8. Soft Delete

Project sử dụng:

Soft Delete

Cho phép:

xóa mềm dữ liệu
khôi phục dữ liệu
xóa vĩnh viễn dữ liệu
9. Pagination

Project sử dụng:

Pagination

Để:

chia dữ liệu thành nhiều trang
tăng tốc độ load trang
cải thiện trải nghiệm người dùng
10. Validation

Project sử dụng validation để:

kiểm tra dữ liệu đầu vào
tránh lỗi nhập sai
đảm bảo tính chính xác dữ liệu