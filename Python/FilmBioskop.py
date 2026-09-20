class FilmBioskop:
    def __init__(self, id="", judul="", genre="", hargaTiket=0, gambar=""):
        self.__id = id
        self.__judul = judul
        self.__genre = genre
        self.__hargaTiket = hargaTiket
        self.__gambar = gambar

    # Getter & Setter
    def get_id(self): return self.__id
    def set_id(self, id): self.__id = id

    def get_judul(self): return self.__judul
    def set_judul(self, judul): self.__judul = judul

    def get_genre(self): return self.__genre
    def set_genre(self, genre): self.__genre = genre

    def get_hargaTiket(self): return self.__hargaTiket
    def set_hargaTiket(self, harga): self.__hargaTiket = harga

    def get_gambar(self): return self.__gambar
    def set_gambar(self, gambar): self.__gambar = gambar