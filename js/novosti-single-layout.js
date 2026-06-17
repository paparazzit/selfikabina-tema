document.addEventListener('DOMContentLoaded', function () {
    var section = document.querySelector('section.novosti-single');
    var article = section ? section.querySelector('article') : null;
    var textContent = article ? article.querySelector('.text-content') : null;
    var header = document.querySelector('.novosti-single-header.has-featured-bg');

    if (!article || !textContent) {
        return;
    }

    article.classList.add('novosti-single-layout');

    if (!header) {
        article.classList.add('no-featured-layout');
        return;
    }

    var headerBg = window.getComputedStyle(header).backgroundImage;
    var imageUrlMatch = headerBg && headerBg.match(/url\(["']?(.*?)["']?\)/);

    if (!imageUrlMatch || !imageUrlMatch[1]) {
        article.classList.add('no-featured-layout');
        return;
    }

    var aside = document.createElement('aside');
    aside.className = 'novosti-single-media';
    aside.setAttribute('aria-label', 'Slika novosti');

    var imageWrap = document.createElement('div');
    imageWrap.className = 'novosti-single-featured img-wrapper';

    var image = document.createElement('img');
    image.className = 'novosti-single-img';
    image.src = imageUrlMatch[1];
    image.alt = '';
    image.loading = 'lazy';

    imageWrap.appendChild(image);
    aside.appendChild(imageWrap);
    article.insertBefore(aside, textContent);
    article.classList.add('has-featured-layout');
});
