// Mobile drawer toggle
const menuBtn = document.querySelector('.header__mobile-btn button');
const drawer  = document.querySelector('.mobile-drawer');

if (menuBtn && drawer) {
  menuBtn.addEventListener('click', () => {
    const open = menuBtn.getAttribute('aria-expanded') === 'true';
    menuBtn.setAttribute('aria-expanded', String(!open));
    drawer.classList.toggle('translate-x-full'); // slide in/out

    if (!open) {
      document.body.classList.add('no-scroll');
    } else {
      document.body.classList.remove('no-scroll');
    }
  });
}
