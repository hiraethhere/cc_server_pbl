
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="/img/LOGO PNJ FIX 1.png">
    <title>RuanginPNJ - <?= $data['judul']; ?></title>
    <link href="/css/output.css" rel="stylesheet">
    <link href="js/script.js" rel="script">
</head>
<body class="bg-gray-50 font-sf-pro flex min-h-screen">

    <?php include __DIR__ . '/../template/iconComponent.php'; ?>
    <!-- SIDEBAR -->
    <aside class="w-56 bg-[#FBFCFF] shadow-lg flex flex-col z-20">
        
        <!-- Logo -->
        <div class="px-6 py-5 border-b border-gray-200">
        <h1 class="text-xl font-bold text-gray-800">ruanginPNJ</h1>
        </div>

        <!-- Menu Utama -->
        <nav class="flex-1 px-4 py-6 space-y-1 pr-0">
        
            <!-- Dashboard (AKTIF) -->
            <a href="/Admin/index"
                class="flex items-center px-4 py-2 mb-4
                    <?= ($data['navbar'] === 'dashboard')
                ? 'text-[rgba(30,104,251,0.80)] border-r-4 border-[#1E68FB] font-medium'
                : 'text-gray-700 hover:bg-gray-100 rounded-lg' ?>
          transition text-sm">
                <svg
                    width="24"
                    class="mr-2" 
                    height="24" 
                    viewBox="0 0 24 24">
                    <path fill="currentcolor" 
                        d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z"/>
                </svg>
                Dashboard
            </a>

            <!-- Data Anggota -->
            <a href="/Admin/Anggota"
                class="flex items-center px-4 py-2 mb-4
                    <?= ($data['navbar'] === 'Anggota')
                ? 'text-[rgba(30,104,251,0.80)] border-r-4 border-[#1E68FB] font-medium'
                : 'text-gray-700 hover:bg-gray-100 rounded-lg' ?>
          transition text-sm">
                <svg 
                    width="24" 
                    height="24"
                    class="mr-2"  
                    viewBox="0 0 24 24">
                    <path fill="currentcolor" 
                    d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7"/>
                </svg>
                Data Anggota
            </a>

            <!-- Data Peminjaman -->
            <a href="/Admin/Peminjaman"
                class="flex items-center px-4 py-2 mb-4
                    <?= ($data['navbar'] === 'Peminjaman')
                ? 'text-[rgba(30,104,251,0.80)] border-r-4 border-[#1E68FB] font-medium'
                : 'text-gray-700 hover:bg-gray-100 rounded-lg' ?>
          transition text-sm">
                <svg
                width="24" 
                height="24" 
                class="mr-3"
                viewBox="0 0 24 24">
                <path fill="currentcolor" 
                fill-rule="evenodd" 
                d="M2 1h14.5L22 6.5V23H2zm3 2v9l3-3l3 3V3z" 
                clip-rule="evenodd"/></svg>
                Data Peminjaman
            </a>

            <!-- Data Ruangan -->
           <a href="/Admin/Ruangan"
                class="flex items-center px-4 py-2 mb-4
                    <?= ($data['navbar'] === 'Ruangan')
                ? 'text-[rgba(30,104,251,0.80)] border-r-4 border-[#1E68FB] font-medium'
                : 'text-gray-700 hover:bg-gray-100 rounded-lg' ?>
                transition text-sm">
                <svg 
                width="24" 
                height="24" 
                class="mr-3"
                viewBox="0 0 24 24">
                <path fill="currentcolor" 
                d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1m14.242-.97l-8-2A1 1 0 0 0 10 3v18a.998.998 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97M15 12.188a1.001 1.001 0 0 1-2 0v-.377a1 1 0 1 1 2 .001z"/></svg>
                Data Ruangan    
            </a>

            <!-- Akun -->
            <a href="/Admin/Akun"
                class="flex items-center px-4 py-2 mb-4
                    <?= ($data['navbar'] === 'Akun')
                    ? 'text-[rgba(30,104,251,0.80)] border-r-4 border-[#1E68FB] font-medium'
                : 'text-gray-700 hover:bg-gray-100 rounded-lg' ?>
                    transition text-sm">
                <svg
                    width="24" 
                    height="24" 
                    class="mr-3"
                    viewBox="0 0 24 24">
                    <path 
                    fill="currentcolor" 
                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                </svg>
                Akun
            </a>

        </nav>

        <!-- Logout -->
        <div class="px-4 py-4 border-t border-gray-200">
            <a href="#" onclick="konfirmasiLogout()" class="flex items-center px-4 py-2 mb- text-gray-600 hover:bg-gray-100 rounded-lg transition text-xs font-medium">
                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <?php include __DIR__ . '/../template/modal.php'; ?>
    <script src="/js/modal.js"></script>
    <script>
    function konfirmasiLogout() {
        Modal.confirm(
            'Logout',
            'Apakah anda yakin ingin logout?',
            function() {
                window.location.href = '/auth/handleLogout';
            },
            {
                icon: '/icon/logoutDashboard.svg',
                confirmText: 'Logout',
                confirmClass: 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition',
                cancelText: 'Batalkan'
            }
        );
    }
    </script>