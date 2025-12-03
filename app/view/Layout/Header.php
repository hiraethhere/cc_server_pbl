<?php
// Definisikan kelas CSS untuk link aktif dan tidak aktif (desktop)
$activeClass = 'bg-blue-overlay text-white1 px-6 py-1.5 rounded-full font-medium hover:bg-blue-700 transition duration-200';
$inactiveClass = 'text-dark-overlay hover:text-white1 px-6 py-1.5 rounded-full font-medium hover:bg-blue-overlay transition duration-200';

// Definisikan kelas CSS untuk link aktif dan tidak aktif (mobile)
$activeClassMobile = 'bg-blue-overlay text-white1 px-4 py-2 rounded-lg font-medium text-start hover:bg-blue-overlay transition duration-200';
$inactiveClassMobile = 'text-dark-overlay hover:text-white rounded-full font-medium px-4 py-2 hover:bg-blue-overlay rounded-lg text-start';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="icon" type="image/png" href="/img/LOGO PNJ FIX 1.png">
    <title>RuanginPNJ - <?= $judul; ?></title>
    <link href="/css/output.css" rel="stylesheet">
    <script src="/js/script.js"></script>
</head>
<body class="bg-background1 min-h-screen font-sf-pro">
    <?php include __DIR__ . '/../template/iconComponent.php'; ?>

    <nav class="bg-background1 shadow-sm sticky top-0 z-50">
        <div class="mx-auto md:px-6 lg:px-6 px-1 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-0.5 mx-5">
                    <img src="/img/LOGO PNJ FIX 1.png" alt="Logo" class="w-10 h-10 mr-3">
                    <h1 class="text-xl font-bold text-dark-overlay">ruanginPNJ</h1>
                </div>

                <div class="hidden md:flex items-center space-x-16 mx-10">
                    <a href="/Dashboard" class="<?php echo ($navbar == 'Dashboard') ? $activeClass : $inactiveClass; ?>">
                        Ruangan
                    </a>
                    <a href="/Booking" class="<?php echo ($navbar == 'bookingAnda') ? $activeClass : $inactiveClass; ?>">
                        Booking Anda
                    </a>
                    <a href="/History" class="<?php echo ($navbar == 'History') ? $activeClass : $inactiveClass; ?>">
                        Histori
                    </a>
                    <a href="/Dashboard/Panduan" class="<?php echo ($navbar == 'Panduan') ? $activeClass : $inactiveClass; ?>">
                        Panduan
                    </a>
                </div>

                <div class="hidden md:flex items-center flex-row gap-5">
                    <a href="/Akun" class="<?php echo ($navbar == 'Akun') ? $activeClass : $inactiveClass; ?> flex items-center gap-2 px-4 py-2 rounded-full transition">
                        <div class="transition-all <?php echo ($navbar == 'Akun') ? 'text-white1' : 'text-dark-overlay'; ?>">
                            <?= icon('user', 'w-5 h-5') ?>        
                        </div>
                        <span class="font-medium">Akun</span>
                    </a>

                    <!-- Tombol Logout -->
                    <a href="javascript:void(0)" onclick="konfirmasiLogout()" 
                        class="hidden md:flex items-center gap-2 text-red1 hover:bg-red-50 px-4 py-2 rounded-full transition font-medium hover:cursor-pointer">
                        <div>
                            <?= icon('logout', 'w-5 h-5') ?>   
                        </div>
                        <span>Logout</span>
                    </a>
                </div>

                <button id="hamburger-btn" class="p-2 rounded-md text-dark-overlay focus:outline-none focus:ring-2 focus:ring-blue-overlay8 md:hidden">
                    <div>
                        <?= icon('humbergerButton', 'w-6 h-6') ?>
                    </div>
                </button>
            </div>

            <!-- Mobile Menu Overlay -->
            <div id="mobile-menu-overlay" class="md:hidden fixed inset-0 bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

                <!-- Mobile Menu Drawer -->
                <div id="mobile-menu" class="md:hidden fixed top-16 right-0 bg-background1 shadow-xl z-50 hidden w-72 max-h-[calc(100vh-4rem)] overflow-y-auto rounded-l-2xl transform transition-transform duration-300">
                    <div class="flex flex-col space-y-2 p-4">
                        <a href="/Dashboard" class="<?php echo ($navbar == 'Dashboard') ? $activeClassMobile : $inactiveClassMobile; ?>">
                            Ruangan
                        </a>
                        <a href="/Booking" class="<?php echo ($navbar == 'bookingAnda') ? $activeClassMobile : $inactiveClassMobile; ?>">
                            Booking Anda
                        </a>
                        <a href="/History" class="<?php echo ($navbar == 'History') ? $activeClassMobile : $inactiveClassMobile; ?>">
                            Histori
                        </a>
                        <a href="/Dashboard/Panduan" class="<?php echo ($navbar == 'Panduan') ? $activeClassMobile : $inactiveClassMobile; ?>">
                            Panduan
                        </a>
                        
                        <!-- Divider -->
                        <div class="border-t border-dark-overlay5 my-2"></div>
                        
                        <!-- Akun (Mobile) -->
                        <a href="/Akun" class="<?php echo ($navbar == 'Akun') ? $activeClassMobile : $inactiveClassMobile; ?> flex items-center justify-start gap-2">
                            <img src="/icon/userDashboard.svg" alt="User" class="w-5 h-5 <?php echo ($navbar == 'Akun') ? 'brightness-0 invert' : ''; ?>">
                            Akun
                        </a>
                        
                        <!-- Logout (Mobile) -->
                        <button onclick="konfirmasiLogout()" 
                            class="flex items-center justify-start gap-2 text-red1 px-4 py-2 rounded-lg transition font-medium w-full">
                            <img src="/icon/logoutDashboard.svg" alt="Logout" class="w-5 h-5">
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php Flasher::Flash(); ?>
    <?php Flasher::modalInfo(); ?>


    <?php include __DIR__ . '/../template/modal.php'; ?>

    <script src="/js/modal.js"></script>
    <script src="/js/mobileHeader.js" defer></script>
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
                confirmClass: 'w-full px-6 py-2 bg-red1 text-white1 rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
                cancelText: 'Batalkan'
            }
        );
    }
    </script>

    <section>