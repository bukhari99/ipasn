<?php 
$session = \Config\Services::session();
use App\Models\User_model;
$m_user = new User_model();
?>
<h5><i class="nav-icon fas fa-sign-out-alt"></i> <strong>NILAI INDEKS PROFESIONALITAS INSTANSI</strong></h5>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Jenis</th>
			<th width="50%">JUMLAH PNS</th>
			<th width="50%">KUALIFIKASI</th>
			<th width="50%">KOMPETENSI</th>
			<th width="50%">KINERJA</th>
			<th width="50%">DISIPLIN</th>
			<th width="50%">TOTAL</th>
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td>1.</td>
			<td>Keseluruhan</td>
			<td><?php echo angka($m_user->jumlahpns()) ?></td>
			<td><?php echo angka($ni1['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni2['total_kompetensi']) ?></td>
			<td><?php echo angka($ni3['total_kinerja']) ?></td>
			<td><?php echo angka($ni4['total_disiplin']) ?></td>
			<td><?php echo angka($ni1['total_kualifikasi'])+angka($ni2['total_kompetensi'])+angka($ni3['total_kinerja'])+angka($ni3['total_kinerja'])+angka($ni4['total_disiplin']); ?></td>
		</tr>
	</tbody>
</table>

<h5><i class="nav-icon fas fa-sign-out-alt"></i> <strong>NILAI INDEKS PROFESIONALITAS INSTANSI PER JENIS KELAMIN</strong></h5>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Jenis</th>
			<th width="50%">JUMLAH PNS</th>
			<th width="50%">KUALIFIKASI</th>
			<th width="50%">KOMPETENSI</th>
			<th width="50%">KINERJA</th>
			<th width="50%">DISIPLIN</th>
			<th width="50%">TOTAL</th>
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td>1.</td>
			<td>Laki-laki</td>
			<td><?php echo angka($m_user->jumlahpnslakilaki()) ?></td>
			<td><?php echo angka($ni5['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni6['total_kompetensi']) ?></td>
			<td><?php echo angka($ni7['total_kinerja']) ?></td>
			<td><?php echo angka($ni8['total_disiplin']) ?></td>
			<td><?php echo angka($ni5['total_kualifikasi'])+angka($ni6['total_kompetensi'])+angka($ni7['total_kinerja'])+angka($ni8['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Perempuan</td>
			<td><?php echo angka($m_user->jumlahpnsperempuan()) ?></td>
			<td><?php echo angka($ni9['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni10['total_kompetensi']) ?></td>
			<td><?php echo angka($ni11['total_kinerja']) ?></td>
			<td><?php echo angka($ni12['total_disiplin']) ?></td>
			<td><?php echo angka($ni9['total_kualifikasi'])+angka($ni10['total_kompetensi'])+angka($ni11['total_kinerja'])+angka($ni12['total_disiplin']); ?></td>
		</tr>
		<tr>
			<th>3.</th>
			<th></th>
			<th>Jumlah</th>
			<th><?php echo $j1 = angka($ni5['total_kualifikasi']+$ni9['total_kualifikasi']) ?></th>
			<th><?php echo $j2 = angka($ni6['total_kompetensi']+$ni10['total_kompetensi']) ?></th>
			<th><?php echo $j3 = angka($ni7['total_kinerja']+$ni11['total_kinerja']) ?></th>
			<th><?php echo $j4 = angka($ni8['total_disiplin']+$ni12['total_disiplin']) ?></th>
			<th><?php echo angka($j1+$j2+$j3+$j4); ?></th>
		</tr>
	</tbody>
</table>
<br />
<h5><i class="nav-icon fas fa-sign-out-alt"></i> <strong>NILAI INDEKS PROFESIONALITAS INSTANSI PER JENIS JABATAN</strong></h5>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Jenis</th>
			<th width="50%">JUMLAH PNS</th>
			<th width="50%">KUALIFIKASI</th>
			<th width="50%">KOMPETENSI</th>
			<th width="50%">KINERJA</th>
			<th width="50%">DISIPLIN</th>
			<th width="50%">TOTAL</th>
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td>1.</td>
			<td>Jabatan Struktural</td>
			<td><?php echo angka($m_user->jumlahpns_jenis_jabatan_struktural()) ?></td>
			<td><?php echo angka($ni13['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni14['total_kompetensi']) ?></td>
			<td><?php echo angka($ni15['total_kinerja']) ?></td>
			<td><?php echo angka($ni16['total_disiplin']) ?></td>
			<td><?php echo angka($ni13['total_kualifikasi'])+angka($ni14['total_kompetensi'])+angka($ni15['total_kinerja'])+angka($ni16['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Jabatan Fungsional</td>
			<td><?php echo angka($m_user->jumlahpns_jenis_jabatan_fungsional()) ?></td>
			<td><?php echo angka($ni17['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni18['total_kompetensi']) ?></td>
			<td><?php echo angka($ni19['total_kinerja']) ?></td>
			<td><?php echo angka($ni20['total_disiplin']) ?></td>
			<td><?php echo angka($ni17['total_kualifikasi'])+angka($ni18['total_kompetensi'])+angka($ni19['total_kinerja'])+angka($ni20['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Jabatan Pelaksana</td>
			<td><?php echo angka($m_user->jumlahpns_jenis_jabatan_pelaksana()) ?></td>
			<td><?php echo angka($ni21['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni22['total_kompetensi']) ?></td>
			<td><?php echo angka($ni23['total_kinerja']) ?></td>
			<td><?php echo angka($ni24['total_disiplin']) ?></td>
			<td><?php echo angka($ni21['total_kualifikasi'])+angka($ni22['total_kompetensi'])+angka($ni23['total_kinerja'])+angka($ni24['total_disiplin']); ?></td>
		</tr>
		<tr>
			<th>4.</th>
			<th></th>
			<th></th>
			<th><?php echo $j1 = angka($ni13['total_kualifikasi']+$ni17['total_kualifikasi']+$ni21['total_kualifikasi']) ?></th>
			<th><?php echo $j2 = angka($ni14['total_kompetensi']+$ni18['total_kompetensi']+$ni22['total_kompetensi']) ?></th>
			<th><?php echo $j3 = angka($ni15['total_kinerja']+$ni19['total_kinerja']+$ni23['total_kinerja']) ?></th>
			<th><?php echo $j4 = angka($ni16['total_disiplin']+$ni20['total_disiplin']+$ni24['total_disiplin']) ?></th>
			<th><?php echo angka($j1+$j2+$j3+$j4); ?></td>
		</tr>
	</tbody>
</table>

<br />
<h5><i class="nav-icon fas fa-sign-out-alt"></i> <strong>NILAI INDEKS PROFESIONALITAS INSTANSI PER JENJANG JABATAN</strong></h5>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Jenis</th>
			<th width="50%">JUMLAH PNS</th>
			<th width="50%">KUALIFIKASI</th>
			<th width="50%">KOMPETENSI</th>
			<th width="50%">KINERJA</th>
			<th width="50%">DISIPLIN</th>
			<th width="50%">TOTAL</th>
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td>1.</td>
			<td>JABATAN PIMPINAN TINGGI UTAMA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jptu()) ?></td>
			<td><?php echo angka($ni25['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni26['total_kompetensi']) ?></td>
			<td><?php echo angka($ni27['total_kinerja']) ?></td>
			<td><?php echo angka($ni28['total_disiplin']) ?></td>
			<td><?php echo angka($ni25['total_kualifikasi'])+angka($ni26['total_kompetensi'])+angka($ni27['total_kinerja'])+angka($ni28['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>JABATAN PIMPINAN TINGGI MADYA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jptm()) ?></td>
			<td><?php echo angka($ni29['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni30['total_kompetensi']) ?></td>
			<td><?php echo angka($ni31['total_kinerja']) ?></td>
			<td><?php echo angka($ni32['total_disiplin']) ?></td>
			<td><?php echo angka($ni29['total_kualifikasi'])+angka($ni30['total_kompetensi'])+angka($ni31['total_kinerja'])+angka($ni32['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>JABATAN PIMPINAN TINGGI PRATAMA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jptp()) ?></td>
			<td><?php echo angka($ni33['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni34['total_kompetensi']) ?></td>
			<td><?php echo angka($ni35['total_kinerja']) ?></td>
			<td><?php echo angka($ni36['total_disiplin']) ?></td>
			<td><?php echo angka($ni33['total_kualifikasi'])+angka($ni34['total_kompetensi'])+angka($ni35['total_kinerja'])+angka($ni36['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>JABATAN ADMINISTRATOR</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_ja()) ?></td>
			<td><?php echo angka($ni37['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni38['total_kompetensi']) ?></td>
			<td><?php echo angka($ni39['total_kinerja']) ?></td>
			<td><?php echo angka($ni40['total_disiplin']) ?></td>
			<td><?php echo angka($ni37['total_kualifikasi'])+angka($ni38['total_kompetensi'])+angka($ni39['total_kinerja'])+angka($ni40['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>JABATAN PENGAWAS</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jp()) ?></td>
			<td><?php echo angka($ni41['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni42['total_kompetensi']) ?></td>
			<td><?php echo angka($ni43['total_kinerja']) ?></td>
			<td><?php echo angka($ni44['total_disiplin']) ?></td>
			<td><?php echo angka($ni41['total_kualifikasi'])+angka($ni42['total_kompetensi'])+angka($ni43['total_kinerja'])+angka($ni44['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>JABATAN FUNGSIONAL AHLI UTAMA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfau()) ?></td>
			<td><?php echo angka($ni45['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni46['total_kompetensi']) ?></td>
			<td><?php echo angka($ni47['total_kinerja']) ?></td>
			<td><?php echo angka($ni48['total_disiplin']) ?></td>
			<td><?php echo angka($ni45['total_kualifikasi'])+angka($ni46['total_kompetensi'])+angka($ni47['total_kinerja'])+angka($ni48['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>7.</td>
			<td>JABATAN FUNGSIONAL AHLI MADYA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfamy()) ?></td>
			<td><?php echo angka($ni49['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni50['total_kompetensi']) ?></td>
			<td><?php echo angka($ni51['total_kinerja']) ?></td>
			<td><?php echo angka($ni52['total_disiplin']) ?></td>
			<td><?php echo angka($ni49['total_kualifikasi'])+angka($ni50['total_kompetensi'])+angka($ni51['total_kinerja'])+angka($ni52['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>JABATAN FUNGSIONAL AHLI MUDA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfamu()) ?></td>
			<td><?php echo angka($ni53['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni54['total_kompetensi']) ?></td>
			<td><?php echo angka($ni55['total_kinerja']) ?></td>
			<td><?php echo angka($ni56['total_disiplin']) ?></td>
			<td><?php echo angka($ni53['total_kualifikasi'])+angka($ni54['total_kompetensi'])+angka($ni55['total_kinerja'])+angka($ni56['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>9.</td>
			<td>JABATAN FUNGSIONAL AHLI PERTAMA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfap()) ?></td>
			<td><?php echo angka($ni57['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni58['total_kompetensi']) ?></td>
			<td><?php echo angka($ni59['total_kinerja']) ?></td>
			<td><?php echo angka($ni60['total_disiplin']) ?></td>
			<td><?php echo angka($ni57['total_kualifikasi'])+angka($ni58['total_kompetensi'])+angka($ni59['total_kinerja'])+angka($ni60['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>10.</td>
			<td>JABATAN FUNGSIONAL PENYELIA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfp()) ?></td>
			<td><?php echo angka($ni61['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni62['total_kompetensi']) ?></td>
			<td><?php echo angka($ni63['total_kinerja']) ?></td>
			<td><?php echo angka($ni64['total_disiplin']) ?></td>
			<td><?php echo angka($ni61['total_kualifikasi'])+angka($ni62['total_kompetensi'])+angka($ni63['total_kinerja'])+angka($ni64['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>11.</td>
			<td>JABATAN FUNGSIONAL MAHIR</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfp()) ?></td>
			<td><?php echo angka($ni65['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni66['total_kompetensi']) ?></td>
			<td><?php echo angka($ni67['total_kinerja']) ?></td>
			<td><?php echo angka($ni68['total_disiplin']) ?></td>
			<td><?php echo angka($ni65['total_kualifikasi'])+angka($ni66['total_kompetensi'])+angka($ni67['total_kinerja'])+angka($ni68['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>12.</td>
			<td>JABATAN FUNGSIONAL TERAMPIL</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jft()) ?></td>
			<td><?php echo angka($ni69['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni70['total_kompetensi']) ?></td>
			<td><?php echo angka($ni71['total_kinerja']) ?></td>
			<td><?php echo angka($ni72['total_disiplin']) ?></td>
			<td><?php echo angka($ni69['total_kualifikasi'])+angka($ni70['total_kompetensi'])+angka($ni71['total_kinerja'])+angka($ni72['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>13.</td>
			<td>JABATAN FUNGSIONAL PEMULA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfpm()) ?></td>
			<td><?php echo angka($ni73['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni74['total_kompetensi']) ?></td>
			<td><?php echo angka($ni75['total_kinerja']) ?></td>
			<td><?php echo angka($ni76['total_disiplin']) ?></td>
			<td><?php echo angka($ni73['total_kualifikasi'])+angka($ni74['total_kompetensi'])+angka($ni75['total_kinerja'])+angka($ni76['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>14.</td>
			<td>JABATAN FUNGSIONAL PELAKSANA</td>
			<td><?php echo angka($m_user->jumlahpns_jenjang_jabatan_jfpl()) ?></td>
			<td><?php echo angka($ni77['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni78['total_kompetensi']) ?></td>
			<td><?php echo angka($ni79['total_kinerja']) ?></td>
			<td><?php echo angka($ni80['total_disiplin']) ?></td>
			<td><?php echo angka($ni77['total_kualifikasi'])+angka($ni78['total_kompetensi'])+angka($ni79['total_kinerja'])+angka($ni80['total_disiplin']); ?></td>
		</tr>
		<tr>
			<th>15.</th>
			<th></th>
			<th>Jumlah</th>
			<th><?php echo $j1 = angka($ni25['total_kualifikasi']+$ni29['total_kualifikasi']+$ni33['total_kualifikasi']+$ni37['total_kualifikasi']+$ni41['total_kualifikasi']+$ni45['total_kualifikasi']+$ni49['total_kualifikasi']+$ni53['total_kualifikasi']+$ni57['total_kualifikasi']+$ni61['total_kualifikasi']+$ni65['total_kualifikasi']+$ni69['total_kualifikasi']+$ni73['total_kualifikasi']+$ni77['total_kualifikasi']) ?></th>
			<th><?php echo $j2 = angka($ni26['total_kompetensi']+$ni30['total_kompetensi']+$ni34['total_kompetensi']+$ni38['total_kompetensi']+$ni42['total_kompetensi']+$ni46['total_kompetensi']+$ni50['total_kompetensi']+$ni54['total_kompetensi']+$ni58['total_kompetensi']+$ni62['total_kompetensi']+$ni66['total_kompetensi']+$ni70['total_kompetensi']+$ni74['total_kompetensi']+$ni78['total_kompetensi']) ?></th>
			<th><?php echo $j3 = angka($ni27['total_kinerja']+$ni31['total_kinerja']+$ni35['total_kinerja']+$ni39['total_kinerja']+$ni43['total_kinerja']+$ni47['total_kinerja']+$ni51['total_kinerja']+$ni55['total_kinerja']+$ni59['total_kinerja']+$ni63['total_kinerja']+$ni67['total_kinerja']+$ni71['total_kinerja']+$ni75['total_kinerja']+$ni79['total_kinerja']) ?></th>
			<td><?php echo $j4 = angka($ni28['total_disiplin']+$ni32['total_disiplin']+$ni36['total_disiplin']+$ni40['total_disiplin']+$ni44['total_disiplin']+$ni48['total_disiplin']+$ni52['total_disiplin']+$ni56['total_disiplin']+$ni60['total_disiplin']+$ni64['total_disiplin']+$ni68['total_disiplin']+$ni72['total_disiplin']+$ni76['total_disiplin']+$ni80['total_disiplin']) ?></th>
			<th><?php echo angka($j1+$j2+$j3+$j4); ?></th>
		</tr>
	</tbody>
</table>
<br />
<h5><i class="nav-icon fas fa-sign-out-alt"></i> <strong>NILAI INDEKS PROFESIONALITAS INSTANSI PER TINGKAT PENDIDIKAN</strong></h5>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Jenis</th>
			<th width="50%">JUMLAH PNS</th>
			<th width="50%">KUALIFIKASI</th>
			<th width="50%">KOMPETENSI</th>
			<th width="50%">KINERJA</th>
			<th width="50%">DISIPLIN</th>
			<th width="50%">TOTAL</th>
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td>1.</td>
			<td>S3</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_s3()) ?></td>
			<td><?php echo angka($ni81['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni82['total_kompetensi']) ?></td>
			<td><?php echo angka($ni83['total_kinerja']) ?></td>
			<td><?php echo angka($ni84['total_disiplin']) ?></td>
			<td><?php echo angka($ni81['total_kualifikasi'])+angka($ni82['total_kompetensi'])+angka($ni83['total_kinerja'])+angka($ni84['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>S2</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_s2()) ?></td>
			<td><?php echo angka($ni85['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni86['total_kompetensi']) ?></td>
			<td><?php echo angka($ni87['total_kinerja']) ?></td>
			<td><?php echo angka($ni88['total_disiplin']) ?></td>
			<td><?php echo angka($ni85['total_kualifikasi'])+angka($ni86['total_kompetensi'])+angka($ni87['total_kinerja'])+angka($ni88['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>S1/D4/Sederajat</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_s1()) ?></td>
			<td><?php echo angka($ni89['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni90['total_kompetensi']) ?></td>
			<td><?php echo angka($ni91['total_kinerja']) ?></td>
			<td><?php echo angka($ni92['total_disiplin']) ?></td>
			<td><?php echo angka($ni89['total_kualifikasi'])+angka($ni90['total_kompetensi'])+angka($ni91['total_kinerja'])+angka($ni92['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>D3/Sederajat</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_d3()) ?></td>
			<td><?php echo angka($ni93['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni94['total_kompetensi']) ?></td>
			<td><?php echo angka($ni95['total_kinerja']) ?></td>
			<td><?php echo angka($ni96['total_disiplin']) ?></td>
			<td><?php echo angka($ni93['total_kualifikasi'])+angka($ni94['total_kompetensi'])+angka($ni95['total_kinerja'])+angka($ni96['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>D2/D1/SMA/SMK Sederajat</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_d2()) ?></td>
			<td><?php echo angka($ni97['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni98['total_kompetensi']) ?></td>
			<td><?php echo angka($ni99['total_kinerja']) ?></td>
			<td><?php echo angka($ni100['total_disiplin']) ?></td>
			<td><?php echo angka($ni97['total_kualifikasi'])+angka($ni98['total_kompetensi'])+angka($ni99['total_kinerja'])+angka($ni100['total_disiplin']); ?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>SD SMP Sederajat</td>
			<td><?php echo angka($m_user->jumlahpns_tingkat_pendidikan_sd()) ?></td>
			<td><?php echo angka($ni101['total_kualifikasi']) ?></td>
			<td><?php echo angka($ni102['total_kompetensi']) ?></td>
			<td><?php echo angka($ni103['total_kinerja']) ?></td>
			<td><?php echo angka($ni104['total_disiplin']) ?></td>
			<td><?php echo angka($ni101['total_kualifikasi'])+angka($ni102['total_kompetensi'])+angka($ni103['total_kinerja'])+angka($ni104['total_disiplin']); ?></td>
		</tr>
		<tr>
			<th>7.</th>
			<th></th>
			<th>Jumlah</th>
			<th><?php echo $j1 = angka($ni81['total_kualifikasi']+$ni85['total_kualifikasi']+$ni89['total_kualifikasi']+$ni93['total_kualifikasi']+$ni97['total_kualifikasi']+$ni101['total_kualifikasi']) ?></td>
			<td><?php echo $j2 = angka($ni82['total_kompetensi']+$ni86['total_kompetensi']+$ni90['total_kompetensi']+$ni94['total_kompetensi']+$ni98['total_kompetensi']+$ni102['total_kompetensi']) ?></td>
			<td><?php echo $j3 = angka($ni83['total_kinerja']+$ni87['total_kinerja']+$ni91['total_kinerja']+$ni95['total_kinerja']+$ni99['total_kinerja']+$ni103['total_kinerja']) ?></th>
			<th><?php echo $j4 = angka($ni84['total_disiplin']+$ni88['total_disiplin']+$ni92['total_disiplin']+$ni96['total_disiplin']+$ni100['total_disiplin']+$ni104['total_disiplin']) ?></th>
			<th><?php echo angka($j1+$j2+$j3+$j4); ?></th>
		</tr>
	</tbody>
</table>
<?php echo form_close(); ?>