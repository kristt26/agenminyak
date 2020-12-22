# Host: localhost  (Version 5.5.5-10.4.6-MariaDB)
# Date: 2020-12-22 20:21:52
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Data for table "karyawan"
#

INSERT INTO `karyawan` (`id`,`nik`,`nama`,`jabatan`,`status`) VALUES (1,'0001111','Candra Putra Wicaksanaa','Teller','Aktif'),(2,'0001112','Bagus Joko Susilo','Teller','Aktif'),(3,'0001113','Deni Malik','Staf HRD','Aktif');

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` (`id`,`kriteria`,`kategori`,`bobot`) VALUES (1,'Absen','Benefit',25),(2,'Keterlambatan','Cost',5),(3,'Kreatifitas','Benefit',15),(4,'Target','Benefit',10),(5,'Pelanggaran','Cost',15),(6,'Kerjasama Tim','Benefit',5),(7,'Tanggung Jawab','Benefit',25);

#
# Data for table "periode"
#

INSERT INTO `periode` (`id`,`periode`,`keterangan`,`status`) VALUES (1,'2019','Testingg','Aktif');

#
# Data for table "subkriteria"
#

INSERT INTO `subkriteria` (`id`,`subkriteria`,`nilai`,`indikator`,`kriteriaid`) VALUES (1,'0-5','1','Rata-rata kehadiran setiap bulan dalan setahun antara 0 s/d 5 kali',1),(2,'6-10','2','Rata-rata kehadiran setiap bulan dalan setahun antara 6 s/d 10 kali',1),(4,'0-5','5','Rata-rata keterlambatan setiap bulan dalan setahun antara 0 s/d 5 kali',2),(5,'6-10','4','Rata-rata Keterlambatan setiap bulan dalan setahun antara 6 s/d 10 kali',2),(7,'Tidak Kreatif','1','Tidak adanya inisiatif sama sekali terhadap suatu proses atau ide yang bermanfaat, tepat, dan bernila',3),(8,'Cukup Kreatif','2','Cukup berinisiatif terhadap suatu proses atau ide yang bermanfaat, tepat, dan bernilai',3),(9,'11-15','3','Rata-rata kehadiran setiap bulan dalan setahun antara 11 s/d 15 kali',1),(10,'16-20','4','Rata-rata kehadiran setiap bulan dalan setahun antara 16 s/d 20 kali',1),(11,'21-25','5','Rata-rata kehadiran setiap bulan dalan setahun antara 21 s/d 25 kali',1),(12,'11-15','3','Rata-rata keterlambatan setiap bulan dalan  setahun antara 11 s/d 15 kali',2),(13,'16-20','2','Rata-rata keterlambatan setiap bulan dalan setahun antara 16 s/d 20 kali',2),(14,'21-25','1','Rata-rata keterlambatan setiap bulan dalan setahun antara 21 s/d 25 kali',2),(15,'Kreatif','3','Memiliki inisiatif terhadap suatu proses atau selalu berusaha menemukan ide yang bermanfaat, tepat, dan bernilai',3),(16,'Tidak Baik','1','Masa bodoh dengan tugas yang diberikan dan tidak mau mengerjakan tugas yang diberikan sihingga tidak adanya target pekerjaan yang terselesaikan',4),(17,'Kurang Baik','2','Mau mengerjakan tugas tapi asal mengerjakan dan sering menunda-nunda yang menyebabkan tugas tidak terselaikan tidak target tercapai tapi masih kurang dan sering tidak tercapai',4),(18,'Cukup Baik','3','Mengerjakan Tugas yang diberikan tapi dikerjakan tidak sesuai waktu yang diberikan sehingga sering terlambat sehingga target pancapaian masih kurang',4),(19,'Baik','4','Memiliki keinginan untuk menyelesaikan tugas yang diberikan sehingga target dapat tercapai.',4),(20,'Sangat Baik','5','Memiliki semangat dan etos kerja sehingga tugas yang diberikan dapat terselesaikan dengan baik sehingga diluar ekspektasi',4),(21,'Ringan','3','Karyawan tidak pernah melakukan pelanggan skala sedang dan berat',5),(22,'Sedang','2','Karyawan dalam setahun penuh hanya pernah melakukan pelanggaran skala ringan dan sedang, tapi tidak pernah melakukan pelanggaran berat',5),(23,'Berat','1','Karyawan telah melakukan pelanggaran yang fatal sehinggal di kategorikan jenis pelanggaran skala berat',5),(24,'Kurang Sekali','1','Karyawan tidak mampu berkejasama dengan karyawan yang lain',6),(25,'Kurang','2','Karyawan kurang mampu bekerjasama dengan karyawan yang lain',6),(26,'Sering','3','Karyawan sering bekerjasama dengan karyawan lain dalam menyelesaikan pekerjaan',6),(27,'Selau','4','Karyawan Selalu bekerjasama dengan karyawan lain dalam menyelesaikan pekerjaan',6),(28,'Kurang','1','Tidak adanya rasa tanggung jawab terhadap tugas yang diemban',7),(29,'Kadang-kadang','2','Jiwa tanggung jawab yang muncul tenggelam',7),(30,'Baik','3','Bertanggung jawab dalam menyelesaikan pekerjaan yang diberikan',7),(31,'Baik Sekali','4','Memiliki Jiwa tanggung jawab yang sangat baik terhadap tugas yang diberikan',7);

#
# Data for table "penilaian"
#

INSERT INTO `penilaian` (`id`,`nilai`,`karyawanid`,`periodeid`,`subkriteriaid`) VALUES (1,5,1,1,11),(2,3,1,1,12),(3,1,1,1,7),(4,5,1,1,20),(5,2,1,1,22),(6,1,1,1,24),(7,3,1,1,30),(8,4,2,1,10),(9,2,2,1,13),(10,3,2,1,15),(11,4,2,1,19),(12,1,2,1,23),(13,2,2,1,25),(14,4,2,1,31),(15,3,3,1,9),(16,1,3,1,14),(17,1,3,1,7),(18,5,3,1,20),(19,2,3,1,22),(20,2,3,1,25),(21,4,3,1,31);

#
# Data for table "user"
#

INSERT INTO `user` (`id`,`username`,`password`,`email`,`nama`,`jabatan`) VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin@mail.com','Adminstrator','HRD');
