<div id="reusableModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <!-- Overlay gelap -->
    <div class="fixed inset-0 bg-opacity-50 backdrop-filter backdrop-blur-xs" onclick="Modal.close()"></div>
    
    <!-- Container Modal -->
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm mx-4 relative z-10 border border-[#8E97A6]">
        <!-- Icon (opsional) -->
        <div id="modalIcon" class="mb-4 hidden">
            <img id="modalIconImg" src="" alt="Icon" class="w-12 h-12 mx-auto">
        </div>
        
        <!-- Title -->
        <h3 id="modalTitle" class="text-xl font-bold text-gray-800 mb-2 text-center"></h3>
        
        <!-- Content -->
        <div id="modalContent" class="text-sm text-gray-600 mb-6 text-center"></div>
        
        <!-- Buttons -->
        <div id="modalButtons" class="flex justify-center space-x-4">
            <!-- Buttons akan di-generate oleh JavaScript -->
        </div>
    </div>
</div>