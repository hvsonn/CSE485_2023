--a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình:
SELECT *
FROM baiviet
WHERE ma_tloai IN (SELECT ma_tloai FROM theloai WHERE ten_tloai = 'Nhạc trữ tình');

--b. Liệt kê các bài viết của tác giả "Nhacvietplus":
SELECT *
FROM baiviet
WHERE ma_tgia IN (SELECT ma_tgia FROM tacgia WHERE ten_tgia = 'Nhacvietplus');

--c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào:
SELECT *
FROM theloai
WHERE ma_tloai NOT IN (SELECT DISTINCT ma_tloai FROM baiviet WHERE noidung IS NOT NULL AND noidung != '');

--d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết:
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

--e. Tìm thể loại có số bài viết nhiều nhất:
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS SoBaiViet
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ma_tloai
ORDER BY SoBaiViet DESC
LIMIT 1;

--f. Liệt kê 2 tác giả có số bài viết nhiều nhất:
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS SoBaiViet
FROM tacgia
LEFT JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ma_tgia
ORDER BY SoBaiViet DESC
LIMIT 2;

--g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”:
SELECT *
FROM baiviet
WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

--i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả:
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

--j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi:
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet(IN ten_the_loai VARCHAR(50))
BEGIN
    DECLARE ma_the_loai INT;
    SELECT ma_tloai INTO ma_the_loai FROM theloai WHERE ten_tloai = ten_the_loai;

    IF ma_the_loai IS NOT NULL THEN
        SELECT * FROM baiviet WHERE ma_tloai = ma_the_loai;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Thể loại không tồn tại.';
    END IF;
END //
DELIMITER ;

--k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo:
ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0;

DELIMITER //
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;
END;
//
DELIMITER ;

--l. Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web:
CREATE TABLE Users (
    user_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);


