-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: db_shop
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` decimal(15,3) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'áo sơ mi trắng nam cao cấp','Là người làm thời trang “khó tính”, chúng tôi cập nhật những thiết kế mới nhất trong xu hướng toàn cầu và bắt đầu tuyển chọn trong số các chất liệu để lựa chọn được chất liệu cao cấp nhất có thể mang lại màu sắc chuẩn xác sang trọng cũng như sự thoải mái cho người mặc chúng.',100.000,'somicanh-13a.jpg','somicanh-13b.jpg','somicanh-13c.jpg'),(3,'Quần Âu - 125','Ngoài ưu điểm về chất liệu cao cấp, Chappin Homme vẫn nức tiếng lâu nay trong giới thời trang trong nước, luôn dẫn đầu xu hướng về phong cách. Chúng tôi muốn gạt bỏ đi những quan niệm đã cũ “thời trang công sở là đơn điệu, nhàm chán”.',201.000,'quanau1.jpg','quanau2.jpg','quanau3.jpg'),(4,'Quần Âu - L81046','Đội ngũ thiết kế của Chappin đã và đang miệt mài ngày đêm nghiên cứu về form dáng, kiểu dáng, mix & match để tạo nên những set sơ mi- quần âu mang phong cách Chappin riêng biệt. Để quý ông của chúng tôi luôn chỉn chu, lịch lãm và tràn đầy tự tin khi diện đồ công sở !',50.000,'quan1.jpg','quan2.jpg','quan3.jpg'),(5,'Bộ Suits - 0170','Chappin mong muốn mỗi người đàn ông hãy đẹp bằng khí chất bằng sự thâm trầm bằng chính giá trị của bản thân mình vì đó mới chính là những thứ khiến cánh đàn ông đẹp nhất.',100.000,'s1jpg.jpg','s2.jpg','s3.jpg'),(6,'Giày Penny Loafer','Mẫu giày Penny Loafer với phần cách điệu khóa ngang, thiết kế đặc trưng linh hoạt của dòng giày Loafer nhưng vẫn đủ sự lịch lãm, tinh tế trong từng đường nét của chính là điểm nhấn cuốn hút đối với quý ông.',50.000,'giay1.jpg','giay1b.jpg','giay1c.jpg'),(7,'Giày Da Nam – 29463','Nét đẹp tưởng chừng như đơn giản đến từ hàng trăm công đoạn trong quá trình chế tác hoàn toàn thủ công của những nghệ nhân lành nghề cho ra những đường may tỉ mỉ, chi tiết, đạt tiêu chuẩn cao từ bên trong cho tới các đường nét bên ngoài.',20.000,'g2b.jpg','g2c.jpg','g2d.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-21 15:15:04
