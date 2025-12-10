<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Peminjaman</title>
    <style>
        /* Reset dasar */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        /* Styling Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        /* Judul Laporan */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2, .header h3 {
            margin: 5px 0;
        }

        /* Mengatur agar Status Berwarna (Opsional, tapi bagus buat PDF) */
        .status-success { color: green; font-weight: bold; }
        .status-pending { color: orange; font-weight: bold; }
        .status-rejected { color: red; font-weight: bold; }

        /* Aturan Print: Kertas Landscape A4 */
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }
            /* Hilangkan tombol cetak saat diprint */
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>LAPORAN DATA PEMINJAMAN RUANGAN</h2>
        <h3>Politeknik Negeri Jakarta</h3>
        <p>Tanggal Cetak: <?= date('d-m-Y') ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Peminjam</th>
                <th>Ruangan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['laporan'] as $row) : ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td><?= $row['nama_penanggung_jawab']; ?></td>
                    <td><?= $row['nama_ruangan']; ?></td>
                    <td><?= date('d M Y H:i', strtotime($row['start_time'])); ?></td>
                    <td><?= date('d M Y H:i', strtotime($row['end_time'])); ?></td>
                    <td style="text-align: center;">
                        <?= translateStatus($row['status']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="no-print" style="margin-top: 20px;">
        <button onclick="window.location.href='/admin'">Kembali</button>
    </div>

</body>
</html>