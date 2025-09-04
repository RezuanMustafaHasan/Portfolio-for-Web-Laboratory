// Basic UI interactions for the site

// Mobile menu toggle (if present)
document.addEventListener('click', (e) => {
  const toggle = e.target.closest('.nav-toggle');
  if (toggle) {
    const menu = document.querySelector('.menu');
    if (menu) menu.classList.toggle('open');
  }
});

// Blog "Read more" toggling
document.addEventListener('click', (e) => {
  const btn = e.target.closest('.read-toggle');
  if (!btn) return;
  e.preventDefault();

  const card = btn.closest('.blog-card');
  if (!card) return;

  const excerpt = card.querySelector('.excerpt');
  const full = card.querySelector('.full');
  const expanded = card.getAttribute('data-expanded') === 'true';

  if (!excerpt || !full) return;

  if (expanded) {
    // Collapse
    full.hidden = true;
    excerpt.hidden = false;
    card.setAttribute('data-expanded', 'false');
    btn.setAttribute('aria-expanded', 'false');
    btn.textContent = 'Read more';
  } else {
    // Expand
    excerpt.hidden = true;
    full.hidden = false;
    card.setAttribute('data-expanded', 'true');
    btn.setAttribute('aria-expanded', 'true');
    btn.textContent = 'Read less';
  }
});

// Footer year
document.addEventListener('DOMContentLoaded', () => {
  const y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();
});
