// Ambil elemen input tanggal transaksi
var inputTanggal = document.getElementById("tgl_transaksi");

// Fungsi untuk memperbarui nilai input tanggal sesuai waktu sekarang
function updateInputTanggal() {
    var now = new Date(); // Waktu sekarang
    var formattedDate = now.toLocaleString("sv-SE", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
        hour12: false
    }); // Format tanggal yang diinginkan (YYYY-MM-DDTHH:mm)
    inputTanggal.value = formattedDate.replace(/ /g, "T");
}

// Panggil fungsi updateInputTanggal saat halaman selesai dimuat
window.onload = updateInputTanggal;

function changeColor(element, value1, value2) {
    // Mengambil elemen input tersembunyi
    let jumlah = document.getElementById('jumlah');
    let harga = document.getElementById('harga');

    // Mengatur nilai input tersembunyi dengan nilai yang diberikan
    jumlah.value = value1;
    harga.value = value2;

    let jumlah_item = document.getElementById('jumlah_item');
    let total_harga = document.getElementById('total_harga');

    jumlah_item.innerHTML = "<strong>Jumlah Item : " + value1 + "</strong>";
    total_harga.innerHTML = "<strong>Total Harga : Rp. " + value2 + "</strong>";

    jumlah_item.value = value1;
    total_harga.value = value2;

    // Menghapus class "selected" dari semua elemen yang bisa diklik
    let listItems = document.querySelectorAll('.list-item');
    listItems.forEach(function (item) {
        item.classList.remove('selected');
    });

    // Menambahkan class "selected" pada elemen yang diklik
    element.classList.add('selected');
}