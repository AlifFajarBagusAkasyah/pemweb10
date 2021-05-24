<?php
// Menyambungkan dengan koneksi1.php
include "koneksi1.php";
require_once("dompdf/autoload.inc.php"); // Memanggil file autoload.php di dalam folder dompdf
// Menggunakan namespace dari Dompdf
use Dompdf\Dompdf;

// Membuat object dengan nama $dompdf dengan menggunakan class Dompdf
$dompdf = new Dompdf();

// Mengambil data pada database
$query = mysqli_query($koneksi,"select * from daftar");
$html = '<center><h3>FORMULIR PESERTA DIDIK</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk Sekolah</th>
<th>NIS</th>
<th>Nomor Peserta Ujian</th>
<th>Apakah Pernah PAUD</th>
<th>Apakah Pernah TK</th>
<th>No. Seri SKHUN Sebelumnya</th>
<th>No. Seri Ijazah Sebelumnya</th>
<th>Hobi</th>
<th>Cita-cita</th>
<th>Jenis Kelamin</th>
<th>Nama Lengkap</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khusus</th>
<th>Alamat Jalan</th>
<th>RT</th>
<th>RW</th>
<th>Nama Dusun</th>
<th>Nama Kelurahan/Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Moda Transportasi</th>
<th>Nomor HP</th>
<th>Nomor Telepon</th>
<th>Email Pribadi</th>
<th>Penerima KPS/PKH/KIP</th>
<th>Kewarganegaraan</th>
<th>Nama Negara</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($query))
{
	$html .="<tr>
	<td>".$no."</td>
	<td>".$row['jenis_pendaftaran']."</td>
	<td>".$row['tanggal_masuk_sekolah']."</td>
	<td>".$row['nis']."</td>
	<td>".$row['nomor_peserta_ujian']."</td>
	<td>".$row['pernah_paud']."</td>
	<td>".$row['pernah_tk']."</td>
	<td>".$row['skhun']."</td>
	<td>".$row['ijazah']."</td>
	<td>".$row['hobi']."</td>
	<td>".$row['citacita']."</td>
	<td>".$row['jenis_kelamin']."</td>
	<td>".$row['nama']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tempat_lahir']."</td>
	<td>".$row['tanggal_lahir']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['berkebutuhan_khusus']."</td>
	<td>".$row['alamat']."</td>
	<td>".$row['rt']."</td>
	<td>".$row['rw']."</td>
	<td>".$row['dusun']."</td>
	<td>".$row['kelurahan']."</td>
	<td>".$row['kecamatan']."</td>
	<td>".$row['kode_pos']."</td>
	<td>".$row['tempat_tinggal']."</td>
	<td>".$row['transportasi']."</td>
	<td>".$row['hp']."</td>
	<td>".$row['telp']."</td>
	<td>".$row['email']."</td>
	<td>".$row['penerima_kps']."</td>
	<td>".$row['no_kps']."</td>
	<td>".$row['kewarganegaraan']."</td>
	</tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A1', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file PDF
$dompdf->stream('form_peserta_didik.pdf');
?>