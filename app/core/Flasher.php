<?php



class Flasher {

    // --- FUNGSI LAMA (FLASH MESSAGE) ---
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
            
            $color = match($flash['tipe']) {
                'success' => 'bg-green-500 text-white',
                'danger'  => 'bg-red-500 text-white',
                'warning' => 'bg-yellow-400 text-gray-900',
                'info'    => 'bg-blue-500 text-white',
                default   => 'bg-gray-500 text-white'
            };
    
            echo '
            <div class="fixed top-0 left-0 right-0 flex justify-center z-99999 mt-6 pointer-events-none">
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
                        flash.style.opacity = "0"; 
                        setTimeout(() => flash.parentElement.remove(), 500); 
                    }
                }, 3000);
            </script>
            ';
            unset($_SESSION['flash']);
        }
    }
    // cara pakai: wajib memasukkan titel dan message apa yang mau digunakan
    public static function setModalInfo($title, $message, $type = 'success', $redirectUrl = null) {
        $_SESSION['modal_info'] = [
            'title'   => $title,
            'message' => $message,
            'type'    => $type,
            'url'     => $redirectUrl
        ];
    }

    public static function modalInfo() {
        if (isset($_SESSION['modal_info'])) {
            $data = $_SESSION['modal_info'];

            // Konfigurasi Tampilan Berdasarkan Tipe
            $config = match($data['type']) {
                'success' => [
                    'icon_src' => '/icon/check.svg',
                    'btn_bg' => 'bg-green-500 hover:bg-green-600'
                ],
                'error' => [
                    'icon_src' => '/icon/cross-circle.svg',
                    'btn_bg' => 'bg-red-500 hover:bg-red-600'
                ],
                default => [ // Info
                    'icon_src' => 'no-image',
                    'btn_bg' => 'bg-blue-500 hover:bg-blue-600'
                ]
            };

            // Logika tombol OK (Redirect atau sekedar tutup modal)
            $onclickAction = $data['url'] 
                ? "window.location.href = '{$data['url']}';" 
                : "document.getElementById('info-modal-overlay').remove();";

            echo '
            <div id="info-modal-overlay" class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/50 backdrop-blur-sm p-4 fade-in">
                
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 text-center relative transform transition-all scale-100">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-6">
                        <img src="' . $config['icon_src'] . '" class="w-full h-full object-contain filter z-[-100]">
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900 mb-2 tracking-tight">
                        ' . htmlspecialchars($data['title']) . '
                    </h2>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                        ' . htmlspecialchars($data['message']) . '
                    </p>
                    <button onclick="' . $onclickAction . '" 
                        class="w-5/6 py-2 rounded-xl text-white font-bold text-lg shadow-md transition-transform transform active:scale-95 ' . $config['btn_bg'] . ' hover:cursor-pointer">
                        OK
                    </button>

                </div>
            </div>
            ';

            unset($_SESSION['modal_info']);
        }
    }
}