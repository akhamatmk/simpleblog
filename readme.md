<h1>Question</h1>
1. How to secure form submission?
2. How would you optimize a website's assets/resources?
3. What UI, Security, Performance, SEO, Maintainability or Technology considerations do you make while building a web application or site?
4. What do you know about design pattern?
5. What are HTTP methods? List all HTTP methods that you know, and explain them.
6. Database: What is the difference between a View and a Table?
7. What's Two Factor Authentication? How would you implement it in an existing web
application?



<h1>Answer</h1>

1. kalau di laravel ada method csrf untuk mengamankan form
2. menggurangi asset yang tidak terpakai , compress gambar agar tidak terlalu besar, menyimpan asset di server yang berbeda di main aplikasi jadi loadnya tidak terasa berat
3. saya menggunakan bootstrap, jquery,  php , blade laravel dan laravel framwork untuk membuat aplikasi ini
4  setahu saya best practice untuk membangun atau merancang , software
5. 
	- Get =   Biasanya untuk mengambil data
	- Post =   Biasanya untuk Mengirim data
	- Delete = Biasaya untuk menghapus data
	- Put = Untuk Mengambil data secara spesific

6. view adalah hasil query dari table yang sudah didefenisikan terlebih dalu sehingga tidak mempunyai data , jadi memerluka table tidak bisa kalau tidak ada table , dan tidak mempunyai data fisik
 table adalah tempat penyimpanan data yang mempunyai data fisik

7. kebanyakan adalah authentifikasi tambahan selain email, password seperti contohnya untuk login user diharuskan memasukan kode verifikasi yang dikirim ke dalam no hp user jika seandainya user terdapat no hp si user atau bisa di kirim lewat email user 