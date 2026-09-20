# Tugas Praktikum 1 (TP1) DPBO - Sistem Manajemen Film Bioskop

## JANJI
Saya Muhiban Fadlan Nursaid dengan NIM [Isi NIM Kamu] mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## Deskripsi Program
Program ini merupakan **Sistem Manajemen Data Film Bioskop** berbasis Pemrograman Berorientasi Objek (OOP) yang menerapkan konsep **Enkapsulasi**. Seluruh atribut pada kelas dibuat bersifat `private` dan diakses secara aman melalui metode `public` (Getter & Setter).

Program ini diimplementasikan dalam 4 bahasa pemrograman yang berbeda:
1. **C++ (CLI)** - Menggunakan `std::vector` untuk alokasi memori objek secara dinamis.
2. **Java (CLI)** - Menggunakan `ArrayList` dan `Scanner` untuk interaksi konsol[cite: 5].
3. **Python (CLI)** - Menggunakan struktur *list* dan eksekusi modular berbasis *import*[cite: 5].
4. **PHP (Web Form)** - Menggunakan tabel HTML, form interaktif, dan penanganan status via `$_SESSION`[cite: 5].

---

## Desain & Struktur Kelas (`FilmBioskop`)

Kelas `FilmBioskop` merepresentasikan entitas tunggal data film[cite: 5]:

- **Atribut Private (Encapsulated):**
  - `id` (String): ID Unik Film (contoh: `F01`)[cite: 5]
  - `judul` (String): Judul Film (contoh: `Interstellar`)[cite: 5]
  - `genre` (String): Genre Film (contoh: `Sci-Fi`)[cite: 5]
  - `hargaTiket` (Integer): Harga Tiket Film (contoh: `50000`)[cite: 5]
  - `gambar` (String): Path lokal poster film (contoh: `images/interstellar.jpg`)[cite: 5]

- **Metode Public:**
  - `FilmBioskop()`: Konstruktor Kosong
  - `FilmBioskop(id, judul, genre, hargaTiket, gambar)`: Konstruktor Parameter
  - `getId()`, `setId(id)`[cite: 1, 5]
  - `getJudul()`, `setJudul(judul)`[cite: 1, 5]
  - `getGenre()`, `setGenre(genre)`[cite: 1, 5]
  - `getHargaTiket()`, `setHargaTiket(hargaTiket)`[cite: 1, 5]
  - `getGambar()`, `setGambar(gambar)`[cite: 1, 5]

---

## Alur Program (System Flow)

Program mengikuti alur pemrosesan data CRUD (Create, Read, Update, Delete) + Search[cite: 5]:

```text
[ Start / Inisialisasi ]
           │
           ▼
[ Load Data Initial / Session ] ──► (Membuat list objek FilmBioskop dummy)
           │
           ▼
┌──────────────────────────────────────┐
│       Pilih Aktivitas / Menu         │
└──────────────────────────────────────┘
   │        │          │         │          │
   ├───────►│ Read     │         │          │ ──► Tampilkan Tabel Data Film (Iterasi Array of Objects)
   │        │          │         │          │
   ├───────►│ Create   │         │          │ ──► Input Data Baru ──► Instansiasi Objek Baru ──► Simpan ke List
   │        │          │         │          │
   ├───────►│ Update   │         │          │ ──► Cari ID ──► Jika ditemukan, Panggil Setter untuk Mengubah Nilai
   │        │          │         │          │
   ├───────►│ Delete   │         │          │ ──► Cari ID ──► Jika ditemukan, Hapus Elemen Objek dari List
   │        │          │         │          │
   └───────►│ Search   │         │          │ ──► Input Keyword ──► Filter List (Cocokkan ID/Judul/Genre) ──► Tampilkan Hasil
                       │         │          │
                       ▼         ▼          ▼
                 [ Selesai / Exit Program ]


---


Struktur Folder
TP1/
├── CPP/
│   ├── FilmBioskop.cpp
│   ├── main.cpp
│   └── main.exe
├── Dokumentasi/
│   ├── CPP/
│   │   ├── create_cpp.png
│   │   ├── delete_cpp.png
│   │   ├── search_cpp.png
│   │   ├── show_cpp.png
│   │   └── update_cpp.png
│   ├── Java/
│   │   ├── create_java.png
│   │   ├── delete_java.png
│   │   ├── search_java.png
│   │   ├── show_java.png
│   │   └── update_java.png
│   ├── PHP/
│   │   ├── create_php.png
│   │   ├── delete_php.png
│   │   ├── search_php.png
│   │   ├── show_php.png
│   │   └── update_php.png
│   └── Python/
│       ├── create_py.png
│       ├── delete_py.png
│       ├── search_py.png
│       ├── show_py.png
│       └── update_py.png
├── Java/
│   ├── FilmBioskop.class
│   ├── FilmBioskop.java
│   ├── Main.class
│   └── Main.java
├── PHP/
│   ├── FilmBioskop.php
│   └── index.php
├── Python/
│   ├── __pycache__/
│   ├── FilmBioskop.py
│   └── main.py
└── Readme.md