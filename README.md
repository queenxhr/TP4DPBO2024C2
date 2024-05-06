# TP4DPBO2024C2

# Janji
Saya Ratu Syahirah Khairunnisa [2200978] 
mengerjakan Tugas Praktikum 4
dalam mata kuliah DPBO
untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. 
Aamiin

# Desain Program
1. Buatlah database berdasarkan kode tersebut
2. Ubah arsitektur project tersebut menggunakan MVC
3. Tambahkan tabel baru (1 - 2) yang berelasi dengan tabel yang sudah ada (Tabel dan Relasinya bebas ya)
4. Buat CRUD dari tabel  baru tersebut

Database yang saya rancang untuk sebuah toko makeup yang terdiri dari 3 kelas, yaitu:
1. `transaksi` : kelas untuk menampung transaksi dari member yng membeli produk
2. `member` : kelas untuk menampung nama-nama member
3. `produk` : kelas untuk menampung nama-nama produk
Hubungan antara kelas tersebut adalah : `member` dan `produk` menjadi foreign key di kelas `transaksi`.

Arsitektur project tersebut terdiri dari beberapa folder yang di dalamnya ada file dan beberapa file di root. 

<img width="146" alt="image" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/9572ecd8-7e4c-4997-9cc0-71cab7e10853">

- controllers : `Transaksi.controller.php`, `Member.controller.php`, `Produk.controller.php`
- css : file css 
- js : fil-file js
- models : `Transaksi.class.php`, `Member.class.php`, `Produk.class.php`, `Template.class.php`, `DB.class.php`
- templates : file html untuk skinform.html dan skintabel.html
- views : `Transaksi.view.php`, `Member.view.php`, `Produk.view.php`
index.php : untuk menjalankan program untuk kelas transaksi
conf.php : untuk memanggil dan konfigurasi database
member.php : untuk menjalankan program untuk kelas member
produk.php : untuk menjalankan program untuk kelas produk

# Penjelasan Alur
Proses CRUD (Create, Read, Update, Delete) :
Semua proses CRUD dijalankan menggunakan query sql yang terdapat pada file i folder models sesuai kelasnya.
1. CRUD `transaksi`
   semua proses untuk kelas transaksi dihubungkan dengan file di root yaitu `index.php` dengan memanggil `Transaksi.controller.php`.
   - Create : menghubungkan antara fungsi add di `Transaksi.controller.php` dengan fungsi add_data di `Transaksi.view.php` lalu jika di submit masuk ke fungsi add di `Transaksi.controller.php`.
   - Read : menghubungkan antara fungsi index di `Transaksi.controller.php` dengan fungsi render di `Transaksi.view.php` lalu melempar ke skintabel.html untuk ditampilkan.
   - Update : menghubungkan antara fungsi edit di `Transaksi.controller.php` dengan fungsi edit_data di `Transaksi.view.php` lalu jika di submit masuk ke fungsi update di `Transaksi.controller.php`.
   - Delete : menjalankan fungsi delete pada `Transaksi.controller.php`
2. CRUD `member`
   semua proses untuk kelas transaksi dihubungkan dengan file di root yaitu `member.php` dengan memanggil `Member.controller.php`.
   - Create : menghubungkan antara fungsi add di `Member.controller.php` dengan fungsi add_data di `Member.view.php` lalu jika di submit masuk ke fungsi add di `Member.controller.php`.
   - Read : menghubungkan antara fungsi index di `Member.controller.php` dengan fungsi render di `Member.view.php` lalu melempar ke skintabel.html untuk ditampilkan.
   - Update : menghubungkan antara fungsi edit di `Member.controller.php` dengan fungsi edit_data di `Member.view.php` lalu jika di submit masuk ke fungsi update di `Member.controller.php`.
   - Delete : menjalankan fungsi delete pada `Member.controller.php`
3. CRUD `produk`
   semua proses untuk kelas transaksi dihubungkan dengan file di root yaitu `produk.php` dengan memanggil `Produk.controller.php`.
   - Create : menghubungkan antara fungsi add di `Produk.controller.php` dengan fungsi add_data di `Produk.view.php` lalu jika di submit masuk ke fungsi add di `Produk.controller.php`.
   - Read : menghubungkan antara fungsi index di `Produk.controller.php` dengan fungsi render di `Produk.view.php` lalu melempar ke skintabel.html untuk ditampilkan.
   - Update : menghubungkan antara fungsi edit di `Produk.controller.php` dengan fungsi edit_data di `Produk.view.php` lalu jika di submit masuk ke fungsi update di `Produk.controller.php`.
   - Delete : menjalankan fungsi delete pada `Produk.controller.php`

# Screenshots
## 1. Create
   <img width="959" alt="create transaksi" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/3e5d7a9c-57e4-4f9c-af55-5b344752fb85">
   <img width="959" alt="create produk" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/c17aa0a2-8346-4610-81c7-0fb6e8eec3bb">
   <img width="959" alt="create member" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/b5796d6f-a9ec-42e3-acb6-79bdfe261652">

## 2. Read
   <img width="959" alt="index_transaksi" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/522484b4-a713-4015-a68b-5ce3d3cef277">
   <img width="959" alt="produk" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/f74abe69-711f-4318-bf3a-0f4ec7074331">
   <img width="959" alt="member" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/d8a4b5de-ff94-4623-8be6-9c6591f81fcc">
   
## 3. Update
   <img width="959" alt="update transaksi" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/c8748f0f-ca35-4398-9bf3-90269c9400d8">
   <img width="959" alt="update produk" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/ef2dddf3-971c-4f5b-bd1a-6d1ddeb4fe4e">
   <img width="959" alt="update member" src="https://github.com/queenxhr/TP4DPBO2024C2/assets/135084798/4ea52a8b-f9e3-4956-b0ea-0feeb3abe4fc"> 

Lebih lengkapnya dapat diakses pada video_preview.mp4
