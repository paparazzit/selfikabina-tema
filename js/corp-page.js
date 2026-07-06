/**
 * corp-page.js
 * Tooltip za brand logoe na corporate / korporativnoj stranici.
 *
 * Desktop:
 * - hover prikazuje logo / naziv
 * - mouseleave sakriva tooltip
 *
 * Mobile / touch:
 * - tap na chip prikazuje tooltip
 * - ponovni tap na isti chip zatvara tooltip
 * - tap van tooltipa/chipa, scroll, resize ili Escape zatvara tooltip
 */

document.addEventListener('DOMContentLoaded', function () {
  const chips = Array.from(document.querySelectorAll('.sk-trust-logo, .sk-client-chip'));

  if (!chips.length) return;

  const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  let tooltip = document.getElementById('sk-brand-tooltip');

  if (!tooltip) {
    tooltip = document.createElement('div');
    tooltip.id = 'sk-brand-tooltip';
    tooltip.innerHTML = '<img id="sk-tooltip-img" src="" alt=""/><span id="sk-tooltip-name"></span>';
    document.body.appendChild(tooltip);
  }

  const tooltipImg = document.getElementById('sk-tooltip-img');
  const tooltipName = document.getElementById('sk-tooltip-name');

  let activeChip = null;
  let hideTimeout = null;

  function isImageUrl(url) {
    if (!url) return false;

    const trimmed = url.trim();

    if (trimmed === '' || trimmed === '#') return false;

    return /\.(png|jpe?g|svg|webp|gif)(\?.*)?$/i.test(trimmed);
  }

  function getBrandLogoUrl(chip) {
    return chip.getAttribute('data-logo') ||
      chip.getAttribute('data-img') ||
      chip.getAttribute('href') ||
      '';
  }

  function setTooltipContent(chip) {
    const logoUrl = getBrandLogoUrl(chip);
    const brandName = chip.textContent.trim();

    if (isImageUrl(logoUrl)) {
      tooltipImg.src = logoUrl;
      tooltipImg.alt = brandName ? brandName + ' logo' : 'Brand logo';
      tooltipImg.classList.remove('hidden');
      tooltipName.classList.add('hidden');
      tooltipName.textContent = '';
    } else {
      tooltipImg.removeAttribute('src');
      tooltipImg.classList.add('hidden');
      tooltipName.textContent = brandName;
      tooltipName.classList.remove('hidden');
    }
  }

  function positionTooltip(chip) {
    const chipRect = chip.getBoundingClientRect();
    const margin = 12;
    const vpW = window.innerWidth;
    const vpH = window.innerHeight;

    const tipW = tooltip.offsetWidth || 200;
    const tipH = tooltip.offsetHeight || 120;

    let top = chipRect.top - tipH - margin;
    let left = chipRect.left + chipRect.width / 2 - tipW / 2;

    if (top < margin) {
      top = chipRect.bottom + margin;
    }

    left = Math.max(margin, Math.min(left, vpW - tipW - margin));
    top = Math.max(margin, Math.min(top, vpH - tipH - margin));

    tooltip.style.left = left + 'px';
    tooltip.style.top = top + 'px';
  }

  function showTooltip(chip) {
    clearTimeout(hideTimeout);

    activeChip = chip;
    setTooltipContent(chip);
    tooltip.classList.add('visible');
    positionTooltip(chip);

    if (tooltipImg && !tooltipImg.classList.contains('hidden')) {
      tooltipImg.onload = function () {
        if (activeChip === chip) {
          positionTooltip(chip);
        }
      };
    }
  }

  function hideTooltip(delay) {
    clearTimeout(hideTimeout);

    hideTimeout = setTimeout(function () {
      tooltip.classList.remove('visible');
      activeChip = null;
    }, delay || 0);
  }

  function toggleTooltip(chip) {
    if (activeChip === chip && tooltip.classList.contains('visible')) {
      hideTooltip(0);
      return;
    }

    showTooltip(chip);
  }

  chips.forEach(function (chip) {
    if (supportsHover) {
      chip.addEventListener('mouseenter', function () {
        showTooltip(chip);
      });

      chip.addEventListener('mouseleave', function () {
        hideTooltip(120);
      });
    }

    chip.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      toggleTooltip(chip);
    });
  });

  document.addEventListener('click', function () {
    if (activeChip) {
      hideTooltip(0);
    }
  });

  window.addEventListener('scroll', function () {
    if (activeChip) {
      hideTooltip(0);
    }
  }, { passive: true });

  window.addEventListener('resize', function () {
    if (activeChip) {
      hideTooltip(0);
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && activeChip) {
      hideTooltip(0);
    }
  });
});
