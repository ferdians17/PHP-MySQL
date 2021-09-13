<div class="w3-padding">
	<h2><i class="fa fa-cogs"></i> Settings - Personal Account</h2>
	<hr>
	<p>
		<label>Nama Lengkap:</label>
		<input type="hidden" id="admin_id" value="<?= $data['me']['id']; ?>">
		<input type="text" class="w3-input w3-border" id="nama_lengkap" value="<?= $data['me']['nama']; ?>">
	</p>
	<p>
		<label>Email Address:</label>
		<input type="email" class="w3-input w3-border" id="email_address" value="<?= $data['me']['email']; ?>">
	</p>
	<p>
		<label>Old Password:</label>
		<input type="password" class="w3-input w3-border" id="old_password">
		<input type="hidden" id="admin_pass" value="<?= $data['me']['password']; ?>">
	</p>
	<p>
		<label>New Password:</label>
		<input type="password" class="w3-input w3-border" id="new_password">
	</p>
	<p>
		<label>Confirm Password:</label>
		<input type="password" class="w3-input w3-border" id="confirm_password">
	</p>
	<p>
		<button class="w3-button w3-green w3-round" onclick="saveMe()"><i class="fa fa-send-o"></i> Update</button>
	</p>
</div>