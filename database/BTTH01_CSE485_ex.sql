--a.	Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình 
SELECT * FROM baiviet WHERE ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai = 'Nhạc trữ tình');

--b.	Liệt kê các bài viết của tác giả “Nhacvietplus” (2 đ)
SELECT * FROM baiviet WHERE ma_tgia = (SELECT ma_tgia FROM tacgia WHERE ten_tgia = 'Nhacvietplus');

--c.	Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào. (2 đ)
SELECT * FROM theloai WHERE ma_tloai NOT IN (SELECT DISTINCT ma_tloai FROM baiviet);

--d.	Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết. (2 đ)
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

--e.	Tìm thể loại có số bài viết nhiều nhất (2 đ)
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ten_tloai
ORDER BY so_bai_viet DESC
LIMIT 1;

--f.	Liệt kê 2 tác giả có số bài viết nhiều nhất (2 đ)
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM tacgia
LEFT JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ten_tgia
ORDER BY so_bai_viet DESC
LIMIT 2;

--g.	Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)
SELECT * FROM baiviet WHERE ten_bhat REGEXP '[yêu|thương|anh|em]';

--h.	Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)
SELECT * FROM baiviet WHERE tieude REGEXP '[yêu|thương|anh|em]' OR ten_bhat REGEXP '[yêu|thương|anh|em]';

--i.	Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả (2 đ)
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

--j.	Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi. (2 đ)
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai VARCHAR(50))
BEGIN
    DECLARE tloai_id INT UNSIGNED;
    
    SELECT ma_tloai INTO tloai_id FROM theloai WHERE ten_tloai = ten_tloai;
    
    IF tloai_id IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Thể loại không tồn tại';
    ELSE
        SELECT * FROM baiviet WHERE ma_tloai = tloai_id;
    END IF;
END //
DELIMITER ;

--k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo. (2 đ)
-- Thêm cột SLBaiViet vào bảng Thể loại
ALTER TABLE theloai ADD COLUMN SLBaiViet INT DEFAULT 0;

-- Tạo trigger tg_CapNhatTheLoai
DELIMITER //
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;
END //
DELIMITER ;

--l.	Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. (5 đ)
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL CHECK (`email` LIKE '%@%'),
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
