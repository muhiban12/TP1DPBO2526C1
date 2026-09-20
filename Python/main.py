from FilmBioskop import FilmBioskop

def tampilkan_data(list_film):
    if not list_film:
        print("\n[!] Belum ada data film.")
        return
    print("\n" + "="*85)
    print(f"{'ID':<8} {'Judul Film':<25} {'Genre':<15} {'Harga (Rp)':<15} {'Path Gambar':<20}")
    print("="*85)
    for f in list_film:
        print(f"{f.get_id():<8} {f.get_judul():<25} {f.get_genre():<15} {f.get_hargaTiket():<15} {f.get_gambar():<20}")
    print("="*85)

def main():
    list_film = [
        FilmBioskop("F01", "Interstellar", "Sci-Fi", 50000, "images/interstellar.jpg"),
        FilmBioskop("F02", "Inception", "Action", 45000, "images/inception.jpg")
    ]

    while True:
        print("\n=== SISTEM MANAJEMEN BIOSKOP (Python) ===")
        print("1. Tampilkan  2. Tambah  3. Ubah  4. Hapus  5. Cari  6. Keluar")
        pilihan = input("Pilih [1-6]: ")

        if pilihan == "1":
            tampilkan_data(list_film)
        elif pilihan == "2":
            id_f = input("ID: ")
            judul = input("Judul: ")
            genre = input("Genre: ")
            harga = int(input("Harga: "))
            gambar = input("Gambar: ")
            list_film.append(FilmBioskop(id_f, judul, genre, harga, gambar))
            print("[+] Data berhasil ditambahkan!")
        elif pilihan == "3":
            target = input("Masukkan ID diubah: ")
            for f in list_film:
                if f.get_id() == target:
                    f.set_judul(input("Judul Baru: "))
                    f.set_genre(input("Genre Baru: "))
                    f.set_hargaTiket(int(input("Harga Baru: ")))
                    f.set_gambar(input("Gambar Baru: "))
                    print("[+] Data berhasil diperbarui!")
                    break
        elif pilihan == "4":
            target = input("Masukkan ID dihapus: ")
            list_film = [f for f in list_film if f.get_id() != target]
            print("[+] Data berhasil dihapus!")
        elif pilihan == "5":
            kw = input("Cari ID/Judul: ").lower()
            hasil = [f for f in list_film if kw in f.get_id().lower() or kw in f.get_judul().lower()]
            tampilkan_data(hasil)
        elif pilihan == "6":
            break

if __name__ == "__main__":
    main()