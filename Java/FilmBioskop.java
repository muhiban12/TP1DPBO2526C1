public class FilmBioskop {
    private String id;
    private String judul;
    private String genre;
    private int hargaTiket;
    private String gambar;

    public FilmBioskop() {}

    public FilmBioskop(String id, String judul, String genre, int hargaTiket, String gambar) {
        this.id = id;
        this.judul = judul;
        this.genre = genre;
        this.hargaTiket = hargaTiket;
        this.gambar = gambar;
    }

    public String getId() { return id; }
    public void setId(String id) { this.id = id; }

    public String getJudul() { return judul; }
    public void setJudul(String judul) { this.judul = judul; }

    public String getGenre() { return genre; }
    public void setGenre(String genre) { this.genre = genre; }

    public int getHargaTiket() { return hargaTiket; }
    public void setHargaTiket(int hargaTiket) { this.hargaTiket = hargaTiket; }

    public String getGambar() { return gambar; }
    public void setGambar(String gambar) { this.gambar = gambar; }
}