#include <iostream>
#include <vector>
#include <iomanip>
#include "FilmBioskop.cpp"

using namespace std;

void tampilkanData(const vector<FilmBioskop>& listFilm) {
    if (listFilm.empty()) {
        cout << "\n[!] Belum ada data film bioskop.\n";
        return;
    }

    cout << "\n=========================================================================================\n";
    cout << left << setw(8) << "ID" 
         << setw(25) << "Judul Film" 
         << setw(15) << "Genre" 
         << setw(15) << "Harga (Rp)" 
         << setw(25) << "Path Gambar" << endl;
    cout << "=========================================================================================\n";

    for (const auto& f : listFilm) {
        cout << left << setw(8) << f.getId()
             << setw(25) << f.getJudul()
             << setw(15) << f.getGenre()
             << setw(15) << f.getHargaTiket()
             << setw(25) << f.getGambar() << endl;
    }
    cout << "=========================================================================================\n";
}

int main() {
    vector<FilmBioskop> listFilm;
    listFilm.push_back(FilmBioskop("F01", "Interstellar", "Sci-Fi", 50000, "images/interstellar.jpg"));
    listFilm.push_back(FilmBioskop("F02", "Inception", "Action", 45000, "images/inception.jpg"));

    int pilihan = 0;
    do {
        cout << "\n=== SISTEM MANAJEMEN BIOSKOP (C++) ===\n";
        cout << "1. Tampilkan  2. Tambah  3. Ubah  4. Hapus  5. Cari  6. Keluar\nPilih: ";
        cin >> pilihan;
        cin.ignore();

        if (pilihan == 1) {
            tampilkanData(listFilm);
        } else if (pilihan == 2) {
            string id, judul, genre, gambar; int harga;
            cout << "ID: "; getline(cin, id);
            cout << "Judul: "; getline(cin, judul);
            cout << "Genre: "; getline(cin, genre);
            cout << "Harga: "; cin >> harga; cin.ignore();
            cout << "Gambar: "; getline(cin, gambar);
            listFilm.push_back(FilmBioskop(id, judul, genre, harga, gambar));
            cout << "[+] Data ditambahkan!\n";
        } else if (pilihan == 3) {
            string id; cout << "Masukkan ID diubah: "; getline(cin, id);
            for (auto& f : listFilm) {
                if (f.getId() == id) {
                    string j, g, img; int h;
                    cout << "Judul Baru: "; getline(cin, j);
                    cout << "Genre Baru: "; getline(cin, g);
                    cout << "Harga Baru: "; cin >> h; cin.ignore();
                    cout << "Gambar Baru: "; getline(cin, img);
                    f.setJudul(j); f.setGenre(g); f.setHargaTiket(h); f.setGambar(img);
                    cout << "[+] Data diperbarui!\n";
                    break;
                }
            }
        } else if (pilihan == 4) {
            string id; cout << "Masukkan ID dihapus: "; getline(cin, id);
            for (auto it = listFilm.begin(); it != listFilm.end(); ++it) {
                if (it->getId() == id) {
                    listFilm.erase(it);
                    cout << "[+] Data dihapus!\n";
                    break;
                }
            }
        } else if (pilihan == 5) {
            string kw; cout << "Cari ID/Judul: "; getline(cin, kw);
            vector<FilmBioskop> hasil;
            for (const auto& f : listFilm) {
                if (f.getId().find(kw) != string::npos || f.getJudul().find(kw) != string::npos) {
                    hasil.push_back(f);
                }
            }
            tampilkanData(hasil);
        }
    } while (pilihan != 6);

    return 0;
}