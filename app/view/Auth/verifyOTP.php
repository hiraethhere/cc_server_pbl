
<?php Flasher::Flash() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/LOGO PNJ FIX 1.png">
    <title>Lupa Password</title>
    <link href="/css/output.css" rel="stylesheet">

</head>
<body class="font-sf-pro" >
    
    
    <div class="bg-cover bg-center min-h-screen flex flex-col items-center justify-center"
         style="background-image: url('/img/Background 1.png'); 
             background-color: rgba(139, 92, 113, 0.7); background-blend-mode: multiply;">

       

        <!-- **************************************************
        INI UNTUK BAGIAN KEDUA YANG UNTUK MENGISI KODE VERIFIKASI
        ******************************************************* -->
        <div class="bg-[#F3F5FA] rounded-2xl shadow-2xl p-8 w-full max-w-md md:h-full sm:h-full mb-5 mt-10">
            <!-- Logo & Header -->
            <div class="text-center mb-6">
                <div class="flex items-start justify-start mb-1">
                    <h1 class="text-4xl font-bold text-gray-800">Verifikasi</h1>
                </div>
                <p class="text-sm text-left text-gray-600">Masukkan kode yang sudah dikirim di email yang kamu berikan</p>
            </div>

            <!-- Form -->
            <form id="" method="POST" action="">
                <div class="flex justify-between gap-3 mb-6">
                <input type="text" maxlength="1" name = "otp-1" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
                <input type="text" maxlength="1" name = "otp-2" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
                <input type="text" maxlength="1" name = "otp-3" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
                <input type="text" maxlength="1" name = "otp-4" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
                <input type="text" maxlength="1" name = "otp-5" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
                <input type="text" maxlength="1" name = "otp-6" class="otp-input w-1/5 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-xl focus:ring-blue-500 focus:border-transparent transition duration-150" inputmode="numeric">
            </div>

            <div class="text-center text-red-600 font-semibold mb-6" id="timer">
                09:55
            </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#38C55C] text-white py-2 text-sm rounded-lg font-semibold hover:bg-green-600 transition duration-200 hover:cursor-pointer mb-2">
                    Verifikasi
                </button>
            </form>

            <div class="flex flex-col items-start justify-between text-xs gap-4 mt-4">
                <div>
                    <span class="text-gray-600">Tidak mendapatkan kode? </span>
                    <a href="" class="text-blue-600 hover:underline font-medium">Kirim ulang kode</a>
                </div>

                <div>
                    <span class="text-gray-600">Email salah? </span>
                    <a href="" class="text-blue-600 hover:underline font-medium">Kirim ulang Email</a>
                </div>
            </div>
        </div>

        <!-- **************************************************
        POP UP SUCCESS MODAL
        ******************************************************* -->
        <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-2xl p-8 w-full max-w-sm mx-4 text-center border border-[#8E97A6]">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-green-500 text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Ganti Password Berhasil</h3>
                <p class="text-sm text-gray-600 mb-6">Kamu berhasil mengganti password!</p>
                <button type="button" onclick="window.location.href='/auth/formLogin'"
                        class="w-full px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer text-sm">
                    Kembali ke halaman Login
                </button>
            </div>
        </div>
    </div>