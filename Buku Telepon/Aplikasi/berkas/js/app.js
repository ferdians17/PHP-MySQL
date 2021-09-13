const __URL__ = "http://localhost/butel";
const ajax  = new XMLHttpRequest();
const formdata  = new FormData();

const selectAll = document.querySelector("#selectAll");
const selected = document.querySelectorAll(".selected");

function select_all(all)
{
	if (all.checked)
	{
		selected.forEach(select =>
		{
			select.checked = true;
		});
	}
	
	else
	{
		selected.forEach(select =>
		{
			select.checked = false;
		});
	}
}

const btnModal = document.querySelectorAll(".btn-modal");

btnModal.forEach(kliksaya =>
{
	kliksaya.addEventListener("click", ()=>
	{
		let targetModal = kliksaya.getAttribute("target-modal");
		document.querySelector(targetModal).classList.toggle("tampil");
	});
});

function addNew(elemen)
{
	let panel = document.querySelector(elemen);
	let nama =  panel.querySelector("#nama");
	let nomor =  panel.querySelector("#nomor");
	let kelamin =  panel.querySelector("#kelamin");
	let alamat =  panel.querySelector("#alamat");

	formdata.append("nama", nama.value);
	formdata.append("nomor", nomor.value);
	formdata.append("kelamin", kelamin.value);
	formdata.append("alamat", alamat.value);

	ajax.onload = () =>
	{
		alert(ajax.responseText);
		location.href = __URL__;
	}
	ajax.open("POST", __URL__ + "/proses/add/");
	ajax.send(formdata);
}

function edit(id, elemen)
{
	let panel = document.querySelector(elemen);
	let nama =  panel.querySelector("#nama");
	let nomor =  panel.querySelector("#nomor");
	let kelamin =  panel.querySelector("#kelamin");
	let alamat =  panel.querySelector("#alamat");
	let mid =  panel.querySelector("#id");
	formdata.append("id", id);

	ajax.onload = () =>
	{

		let result = JSON.parse(ajax.responseText);

		if (result.id != null)
		{
			nama.value = result.nama;
			nomor.value = result.nomor;
			kelamin.value = result.kelamin;
			alamat.value = result.alamat;
			mid.value = result.id;
		}
	}
	ajax.open("POST",  __URL__ + "/proses/mid/");
	ajax.send(formdata);
}

function detail(id, elemen)
{
	let panel = document.querySelector(elemen);
	panel.classList.toggle('tampil');
	formdata.append("id", id);

	ajax.onload = () =>
	{
		let nama =  panel.querySelector("#nama");
		let nomor =  panel.querySelector("#nomor");
		let kelamin =  panel.querySelector("#kelamin");
		let alamat =  panel.querySelector("#alamat");
		let mid =  panel.querySelector("#id");

		let result = JSON.parse(ajax.responseText);

		if (result.id != null)
		{
			nama.value = result.nama;
			nomor.value = result.nomor;
			kelamin.value = result.kelamin;
			alamat.value = result.alamat;
			mid.value = result.id;
		}
	}
	ajax.open("POST",  __URL__ + "/proses/mid/");
	ajax.send(formdata);
}

function proEdit(elemen)
{
	let panel = document.querySelector(elemen);
	let id =  panel.querySelector("#id");
	let nama =  panel.querySelector("#nama");
	let nomor =  panel.querySelector("#nomor");
	let kelamin =  panel.querySelector("#kelamin");
	let alamat =  panel.querySelector("#alamat");

	formdata.append("nama", nama.value);
	formdata.append("nomor", nomor.value);
	formdata.append("kelamin", kelamin.value);
	formdata.append("alamat", alamat.value);

	ajax.onload = () =>
	{
		alert(ajax.responseText);
		location.href =  __URL__;
	}
	ajax.open("POST",  __URL__ + "/proses/update/");
	ajax.send(formdata);
}

function dell(id)
{
	formdata.append("id", id);
	ajax.onload = () =>
	{
		alert(ajax.responseText);
		location.href =  __URL__;
	}
	ajax.open("POST",  __URL__ + "/proses/delete/");
	ajax.send(formdata);
}

function showSearch(elemen)
{
	let panel = document.querySelector(elemen);
	panel.classList.toggle("hidden");
}

function liveSearch(elemen)
{
	const resultSearch = document.querySelector("#resultSearch");
	formdata.append("keyword", elemen.value);

	ajax.onload = ()=>
	{
		let result = JSON.parse(ajax.responseText);
		let isian = `<ul class="w3-ul w3-border">`;
		result.forEach(data =>
		{
			isian +=
			`<li>
				${data.nama}
			<div style="text-align:right; font-size:10px;">
				<button onclick="detail('${data.id}', '#edit')" class="w3-button w3-orange w3-round"><i class="fa fa-edit"></i></button>
				<button onclick="dell('${data.id}')" class="w3-button w3-red w3-round"><i class="fa fa-trash-o"></i></button>
				<a href="https://web.WhatsApp.com/send?phone=${data.nomor}" target="_blank" class="w3-button w3-green w3-round"><i class="fa fa-whatsapp"></i></a>
			</div>
			</li>`;
		})
		isian += `</ul>`;
		resultSearch.innerHTML =  isian;
	}
	ajax.open("POST" ,  __URL__ + "/proses/search/");
	ajax.send(formdata);
}

function login()
{
	let email = document.querySelector("#email").value;
	let password = document.querySelector("#password").value;

	formdata.append("mail", email);
	formdata.append("pass", password);
	ajax.onload = ()=>
	{
		if (ajax.responseText == "success")
		{
			alert("Proses masuk berhasil!");
			location.href = __URL__ ;
		}
		else
		{
			alert(ajax.responseText);
		}
	}
	ajax.open("POST", __URL__ + "/utama/loginpro/");
	ajax.send(formdata);
}


function saveMe()
{
	let id = document.querySelector("#admin_id").value;
	let nama = document.querySelector("#nama_lengkap").value;
	let email = document.querySelector("#email_address").value;
	let admin_pass = document.querySelector("#admin_pass").value;
	let old_password = document.querySelector("#old_password").value;
	let new_password = document.querySelector("#new_password").value;
	let confirm_password = document.querySelector("#confirm_password").value;

	formdata.append("id", id);
	formdata.append("nama", nama);
	formdata.append("email", email);
	formdata.append("admin_pass", admin_pass);
	formdata.append("old_password", old_password);
	formdata.append("new_password", new_password);
	formdata.append("confirm_password", confirm_password);

	ajax.onload = ()=>
	{
		alert(ajax.responseText);
		location.href = __URL__ + "/utama/settings/";
	}
	ajax.open("POST", __URL__ + "/proses/upMe/");
	ajax.send(formdata);
}