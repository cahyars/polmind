// Filtering dengan efek transisi
const gkuFilterButtons = document.querySelectorAll('.gku-filter-btn');
const gkuGalleryItems = document.querySelectorAll('.gku-item');

gkuFilterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelector('.gku-filter-btn.gku-active').classList.remove('gku-active');
        btn.classList.add('gku-active');

        const selectedCategory = btn.getAttribute('data-gku-cat');

        gkuGalleryItems.forEach(item => {
            const itemCategory = item.getAttribute('data-gku-cat');

            if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                item.classList.remove('gku-hide');
            } else {
                item.classList.add('gku-hide');
            }
        });
    });
});


// Modal
function gkuOpenModal(imgElement) {
    const modal = document.getElementById('gku-modal');
    const modalImg = document.getElementById('gku-modal-img');
    const caption = document.getElementById('gku-modal-caption');

    modal.style.display = 'flex';
    modalImg.src = imgElement.src;
    caption.innerText = imgElement.alt;
}

function gkuCloseModal() {
    document.getElementById('gku-modal').style.display = 'none';
}
