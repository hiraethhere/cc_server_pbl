<div id="reusableModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="fixed inset-0 bg-opacity-50 backdrop-filter backdrop-blur-xs" onclick="Modal.close()"></div>
    
    <div id="modalContainer" class="bg-white1 rounded-2xl p-8 w-full mx-4 relative z-10 border border-dark-overlay4">
        <div id="modalIcon" class="hidden">
            <div id="modalIconContent" class="mx-auto flex items-center justify-center"></div>
        </div>
        
        <h3 id="modalTitle" class="text-xl font-bold text-dark-overlay mb-2 text-center"></h3>
        
        <div id="modalContent" class="text-sm text-dark-overlay7 mb-6 text-center"></div>
        
        <div id="modalButtons" class="flex justify-center space-x-4"></div>
    </div>
</div>