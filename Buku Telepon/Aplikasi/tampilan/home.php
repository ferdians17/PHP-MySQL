<div class="w3-padding">
	<div class="w3-container w3-margin-bottom">
		<button target-modal="#add-new" class="w3-button w3-blue w3-round w3-margin-right btn-modal"><i class="fa fa-vcard-o"></i> Add new</button>
		<button onclick="showSearch('#p-search');" class="w3-button w3-green w3-round w3-margin-right"><i class="fa fa-search"></i> Search</button>

		<div class="w3-dropdown-hover w3-right hidden" id="p-search">
			<input type="search" class="w3-input w3-border" id="search" placeholder="Keyword here..." onkeyup="liveSearch(this)" autocomplete="none" style="width: 300px;">
			<div class="w3-dropdown-content w3-bar-block w3-border" id="resultSearch" style="width: 300px;">
			</div>
		</div>
	</div>
	<!-- table data -->
	<div class="w3-container w3-margin-bottom">
		<table class="w3-table-all">
			<thead>
				<tr class="w3-orange">
					<th>
						<input type="checkbox" id="selectAll" onchange="select_all(this)">
					</th>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Nomor Telepon</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach($data['member'] as $member):
			?>
				<tr>
					<td>
						<input type="checkbox" class="selected" value="">
					</td>
					<td><?= $no; ?></td>
					<td><?= $member['nama']; ?></td>
					<td><?= kunci::notel($member['nomor']); ?></td>
					<td><?= $member['kelamin']; ?></td>
					<td><?= $member['alamat']; ?></td>
					<td>
						<button onclick="edit('<?= $member['id']; ?>', '#edit')" class="w3-button w3-orange w3-round btn-modal" target-modal="#edit"><i class="fa fa-edit"></i></button>
						<button onclick="dell('<?= $member['id']; ?>')" class="w3-button w3-red w3-round"><i class="fa fa-trash-o"></i></button>
						<a href="https://web.WhatsApp.com/send?phone=<?= $member['nomor']; ?>" target="_blank" class="w3-button w3-green w3-round"><i class="fa fa-whatsapp"></i></a>
					</td>
				</tr>
			<?php
			$no++;
			endforeach;
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="w3-modal" id="edit">
	<div class="w3-modal-content">
		<div class="w3-container">
			<button class="w3-display-topright w3-button w3-red btn-modal" target-modal="#edit">&times;</button>
			<h2>Update Member</h2>
			<hr>
			<p>
				<label>Nama Lengkap:</label>
				<input type="hidden" id="id" class="w3-border w3-input">
				<input type="text" id="nama" class="w3-border w3-input">
			</p>
			<p>
				<label>Nomor Telepon:</label>
				<input type="number" id="nomor" class="w3-border w3-input">
			</p>
			<p>
				<label>Jenis Kelamin:</label>
				<select id="kelamin" class="w3-select w3-border">
					<option value="pria"> Pria </option>
					<option value="wanita"> Wanita </option>
				</select>
			</p>
			<p>
				<label>Alamat:</label>
				<textarea id="alamat" class="textarea w3-border w3-input"></textarea>
			</p>
			<p>
				<button class="w3-button w3-green w3-round" onclick="proEdit('#edit')">Save</button>
				<button class="w3-button w3-red w3-round btn-modal" target-modal="#edit">Cancel</button>
			</p>
		</div>
	</div>
</div>

<div class="w3-modal" id="add-new">
	<div class="w3-modal-content">
		<div class="w3-container">
			<button class="w3-display-topright w3-button w3-red btn-modal" target-modal="#add-new">&times;</button>
			<h2><i class="fa fa-vcard-o"></i> Add New</h2>
			<hr>
			<p>
				<label>Nama Lengkap:</label>
				<input type="text" id="nama" class="w3-border w3-input">
			</p>
			<p>
				<label>Nomor Telepon:</label>
				<input type="number" id="nomor" class="w3-border w3-input">
			</p>
			<p>
				<label>Jenis Kelamin:</label>
				<select id="kelamin" class="w3-select w3-border">
					<option value="pria"> Pria </option>
					<option value="wanita"> Wanita </option>
				</select>
			</p>
			<p>
				<label>Alamat:</label>
				<textarea id="alamat" class="textarea w3-border w3-input"></textarea>
			</p>
			<p>
				<button class="w3-button w3-green w3-round" onclick="addNew('#add-new')"><i class="fa fa-send-o"></i> Save</button>
				<button class="w3-button w3-red w3-round btn-modal" target-modal="#add-new"><i class="fa fa-eraser"></i> Cancel</button>
			</p>
		</div>
	</div>
</div>