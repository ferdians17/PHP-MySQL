<?php
$konek = new mysqli("localhost", "root", "", "data_baru");

if ($konek->connect_error)
{
	echo "koneksi tidak berhasil!";
}

$exe = $konek->query("SELECT id FROM siswa ORDER BY id DESC LIMIT 1");

// akan berjalan jika isi table siswa ada
if ($exe->num_rows > 0)
{
	//ambil data dari tabel siswa
	$ambil = $exe->fetch_assoc();
	// ambil dan tangkap idnya
	$id = $ambil['id'];

	// pecah dengan pemisah -
	$pecah = explode("-", $id);
	// pecah[0] adalah A
	// pecah[1] adalah angka contoh: 0003

	// jika no urut sebelumnya dibawah 9 atau 1-8
	if ($pecah[1] < 9)
	{
		$kode = "A-000" . ($pecah[1]+1);
	}

	// jika no urut sebelumnya dibawah 99 atau 9-98
	else if($pecah[1] < 99)
	{
		$kode = "A-00" . ($pecah[1] + 1);
	}

	// jika no urut sebelumnya dibawah 999 atau 99-998
	else if ($pecah[1] < 999)
	{
		$kode = "A-0" . ($pecah[1]+1);
	}

	// jika no urut lebih dari 999
	else
	{
		$kode = "A-" . ($pecah[1] +1);
	}

	
}

// ketika data siswa masih kosong
else
{
	// maka kita buat kode menjadi
	$kode = "A-0001";
}

echo "Kode barunya adalah $kode";