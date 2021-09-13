<?php
class sistem_de
{
	// metode untuk memanggil tampilan halaman
	function tampil($a, $data = "")
	{
		// variabel a adalah tampilan halaman yang akan ditampilkan
		// variabel b adalah data yang dikirim seperti judul, dll

		// panggil tampilan halaman yang diminta
		require_once "./tampilan/" . $a . ".php";
	}

	function data($a)
	{
		require_once "./database/" . $a . ".php";
		return new $a;
	}
}