<?php
// Panggil pengaturan dari sistem yang digunakan
require_once './pengaturan.php';

// ganti pemanggilan dengan class autoloading
spl_autoload_register(function ($nama_class)
{
	$folders = array(
		"pusat/",
		"plugins/",
		"kontrol/"
	);

	foreach ($folders as $folder)
	{
		if (file_exists("./" . $folder . $nama_class . ".php"))
		{
			require_once "./" . $folder . $nama_class . ".php";
		}
	}
});

// jalankan class utama sebagai default
$utama = new utama();

// cek apakah ada permintaan halaman
if (isset($_GET['p']))
{
	// buat variabel untuk menampung permintaan halaman
	$p = $_GET['p'];
	// jadikan huruf kecil permintaan halamannya
	$p = strtolower($p);
	// potong / diakhir dari permintaan halaman
	$p = rtrim($p, "/");
	// pecah permintaan halaman menjadi beberapa bagian
	$p = explode("/", $p);


	// cek keberadaan class dari halaman yang diminta
	if (class_exists($p[0]))
	{
		// tampung permintaan pertama sebagai halaman
		$page = $p[0];
		// hapus bagian permintaan pertama
		unset($p[0]);
		// jalankan class dari permintaan pertama halaman
		$class = new $page();

		// jika permintaan kedua tidak kosong dan permintaan kedua adalah method di dalam class permintaan pertama
		if (!empty($p[1]) && method_exists($class, $p[1]))
		{
			// tampung permintaan kedua sebagai method
			$method = $p[1];
			// hapus permintaan kedua dari daftar halaman
			unset($p[1]);

			// tampung sisa permintaan sebagai parameter
			$parameter = (!empty($p)) ? array_values($p) : "";
			// jalankan method dalam class yang ada beserta parameter jika ditemukan!
			$class->$method($parameter);
		}

		// jalankan method default dari class yang dijalankan
		else
		{
			$class->default();
		}
	}

	// ketika class tidak ditemukan
	else
	{
		$utama->kosong();
	}

}

// jalankan ketika tidak ada permintaan halaman
else
{
	$utama->default();
}