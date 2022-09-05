window.addEventListener('scroll',scroll=()=>{
    let backToTop = document.querySelector('.back-to-top');
    const scroll = window.scrollY;
    if (scroll > 100) {
        backToTop.style.transition = '1s ease-in-out';
        backToTop.style.display = 'block';
    } else {
        backToTop.style.transition = '1s ease-in-out';
        backToTop.style.display = 'none';
    }
})