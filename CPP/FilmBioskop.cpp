#include <iostream>
#include <string>

using namespace std;

class FilmBioskop {
private:
    string id;
    string judul;
    string genre;
    int hargaTiket;
    string gambar;

public:
    FilmBioskop() {}

    FilmBioskop(string id, string judul, string genre, int hargaTiket, string gambar) {
        this->id = id;
        this->judul = judul;
        this->genre = genre;
        this->hargaTiket = hargaTiket;
        this->gambar = gambar;
    }

    void setId(string id) { this->id = id; }
    string getId() const { return id; }

    void setJudul(string judul) { this->judul = judul; }
    string getJudul() const { return judul; }

    void setGenre(string genre) { this->genre = genre; }
    string getGenre() const { return genre; }

    void setHargaTiket(int hargaTiket) { this->hargaTiket = hargaTiket; }
    int getHargaTiket() const { return hargaTiket; }

    void setGambar(string gambar) { this->gambar = gambar; }
    string getGambar() const { return gambar; }
};