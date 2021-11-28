# Website giải pháp chữ ký số cho doanh nghiệp
## Nhóm thực hiện : Nhóm 3
## Thành viên : 
### 1.Trịnh Thành Đạt
### 2.Bùi Nhật Tân
Website được viết bằng ngôn ngữ lập trình PHP & Mysql với Framework Laravel theo mô hình MVC.
## Mô hình MVC
MVC là viết tắt của cụm từ “Model-View-Controller“. MVC là một mẫu kiến trúc phần mềm để tạo lập giao diện người dùng trên máy tính. MVC chia thành ba phần được kết nối với nhau. Chúng bao gồm Model (dữ liệu), View (giao diện) và Controller (bộ điều khiển).

Đơn giản hơn, là mô hình này được chia thành 3 phần trong soure code. Và mỗi phần đảm nhận vai trò và nhiệm vụ riêng biệt nhau và độc lập.

<img src="https://vietnix.vn/wp-content/uploads/2021/07/MVC.webp">

Mô hình MVC (MVC pattern) thường được dùng để phát triển giao diện người dùng. Nó cung cấp các thành phần cơ bản để thiết kế một chương trình cho máy tính hoặc điện thoại di động, cũng như là các ứng dụng web.

Luồng xử lý trong của mô hình MVC, bạn có thể hình dung cụ thể và chi tiết qua từng bước dưới đây:

Khi một yêu cầu của từ máy khách (Client) gửi đến Server. Thì bị Controller trong MVC chặn lại để xem đó là URL request hay sự kiện.
Sau đó, Controller xử lý input của user rồi giao tiếp với Model trong MVC.
Model chuẩn bị data và gửi lại cho Controller.
Cuối cùng, khi xử lý xong yêu cầu thì Controller gửi dữ liệu trở lại View và hiển thị cho người dùng trên trình duyệt.

## Framework Laravel
Laravel được tạo ra bởi Taylor Otwell với phiên bản đầu tiên được ra mắt vào tháng 6 năm 2011. Từ đó cho đến này, Laravel đã phát triển một cách mạnh mẽ, vượt qua những framework khác và vươn lên trở thành framework PHP có thể nói được ưa chuộc và được cộng đồng sử dụng nhiều nhất khi phát triển web với PHP. 

Để có thể cài Laravel, bạn phải đáp ứng được các yêu cầu bắt buộc sau:


PHP >= 7.1.3

OpenSSL PHP Extension

PDO PHP Extension

Mbstring PHP Extension

Tokenizer PHP Extension

XML PHP Extension

Ctype PHP Extension

JSON PHP Extension

## Hướng dẫn cài đặt và chạy website

B1 : Download và giải nén thư mục code

B2 : Tạo database trên xampp, import database trong thư mục code vừa tải về

B3 : Khởi chạy Xampp, chạy Apache và Mysql

B4 : Mở cửa sổ cmd của Window, trỏ đường dẫn vào thư mục code đã giải nén, chạy lệnh php artisan server

B5 : Đăng nhập đường dẫn do cửa sổ cmd cung cấp 


Đăng nhập trang quản lí admin bằng đường_dẫn/admin, login tài khoản admin với user và password là : mod@admin.com,password


## Một số hình ảnh của trang web

Phần giao diện chính

<img src="https://i.imgur.com/ZmYk1KB.png">

<img src="https://i.imgur.com/iRe9QzR.png">

<img src="https://i.imgur.com/Wk8qsKc.png">

<img src="https://i.imgur.com/WNyc0Pg.png">

Giao diện trang Admin

<img src="https://i.imgur.com/q8Qx3fG.png">

