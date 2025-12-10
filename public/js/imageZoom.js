// Image Zoom and Pan Functionality
// Manages zoom in/out, drag, and touch gestures for image viewing

document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const imageWrapper = document.getElementById('imageWrapper');
    const zoomableImage = document.getElementById('zoomableImage');
    const zoomInBtn = document.getElementById('zoomInBtn');
    const zoomOutBtn = document.getElementById('zoomOutBtn');
    const resetBtn = document.getElementById('resetBtn');
    const zoomPercent = document.getElementById('zoomPercent');
    const dragHint = document.getElementById('dragHint');

    // Return early if elements not found
    if (!imageWrapper || !zoomableImage) return;

    // === STATE MANAGEMENT ===
    let scale = 1;
    const minScale = 1;      // 100% (fit to container)
    const maxScale = 4;      // 400%
    const scaleStep = 0.25;  // 25% per action

    let isDragging = false;
    let startX = 0, startY = 0;
    let translateX = 0, translateY = 0;
    let currentTranslateX = 0, currentTranslateY = 0;

    // === UTILITY FUNCTIONS ===
    
    /**
     * Update image transform and UI
     */
    function updateTransform() {
        zoomableImage.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
        
        if (zoomPercent) {
            zoomPercent.textContent = Math.round(scale * 100) + '%';
        }
        
        // Show drag hint if zoomed
        if (dragHint && scale > 1) {
            dragHint.style.opacity = '1';
            setTimeout(() => {
                dragHint.style.opacity = '0';
            }, 2000);
        }
        
        // Update cursor
        zoomableImage.style.cursor = scale > 1 ? 'grab' : 'default';
    }

    /**
     * Constrain pan within boundaries
     */
    function constrainPan() {
        const wrapperRect = imageWrapper.getBoundingClientRect();
        const imageRect = zoomableImage.getBoundingClientRect();
        
        const maxX = Math.max(0, (imageRect.width - wrapperRect.width) / 2);
        const maxY = Math.max(0, (imageRect.height - wrapperRect.height) / 2);
        
        translateX = Math.max(-maxX, Math.min(maxX, translateX));
        translateY = Math.max(-maxY, Math.min(maxY, translateY));
    }

    // === ZOOM FUNCTIONS ===

    function zoomIn() {
        if (scale < maxScale) {
            const oldScale = scale;
            scale = Math.min(scale + scaleStep, maxScale);
            
            // Adjust translation for center-based zoom
            const scaleRatio = scale / oldScale;
            translateX *= scaleRatio;
            translateY *= scaleRatio;
            currentTranslateX = translateX;
            currentTranslateY = translateY;
            
            updateTransform();
        }
    }

    function zoomOut() {
        if (scale > minScale) {
            const oldScale = scale;
            scale = Math.max(scale - scaleStep, minScale);
            
            // Reset translation on 100%
            if (scale === minScale) {
                translateX = 0;
                translateY = 0;
                currentTranslateX = 0;
                currentTranslateY = 0;
            } else {
                // Adjust translation for center-based zoom
                const scaleRatio = scale / oldScale;
                translateX *= scaleRatio;
                translateY *= scaleRatio;
                currentTranslateX = translateX;
                currentTranslateY = translateY;
            }
            
            updateTransform();
        }
    }

    function resetZoom() {
        scale = 1;
        translateX = 0;
        translateY = 0;
        currentTranslateX = 0;
        currentTranslateY = 0;
        updateTransform();
    }

    // === BUTTON CLICK HANDLERS ===
    if (zoomInBtn) zoomInBtn.addEventListener('click', zoomIn);
    if (zoomOutBtn) zoomOutBtn.addEventListener('click', zoomOut);
    if (resetBtn) resetBtn.addEventListener('click', resetZoom);

    // === MOUSE WHEEL ZOOM ===
    imageWrapper.addEventListener('wheel', function(e) {
        e.preventDefault();
        
        if (e.deltaY < 0) {
            zoomIn();
        } else {
            zoomOut();
        }
    }, { passive: false });

    // === DOUBLE CLICK TO RESET ===
    zoomableImage.addEventListener('dblclick', resetZoom);

    // === MOUSE DRAG FUNCTIONALITY ===
    zoomableImage.addEventListener('mousedown', function(e) {
        if (scale > 1) {
            isDragging = true;
            startX = e.clientX - currentTranslateX;
            startY = e.clientY - currentTranslateY;
            zoomableImage.style.cursor = 'grabbing';
            e.preventDefault();
        }
    });

    document.addEventListener('mousemove', function(e) {
        if (isDragging) {
            translateX = e.clientX - startX;
            translateY = e.clientY - startY;
            constrainPan();
            updateTransform();
        }
    });

    document.addEventListener('mouseup', function() {
        if (isDragging) {
            isDragging = false;
            currentTranslateX = translateX;
            currentTranslateY = translateY;
            zoomableImage.style.cursor = scale > 1 ? 'grab' : 'default';
        }
    });

    // === TOUCH DRAG FUNCTIONALITY (MOBILE) ===
    zoomableImage.addEventListener('touchstart', function(e) {
        if (scale > 1 && e.touches.length === 1) {
            isDragging = true;
            startX = e.touches[0].clientX - currentTranslateX;
            startY = e.touches[0].clientY - currentTranslateY;
            e.preventDefault();
        }
    });

    imageWrapper.addEventListener('touchmove', function(e) {
        if (isDragging && e.touches.length === 1) {
            e.preventDefault();
            translateX = e.touches[0].clientX - startX;
            translateY = e.touches[0].clientY - startY;
            constrainPan();
            updateTransform();
        }
    }, { passive: false });

    imageWrapper.addEventListener('touchend', function() {
        if (isDragging) {
            isDragging = false;
            currentTranslateX = translateX;
            currentTranslateY = translateY;
        }
    });

    // === KEYBOARD SHORTCUTS ===
    document.addEventListener('keydown', function(e) {
        if (imageWrapper.contains(document.activeElement) || e.target === document.body) {
            switch(e.key) {
                case '+':
                case '=':
                    e.preventDefault();
                    zoomIn();
                    break;
                case '-':
                case '_':
                    e.preventDefault();
                    zoomOut();
                    break;
                case '0':
                    e.preventDefault();
                    resetZoom();
                    break;
            }
        }
    });

    // === PINCH TO ZOOM (MOBILE) ===
    let initialDistance = 0;
    let initialScale = 1;

    imageWrapper.addEventListener('touchstart', function(e) {
        if (e.touches.length === 2) {
            e.preventDefault();
            initialDistance = Math.hypot(
                e.touches[0].clientX - e.touches[1].clientX,
                e.touches[0].clientY - e.touches[1].clientY
            );
            initialScale = scale;
        }
    });

    imageWrapper.addEventListener('touchmove', function(e) {
        if (e.touches.length === 2) {
            e.preventDefault();
            
            const currentDistance = Math.hypot(
                e.touches[0].clientX - e.touches[1].clientX,
                e.touches[0].clientY - e.touches[1].clientY
            );
            
            const newScale = initialScale * (currentDistance / initialDistance);
            scale = Math.max(minScale, Math.min(maxScale, newScale));
            
            // Reset translation if back to 100%
            if (scale === minScale) {
                translateX = 0;
                translateY = 0;
                currentTranslateX = 0;
                currentTranslateY = 0;
            }
            
            updateTransform();
        }
    }, { passive: false });

    imageWrapper.addEventListener('touchend', function(e) {
        if (e.touches.length < 2) {
            initialDistance = 0;
            currentTranslateX = translateX;
            currentTranslateY = translateY;
        }
    });
});
