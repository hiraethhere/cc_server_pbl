        document.addEventListener('DOMContentLoaded', function() {
        // 1. DEFINISI ID SESUAI HTML KAMU
        const tanggalPinjam = document.getElementById('tanggalPinjam');
        const jamMulai = document.getElementById('jamMulai');
        const jamSelesai = document.getElementById('jamSelesai');
        const durasiText = document.getElementById('totalTime'); // Span di dalam #totalTime
        const roomIdInput = document.getElementById('id_room');

    // Fallback jika roomId tidak ada
        const roomId = roomIdInput ? roomIdInput.value : 1;

    // config waktu, atur aja
    const operationalStart = 8 * 60; // 07:00
    const operationalEnd = 16 * 60;  // 17:00
    const interval = 30;             // 30 menit
    const maxDuration = 180;         // 3 jam (180 menit)
    const today = new Date();
    const maxDate = new Date();
    maxDate.setDate(today.getDate() + 7);
    const maxDateString = maxDate.toISOString().split('T')[0];
    tanggalPinjam.max = maxDateString;

    let todaysBookings = [];

    // async saat tanggal dpilih
        tanggalPinjam.addEventListener('change', async function() {
            const date = this.value;
            if (!date) return;

            today.setHours(0,0,0,0);
            const dateObj = new Date(date);
            dateObj.setHours(0,0,0,0);
            const day = dateObj.getDay();

            if (today > dateObj) {
                alert("Tanggal tidak boleh sebelum hari ini");
                this.value = '';
                resetSelect(jamMulai, 'Pilih jam mulai');
                resetSelect(jamSelesai, 'Pilih jam selesai');
                jamMulai.setAttribute('disabled', true);
                jamSelesai.setAttribute('disabled', true);
                updateTotalTime(0);
                return;
            }

            if (day === 0 || day === 6) {
            //Tampilkan Pesan Error
            alert("Maaf, tidak bisa melakukan booking di hari Sabtu & Minggu (Hari Libur).");
            
            //Kosongkan Input Tanggal
            this.value = '';
            
            // Reset form
                resetSelect(jamMulai, 'Pilih jam mulai');
                resetSelect(jamSelesai, 'Pilih jam selesai');
                jamMulai.setAttribute('disabled', true);
                jamSelesai.setAttribute('disabled', true);
                updateTotalTime(0);
                return;
            }
                resetSelect(jamMulai, 'Pilih jam mulai');
                resetSelect(jamSelesai, 'Pilih jam selesai');
                updateTotalTime(0);
                jamMulai.removeAttribute('disabled')

            try {
                // Fetch ke Controller Bookings yang sudah kita buat
                const response = await fetch(`${BASEURL}/Booking/cekJadwal`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ room_id: roomId, date: date })
                });
            
                const data = await response.json();
                console.log("succes dapet data", data)

                if (!response.ok) throw new Error(`HTTP ${response.status}`);

                // Format data booking menjadi menit
                todaysBookings = data.map(b => ({
                    start: timeToMinutes(b.start_time),
                    end: timeToMinutes(b.end_time)
                }));

                populateJamMulai();

            } catch (error) {
                console.error('Gagal mengambil jadwal:', error);
            }
        });

    // --- LOGIC: ISI JAM MULAI ---
    function populateJamMulai() {
        jamMulai.innerHTML = '<option value="" disabled selected hidden>Pilih jam mulai</option>';
        
        for (let time = operationalStart; time < operationalEnd; time += interval) {
            // Cek apakah jam ini bentrok dengan booking orang lain
            const isConflict = todaysBookings.some(booking => {
                return time >= booking.start && time < booking.end;
            });

            if (!isConflict) {
                addOption(jamMulai, time);
            }
        }
    }

    // --- EVENT 2: SAAT JAM MULAI DIPILIH ---
jamMulai.addEventListener('change', function() {
        const startVal = this.value;
        resetSelect(jamSelesai, 'Pilih jam selesai');
        updateTotalTime(0);

        jamSelesai.removeAttribute('disabled')

        if (!startVal) return;

        const startTime = timeToMinutes(startVal);
        
        // Hitung batas akhir (Max 3 jam atau Jam Tutup)
        let limitTime = Math.min(operationalEnd, startTime + maxDuration);

        // Cek booking terdekat di depan user ini
        const nextBooking = todaysBookings.filter(b => b.start > startTime).sort((a, b) => a.start - b.start)[0];

        if (nextBooking) {
            limitTime = Math.min(limitTime, nextBooking.start);
        }

        // Isi dropdown jam selesai
        for (let time = startTime + interval; time <= limitTime; time += interval) {
            addOption(jamSelesai, time);
        }
    });

    // --- EVENT 3: SAAT JAM SELESAI DIPILIH (HITUNG DURASI) ---
    jamSelesai.addEventListener('change', function() {
        const startVal = jamMulai.value;
        const endVal = this.value;

        if (startVal && endVal) {
            const start = timeToMinutes(startVal);
            const end = timeToMinutes(endVal);
            updateTotalTime(end - start);
        }
    });

    // --- HELPER FUNCTIONS ---
    
    // Update tampilan "0 Jam 0 Menit"
    function updateTotalTime(minutes) {
        const h = Math.floor(minutes / 60);
        const m = minutes % 60;
        if (durasiText) {
            durasiText.textContent = `${h} Jam ${m} Menit`;
        }
    }

    // Konversi String/Datetime ke Menit
    function timeToMinutes(timeStr) {
        let timePart = timeStr;
        if (timeStr.includes(' ')) timePart = timeStr.split(' ')[1];
        const [h, m] = timePart.split(':').map(Number);
        return (h * 60) + m;
    }

    // Konversi Menit ke "HH:mm"
    function minutesToTime(totalMinutes) {
        const h = Math.floor(totalMinutes / 60);
        const m = totalMinutes % 60;
        return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
    }

    function addOption(select, timeInMinutes) {
        const timeStr = minutesToTime(timeInMinutes);
        const option = document.createElement('option');
        option.value = timeStr + ":00"; 
        option.textContent = timeStr;
        select.appendChild(option);
    }

    function resetSelect(el, text) {
        el.innerHTML = `<option value="" disabled selected hidden>${text}</option>`;
    }
});