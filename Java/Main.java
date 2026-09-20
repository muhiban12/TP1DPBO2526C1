import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    private static void tampilkanData(ArrayList<FilmBioskop> listFilm) {
        if (listFilm.isEmpty()) {
            System.out.println("\n[!] Belum ada data film.");
            return;
        }
        System.out.println("\n-----------------------------------------------------------------------------------------");
        System.out.printf("%-8s %-25s %-15s %-15s %-25s\n", "ID", "Judul Film", "Genre", "Harga (Rp)", "Path Gambar");
        System.out.println("-----------------------------------------------------------------------------------------");
        for (FilmBioskop f : listFilm) {
            System.out.printf("%-8s %-25s %-15s %-15d %-25s\n", f.getId(), f.getJudul(), f.getGenre(), f.getHargaTiket(), f.getGambar());
        }
        System.out.println("-----------------------------------------------------------------------------------------");
    }

    public static void main(String[] args) {
        ArrayList<FilmBioskop> listFilm = new ArrayList<>();
        listFilm.add(new FilmBioskop("F01", "Interstellar", "Sci-Fi", 50000, "images/interstellar.jpg"));
        listFilm.add(new FilmBioskop("F02", "Inception", "Action", 45000, "images/inception.jpg"));

        Scanner sc = new Scanner(System.in);
        int pilihan = 0;

        do {
            System.out.println("\n=== SISTEM MANAJEMEN BIOSKOP (Java) ===");
            System.out.println("1. Tampilkan  2. Tambah  3. Ubah  4. Hapus  5. Cari  6. Keluar");
            System.out.print("Pilih: ");
            pilihan = sc.nextInt();
            sc.nextLine();

            if (pilihan == 1) {
                tampilkanData(listFilm);
            } else if (pilihan == 2) {
                System.out.print("ID: "); String id = sc.nextLine();
                System.out.print("Judul: "); String judul = sc.nextLine();
                System.out.print("Genre: "); String genre = sc.nextLine();
                System.out.print("Harga: "); int harga = sc.nextInt(); sc.nextLine();
                System.out.print("Gambar: "); String gambar = sc.nextLine();
                listFilm.add(new FilmBioskop(id, judul, genre, harga, gambar));
                System.out.println("[+] Data berhasil ditambahkan!");
            } else if (pilihan == 3) {
                System.out.print("Masukkan ID diubah: "); String id = sc.nextLine();
                for (FilmBioskop f : listFilm) {
                    if (f.getId().equals(id)) {
                        System.out.print("Judul Baru: "); f.setJudul(sc.nextLine());
                        System.out.print("Genre Baru: "); f.setGenre(sc.nextLine());
                        System.out.print("Harga Baru: "); f.setHargaTiket(sc.nextInt()); sc.nextLine();
                        System.out.print("Gambar Baru: "); f.setGambar(sc.nextLine());
                        System.out.println("[+] Data berhasil diperbarui!");
                        break;
                    }
                }
            } else if (pilihan == 4) {
                System.out.print("Masukkan ID dihapus: "); String id = sc.nextLine();
                listFilm.removeIf(f -> f.getId().equals(id));
                System.out.println("[+] Data berhasil dihapus!");
            } else if (pilihan == 5) {
                System.out.print("Cari ID/Judul: "); String kw = sc.nextLine().toLowerCase();
                ArrayList<FilmBioskop> hasil = new ArrayList<>();
                for (FilmBioskop f : listFilm) {
                    if (f.getId().toLowerCase().contains(kw) || f.getJudul().toLowerCase().contains(kw)) {
                        hasil.add(f);
                    }
                }
                tampilkanData(hasil);
            }
        } while (pilihan != 6);
        sc.close();
    }
}