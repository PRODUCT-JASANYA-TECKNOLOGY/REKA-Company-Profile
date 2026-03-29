/* REKA Shared JS */

// ===== NAVBAR =====
(function () {
  const navbar = document.getElementById('navbar');
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobile-menu');

  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 10);
    });
  }

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  }

  // Active nav link
  const path = window.location.pathname.replace(/\/$/, '') || '/';
  const filename = path.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-link-item').forEach(a => {
    const href = a.getAttribute('href');
    if (!href) return;
    const hFilename = href.split('/').pop() || 'index.html';
    if (hFilename === filename || (filename === '' && hFilename === 'index.html')) {
      a.classList.add('active');
    }
  });
})();

// ===== FAQ ACCORDION =====
(function () {
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      // close all
      document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });
})();

// ===== CONTACT FORM =====
(function () {
  const form = document.getElementById('contact-form');
  const successState = document.getElementById('form-success');
  if (!form) return;
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const nama = form.querySelector('[name="nama"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    if (!nama || !email) {
      showToast('Mohon isi nama dan email Anda.', 'error');
      return;
    }
    const btn = form.querySelector('[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spin"></span> Mengirim...';
    await new Promise(r => setTimeout(r, 1200));
    form.style.display = 'none';
    if (successState) successState.style.display = 'flex';
    showToast('Pesan terkirim! Kami akan menghubungi Anda dalam 24 jam.', 'success');
  });

  const resetBtn = document.getElementById('form-reset');
  if (resetBtn) {
    resetBtn.addEventListener('click', () => {
      if (successState) successState.style.display = 'none';
      form.style.display = 'block';
      form.reset();
      const btn = form.querySelector('[type="submit"]');
      btn.disabled = false;
      btn.innerHTML = 'Kirim Konsultasi <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>';
    });
  }
})();

// ===== TOAST =====
function showToast(msg, type = 'success') {
  const toast = document.createElement('div');
  toast.style.cssText = `
    position:fixed;bottom:1.5rem;right:1.5rem;z-index:9999;
    padding:.875rem 1.25rem;border-radius:10px;font-size:.875rem;font-weight:500;
    font-family:'Inter',sans-serif;max-width:320px;
    background:${type === 'success' ? '#1a1a1a' : '#dc2626'};color:#fff;
    box-shadow:0 8px 30px rgba(0,0,0,.2);
    animation:slideUp .3s ease;
  `;
  toast.textContent = msg;
  document.body.appendChild(toast);
  const style = document.createElement('style');
  style.textContent = '@keyframes slideUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}';
  document.head.appendChild(style);
  setTimeout(() => toast.remove(), 3500);
}

// ===== GALLERY =====
(function () {
  const main = document.querySelector('.gallery-main img');
  const thumbs = document.querySelectorAll('.gallery-thumb');
  const dots = document.querySelectorAll('.gallery-dot');
  if (!main || !thumbs.length) return;
  const srcs = Array.from(thumbs).map(t => t.querySelector('img').src);
  let current = 0;
  function go(idx) {
    current = (idx + srcs.length) % srcs.length;
    main.src = srcs[current];
    thumbs.forEach((t, i) => t.classList.toggle('active', i === current));
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  }
  thumbs.forEach((t, i) => t.addEventListener('click', () => go(i)));
  dots.forEach((d, i) => d.addEventListener('click', () => go(i)));
  document.querySelector('.gallery-btn.prev')?.addEventListener('click', () => go(current - 1));
  document.querySelector('.gallery-btn.next')?.addEventListener('click', () => go(current + 1));
})();

// ===== LUCIDE ICONS =====
if (typeof lucide !== 'undefined') lucide.createIcons();
