/**
 * corp-page.js
 * Putanja: /wp-content/themes/foto-kabina/js/corp-page.js
 *
 * DINAMIČKI PRISTUP:
 * Chip je <a> element. Tekst linka = naziv brenda.
 * Href linka = URL logo slike (paste iz Media Library).
 * Ako href nije slika (prazan ili "#"), tooltip prikazuje naziv kao fallback.
 *
 * Primer u Gutenbergu:
 *   <a class="sk-trust-logo" href="https://www.selfikabina.com/wp-content/uploads/2025/01/bosch.png">Bosch</a>
 *   <a class="sk-trust-logo" href="#">AIK Banka</a>  ← nema logo, prikazuje naziv
 */

document.addEventListener('DOMContentLoaded', function () {

  // --- Kreiraj tooltip element ---
  const tooltip = document.createElement('div');
  tooltip.id = 'sk-brand-tooltip';
  tooltip.innerHTML = '<img id="sk-tooltip-img" src="" alt=""/><span id="sk-tooltip-name"></span>';
  document.body.appendChild(tooltip);

  // --- Stilovi ---
  const style = document.createElement('style');
  style.textContent = `
    #sk-brand-tooltip {
      position: fixed;
      z-index: 9999;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 2px 8px rgba(0,0,0,0.10);
      padding: 16px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      pointer-events: none;
      opacity: 0;
      transform: translateY(8px) scale(0.96);
      transition: opacity 0.18s ease, transform 0.18s ease;
      min-width: 120px;
      max-width: 200px;
      border: 1px solid rgba(0,0,0,0.06);
    }

    #sk-brand-tooltip.visible {
      opacity: 1;
      transform: translateY(0) scale(1);
    }

    #sk-tooltip-img {
      max-width: 240px;
      max-height: 110px;
      width: auto;
      height: auto;
      object-fit: contain;
      display: block;
    }

    #sk-tooltip-img.hidden { display: none; }

    #sk-tooltip-name {
      font-size: 13px;
      font-weight: 600;
      color: #0D1B2A;
      text-align: center;
      letter-spacing: 0.01em;
    }

    #sk-tooltip-name.hidden { display: none; }

    .sk-trust-logo,
    .sk-client-chip {
      cursor: pointer;
      text-decoration: none !important;
      transition: background 0.15s, color 0.15s, border-color 0.15s !important;
    }

    .sk-trust-logo:hover,
    .sk-client-chip:hover {
      background: rgba(255,255,255,0.15) !important;
      color: #ffffff !important;
      border-color: rgba(255,255,255,0.35) !important;
    }
  `;
  document.head.appendChild(style);

  const tooltipImg  = document.getElementById('sk-tooltip-img');
  const tooltipName = document.getElementById('sk-tooltip-name');

  let hideTimeout = null;

  // Provera da li href "izgleda" kao slika
  function isImageUrl(url) {
    if (!url) return false;
    const trimmed = url.trim();
    if (trimmed === '' || trimmed === '#') return false;
    return /\.(png|jpe?g|svg|webp|gif)(\?.*)?$/i.test(trimmed);
  }

  function showTooltip(chip) {
    clearTimeout(hideTimeout);

    const href      = chip.getAttribute('href');
    const brandName = chip.textContent.trim();

    if (isImageUrl(href)) {
      tooltipImg.src = href;
      tooltipImg.alt = brandName + ' logo';
      tooltipImg.classList.remove('hidden');
      tooltipName.classList.add('hidden');
    } else {
      tooltipImg.classList.add('hidden');
      tooltipName.textContent = brandName;
      tooltipName.classList.remove('hidden');
    }

    positionTooltip(chip);
    tooltip.classList.add('visible');
  }

  function positionTooltip(chip) {
    tooltip.style.display = 'flex';

    const chipRect = chip.getBoundingClientRect();
    const tipW     = tooltip.offsetWidth  || 320;
    const tipH     = tooltip.offsetHeight || 150;
    const margin   = 10;
    const vpW      = window.innerWidth;
    const vpH      = window.innerHeight;

    let top  = chipRect.top - tipH - margin;
    let left = chipRect.left + chipRect.width / 2 - tipW / 2;

    if (top < margin) {
      top = chipRect.bottom + margin;
    }

    left = Math.max(margin, Math.min(left, vpW - tipW - margin));
    top  = Math.max(margin, Math.min(top, vpH - tipH - margin));

    tooltip.style.left = left + 'px';
    tooltip.style.top  = top  + 'px';
  }

  function hideTooltip() {
    hideTimeout = setTimeout(function () {
      tooltip.classList.remove('visible');
    }, 120);
  }

  // --- Bind eventova ---
  function bindChips() {
    const chips = document.querySelectorAll('.sk-trust-logo, .sk-client-chip');

    chips.forEach(function (chip) {

      chip.addEventListener('mouseenter', function () {
        showTooltip(chip);
      });

      chip.addEventListener('mouseleave', function () {
        hideTooltip();
      });

      chip.addEventListener('click', function (e) {
        e.preventDefault();
      });

      chip.addEventListener('touchstart', function (e) {
        e.preventDefault();
        showTooltip(chip);
      }, { passive: false });
    });

    tooltip.addEventListener('mouseenter', function () {
      clearTimeout(hideTimeout);
    });

    tooltip.addEventListener('mouseleave', function () {
      hideTooltip();
    });
  }

  bindChips();

});