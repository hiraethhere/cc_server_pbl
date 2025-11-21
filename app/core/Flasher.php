<?php
class Flasher {

    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            
            // Tentukan warna
            $color = match($flash['tipe']) {
                'success' => 'bg-green-500 text-white',
                'danger'  => 'bg-red-500 text-white',
                'warning' => 'bg-yellow-400 text-gray-900',
                'info'    => 'bg-blue-500 text-white',
                default   => 'bg-gray-500 text-white'
            };
    
            echo '
            <div class="fixed top-0 left-0 right-0 flex justify-center z-50 mt-6 pointer-events-none">
                
                <div id="flash-message" 
                    class="pointer-events-auto px-6 py-3 rounded-lg shadow-lg ' . $color . ' flex items-center gap-3 transition-all duration-300 transform hover:scale-105">
                    
                    <span class="text-xl">⚡</span>
                    <span class="font-medium">' . htmlspecialchars($flash['pesan']) . ' <strong>' . htmlspecialchars($flash['aksi']) . '</strong></span>
                    <button class="ml-2 opacity-70 hover:opacity-100" onclick="document.getElementById(\'flash-message\').remove()">✕</button>
                </div>

            </div>

            <script>
                setTimeout(function(){
                    var flash = document.getElementById("flash-message");
                    if(flash){
                        flash.style.opacity = "0"; // Efek fade out
                        setTimeout(() => flash.parentElement.remove(), 500); // Hapus elemen wadahnya
                    }
                }, 3000);
            </script>
            ';
            
            unset($_SESSION['flash']);
        }
    }
}