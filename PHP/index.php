<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Load kelas terlebih dahulu
require_once "FilmBioskop.php";

// 2. Jalankan session
session_start();

// Reset data ke default jika diperlukan (akses index.php?reset=1)
if (isset($_GET['reset'])) {
    unset($_SESSION['listFilm']);
    header("Location: index.php");
    exit();
}

// Inisialisasi data awal jika session belum ada
if (!isset($_SESSION['listFilm']) || !is_array($_SESSION['listFilm'])) {
    $_SESSION['listFilm'] = [
        new FilmBioskop("F01", "Interstellar", "Sci-Fi", 50000, "images/interstellar.jpg"),
        new FilmBioskop("F02", "Inception", "Action", 45000, "images/inception.jpg")
    ];
}

// --- PROSES CREATE (TAMBAH) ---
if (isset($_POST['tambah'])) {
    $_SESSION['listFilm'][] = new FilmBioskop(
        $_POST['id'], 
        $_POST['judul'], 
        $_POST['genre'], 
        (int)$_POST['harga'], 
        $_POST['gambar']
    );
    header("Location: index.php");
    exit();
}

// --- PROSES UPDATE (UBAH) ---
if (isset($_POST['update'])) {
    $idx = (int)$_POST['index_edit'];
    if (isset($_SESSION['listFilm'][$idx])) {
        $_SESSION['listFilm'][$idx]->setId($_POST['id']);
        $_SESSION['listFilm'][$idx]->setJudul($_POST['judul']);
        $_SESSION['listFilm'][$idx]->setGenre($_POST['genre']);
        $_SESSION['listFilm'][$idx]->setHargaTiket((int)$_POST['harga']);
        $_SESSION['listFilm'][$idx]->setGambar($_POST['gambar']);
    }
    header("Location: index.php");
    exit();
}

// --- PROSES DELETE (HAPUS) ---
if (isset($_GET['hapus'])) {
    $idx = (int)$_GET['hapus'];
    if (isset($_SESSION['listFilm'][$idx])) {
        array_splice($_SESSION['listFilm'], $idx, 1);
    }
    header("Location: index.php");
    exit();
}

// --- PERSIAPAN MODE EDIT ---
$isEditMode = false;
$editIndex = -1;
$editData = null;
if (isset($_GET['edit'])) {
    $editIndex = (int)$_GET['edit'];
    if (isset($_SESSION['listFilm'][$editIndex])) {
        $isEditMode = true;
        $editData = $_SESSION['listFilm'][$editIndex];
    }
}

// --- PROSES SEARCH (PENCARIAN) ---
$keyword = $_GET['keyword'] ?? '';
$dataTampil = [];
foreach ($_SESSION['listFilm'] as $index => $film) {
    if ($keyword === '' || 
        stripos($film->getId(), $keyword) !== false || 
        stripos($film->getJudul(), $keyword) !== false ||
        stripos($film->getGenre(), $keyword) !== false) {
        $dataTampil[$index] = $film; // Tetap simpan index asli sebagai key
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bioskop - PHP Web (CRUD & Search)</title>
</head>
<body>
    <h2>Sistem Manajemen Data Film Bioskop</h2>
    
    <!-- Fitur Reset Data Session -->
    <p><a href="index.php?reset=1">Reset Data Ke Default</a></p>

    <!-- --- FITUR SEARCH --- -->
    <fieldset style="margin-bottom: 20px;">
        <legend><b>Pencarian Film</b></legend>
        <form method="get" action="index.php">
            <input type="text" name="keyword" placeholder="Cari ID / Judul / Genre..." value="<?php echo htmlspecialchars($keyword); ?>">
            <button type="submit">Cari</button>
            <?php if ($keyword !== ''): ?>
                <a href="index.php"><button type="button">Tampilkan Semua</button></a>
            <?php endif; ?>
        </form>
    </fieldset>

    <!-- --- TABEL DATA FILM (READ) --- -->
    <table border="1" cellpadding="8" cellspacing="0">
        <tr bgcolor="#f0f0f0">
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Harga Tiket</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($dataTampil)): ?>
            <?php foreach ($dataTampil as $index => $film): ?>
            <tr>
                <td><?php echo htmlspecialchars($film->getId()); ?></td>
                <td><?php echo htmlspecialchars($film->getJudul()); ?></td>
                <td><?php echo htmlspecialchars($film->getGenre()); ?></td>
                <td>Rp <?php echo number_format($film->getHargaTiket()); ?></td>
                <td><img src="<?php echo htmlspecialchars($film->getGambar()); ?>" width="60" alt="poster"/></td>
                <td>
                    <a href="index.php?edit=<?php echo $index; ?>">Ubah</a> | 
                    <a href="index.php?hapus=<?php echo $index; ?>" onclick="return confirm('Yakin ingin menghapus film ini?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" align="center">Data film tidak ditemukan.</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>

    <!-- --- FORM TAMBAH / UBAH DATA (CREATE & UPDATE) --- -->
    <fieldset>
        <legend><b><?php echo $isEditMode ? "Ubah Data Film" : "Tambah Film Baru"; ?></b></legend>
        <form method="post" action="index.php">
            <?php if ($isEditMode): ?>
                <input type="hidden" name="index_edit" value="<?php echo $editIndex; ?>">
            <?php endif; ?>

            <label>ID Film:</label><br>
            <input type="text" name="id" value="<?php echo $isEditMode ? htmlspecialchars($editData->getId()) : ''; ?>" required><br><br>

            <label>Judul Film:</label><br>
            <input type="text" name="judul" value="<?php echo $isEditMode ? htmlspecialchars($editData->getJudul()) : ''; ?>" required><br><br>

            <label>Genre:</label><br>
            <input type="text" name="genre" value="<?php echo $isEditMode ? htmlspecialchars($editData->getGenre()) : ''; ?>" required><br><br>

            <label>Harga Tiket:</label><br>
            <input type="number" name="harga" value="<?php echo $isEditMode ? $editData->getHargaTiket() : ''; ?>" required><br><br>

            <label>Path Gambar:</label><br>
            <input type="text" name="gambar" value="<?php echo $isEditMode ? htmlspecialchars($editData->getGambar()) : ''; ?>" required><br><br>

            <?php if ($isEditMode): ?>
                <button type="submit" name="update">Simpan Perubahan</button>
                <a href="index.php"><button type="button">Batal</button></a>
            <?php else: ?>
                <button type="submit" name="tambah">Tambah Film</button>
            <?php endif; ?>
        </form>
    </fieldset>
</body>
</html>