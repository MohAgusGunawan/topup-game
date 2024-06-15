// Mendapatkan elemen input datetime
const datetimeInput = document.getElementById('datetime-input');

// Mendapatkan waktu saat ini
const now = new Date();

// Mengubah format waktu saat ini menjadi string yang diterima oleh input datetime
const formattedDateTime = now.toISOString().slice(0, 16);

// Mengisi nilai input dengan waktu saat ini
datetimeInput.value = formattedDateTime;