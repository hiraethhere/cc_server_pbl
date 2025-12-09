document.addEventListener('DOMContentLoaded', function () {
    console.log("JS loaded ✅");
    // --- ELEMENTS ---
    const tanggalPinjam = document.getElementById('tanggalPinjam');
    const jamMulai = document.getElementById('jamMulai');
    const jamSelesai = document.getElementById('jamSelesai');
    const durasiText = document.getElementById('totalTime');
    const roomIdInput = document.getElementById('id_room');
    console.log({
    tanggalPinjam,
    jamMulai,
    jamSelesai,
    roomIdInput
});

    // --- CONFIG ---
    const operationalStart = 8 * 60; // 08:00
    const operationalEnd = 16 * 60;  // 16:00
    const maxDuration = 180;         // 3 jam
    
    const today = new Date();
    const maxDate = new Date();
    maxDate.setDate(today.getDate() + 7);
    tanggalPinjam.max = maxDate.toISOString().split('T')[0];

    let todaysBookings = [];

    // Disable time inputs di awal
    jamMulai.disabled = true;
    jamSelesai.disabled = true;

    // --- EVENT: PILIH TANGGAL ---
    tanggalPinjam.addEventListener('change', async function () {
        console.log("Tanggal diubah:", this.value);
        const date = this.value;

        const currentRoomId = roomIdInput ? roomIdInput.value : '';
        if (!date) return;
        if (!currentRoomId) {
            alert("ID Ruangan tidak ditemukan!");
            return;
        }

        const dateObj = new Date(date);
        dateObj.setHours(0, 0, 0, 0);
        today.setHours(0, 0, 0, 0);

        const day = dateObj.getDay();

        // Reset
        jamMulai.value = "";
        jamSelesai.value = "";
        updateTotalTime(0);

        // Validasi tanggal
        if (today > dateObj) {
            alert("Tanggal tidak boleh sebelum hari ini");
            this.value = "";
            disableTimeInputs();
            return;
        }

        if (day === 0 || day === 6) {
            alert("Tidak bisa booking di hari Sabtu & Minggu");
            this.value = "";
            disableTimeInputs();
            return;
        }

        // Enable time input
        jamMulai.disabled = false;
        jamSelesai.disabled = false;

        try {
            // Pastikan tidak ada double slash
            const cleanBaseUrl = BASEURL.endsWith('/') ? BASEURL : BASEURL + '/';
            const url = `${cleanBaseUrl}Booking/cekJadwal`;
            
            console.log("Fetching ke:", url); // Cek URL final di console

            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ room_id: currentRoomId, date: date })
            });

            // --- DEBUGGING TAHAP DEWA ---
            // Kita ambil teks mentahnya dulu, jangan langsung .json()
            // Karena kalau PHP error, dia balikin HTML, dan .json() bakal crash.
            const rawText = await response.text();
            console.log("Respon Server Asli:", rawText); 

            if (!response.ok) {
                throw new Error(`HTTP Error: ${response.status} - ${response.statusText}`);
            }

            // Coba parse manual
            let data;
            try {
                data = JSON.parse(rawText);
            } catch (e) {
                throw new Error("Server tidak mengembalikan JSON valid! Cek 'Respon Server Asli' di console.");
            }
            // -----------------------------

            // Simpan booking dalam menit
            todaysBookings = data.map(b => ({
                start: timeToMinutes(b.start_time),
                end: timeToMinutes(b.end_time)
            }));
            
            console.log("✅ Data Booking berhasil diproses:", todaysBookings);

        } catch (err) {
            console.error("❌ Gagal ambil jadwal:", err);
            alert("Gagal mengambil data jadwal: " + err.message);
        }
    });

    // --- EVENT: SAAT JAM DIUBAH ---
    jamMulai.addEventListener('change', validateTimeRange);
    jamSelesai.addEventListener('change', validateTimeRange);

    // --- MAIN VALIDATION ---
    function validateTimeRange() {
        const startVal = jamMulai.value;
        const endVal = jamSelesai.value;

        if (!startVal || !endVal) return;

        const start = timeToMinutes(startVal);
        const end = timeToMinutes(endVal);

        // Jam selesai harus setelah jam mulai
        if (end <= start) {
            alert("Jam selesai harus lebih besar dari jam mulai");
            jamSelesai.value = "";
            updateTotalTime(0);
            return;
        }

        const duration = end - start;

        // Jam operasional
        if (start < operationalStart || end > operationalEnd) {
            alert("Waktu harus dalam jam operasional (08:00 - 16:00)");
            resetTimeInputs();
            return;
        }

        // Maks durasi
        if (duration > maxDuration) {
            alert("Durasi maksimal 3 jam");
            jamSelesai.value = "";
            updateTotalTime(0);
            return;
        }

        // Cek bentrok booking
        const isConflict = todaysBookings.some(b => {
            return start < b.end && end > b.start;
        });

        if (isConflict) {
            alert("Waktu bentrok dengan booking lain");
            resetTimeInputs();
            return;
        }

        // Valid ✔
        updateTotalTime(duration);
    }

    // --- HELPERS ---
    function timeToMinutes(timeStr) {
        let t = timeStr;
        if (timeStr.includes(' ')) t = timeStr.split(' ')[1];
        const [h, m] = t.split(':').map(Number);
        return (h * 60) + m;
    }

    function updateTotalTime(minutes) {
        const h = Math.floor(minutes / 60);
        const m = minutes % 60;
        if (durasiText) {
            durasiText.textContent = `${h} Jam ${m} Menit`;
        }
    }

    function disableTimeInputs() {
        jamMulai.disabled = true;
        jamSelesai.disabled = true;
    }

    function resetTimeInputs() {
        jamMulai.value = "";
        jamSelesai.value = "";
        updateTotalTime(0);
    }
});
