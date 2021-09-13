<?php
class kunci
{
	// menambahkan - sebagai pemisah dari setiap 4 digit nomor
	function notel($a)
	{
		// $a = sprintf("%012d", $a);
		$a = str_split($a, 4);
		return implode("-", $a);
	}
}