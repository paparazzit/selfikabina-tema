// import { FormValidation } from "./formValidation.js";

let width = window.innerWidth;
let heigh = window.innerHeight;
let boxes = document.querySelectorAll(".box");

let body = document.querySelector("body");
window.addEventListener("resize", setup);
window.addEventListener("load", setup, false);
function navLinks() {
	let links = document.querySelectorAll(".links li");

	links.forEach((del, index) => {
		del.setAttribute("style", `--i:${index}`);
	});
}
navLinks();
// NAV
let navBurger = document.querySelector(".burger");
let dropDown = document.querySelector("nav .drop");
let close = document.querySelector("nav .close");
close.addEventListener("click", showNav);
navBurger.addEventListener("click", showNav);

function showNav() {
	dropDown.classList.toggle("active");
	if (dropDown.classList.contains("active")) {
		body.classList.add("noScroll");
	} else {
		body.classList.remove("noScroll");
	}
}


// NAV BAR HIDE ON SCROLL
class HideOnScrollNav {
  constructor(nav, options = {}) {
    if (!nav) throw new Error("Nav element is required");

    this.nav = nav;
    this.lastScrollY = window.scrollY;
    this.minScroll = options.minScroll || nav.offsetHeight;
    this.threshold = options.threshold || 5;

    this.handleScroll = this.handleScroll.bind(this);

    this.init();
  }

  init() {
    window.addEventListener("scroll", this.handleScroll, { passive: true });
  }

  handleScroll() {
    const currentY = window.scrollY;
    const delta = currentY - this.lastScrollY;

    // Ignore tiny scrolls (touchpad noise)
    if (Math.abs(delta) < this.threshold) return;

    // Always show near the top
    if (currentY <= this.minScroll) {
      this.show();
      this.lastScrollY = currentY;
      return;
    }

    if (delta > 0) {
      this.hide();
    } else {
      this.show();
    }

    this.lastScrollY = currentY;
  }

  hide() {
    this.nav.classList.add("nav-hidden");
  }

  show() {
    this.nav.classList.remove("nav-hidden");
  }

  destroy() {
    window.removeEventListener("scroll", this.handleScroll);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector("nav");

  new HideOnScrollNav(nav, {
    threshold: 30,      // scroll sensitivity
    minScroll: 100     // always visible near top
  });
});

//  END NAV BAR HIDE ON SCROLL

function setup() {
	heigh = window.innerHeight;
	width = window.innerWidth;
	boxSize();
	body.classList.add("loaded");
	console.log("loaded");
}

let links = dropDown.children;
for (let i = 0; i < links.length; i++) {
	let navLink = links[i];
	navLink.addEventListener("click", closeNav);
}
function closeNav() {
	if (width < 650) {
		dropDown.classList.remove("active");
		body.classList.remove("noScroll");
		console.log("MALI");
	}
}

function boxSize() {
	let boxSize = { width: width / 2, heigh: width / 2.3, flex: "0 0 50%" };
	let gridSize = {
		width: width,
		heigh: width / 2.3,
	};

	if (width > 1230) {
		boxSize = {
			width: width / 2,
			heigh: width / 2.3,
			flex: "0 0 50%",
		};
		gridSize = {
			width: width,
			height: width / 2.3,
		};
		console.log("PRVA");
	} else if (width < 1230 && width > 768) {
		gridSize = {
			width: width,
			height: width * 1.6,
		};
		console.log("druga");
	} else if (width < 768) {
		boxSize = {
			width: "unset",
			height: "unset",
			flex: "0 0 100%",
		};
		console.log("treca");
	}

	boxes.forEach((box) => {
		box.style.width = `${boxSize.width}px`;
		box.style.height = `${boxSize.heigh}px`;
		box.style.flex = boxSize.flex;
	});
}

// --------------
// ---TRECINA----
//----------------

let slide_links = document.querySelectorAll("a.opt-link");
let emp_box = document.querySelector("#emp_box");
let opts = document.querySelectorAll(".opt");
let thr_imgWrapper = document.querySelector("#optImg");
if (opts.length > 0) {
	opts[0].classList.add("active");
	slide_links[0].classList.add("active");
	thr_imgWrapper.children[0].classList.add("active");
}

slide_links.forEach((link) => {
	let currentLink = link.getAttribute("data-link");
	link.addEventListener("click", (e) => {
		e.preventDefault();
		removeActiveLink();
		link.classList.add("active");
		opts.forEach((opt) => {
			opt.classList.remove("active");
		});
		let currentOpt = document.querySelectorAll(`[data-link="${currentLink}"]`);
		currentOpt.forEach((opt) => {
			opt.classList.add("active");
		});
		emp_box.className = `top ${currentLink}`;
		console.log(currentOpt);
		thr_imgWrapper.setAttribute("data-link", `${currentLink}`);
	});
});
function removeActiveLink() {
	slide_links.forEach((link) => {
		link.classList.remove("active");
	});
}

// PAKETI

let paketi = document.querySelectorAll("#paketi article.card");

function paketiEffect() {
	paketi.forEach((paket) => {
		paket.classList.add("active");
	});
}

window.addEventListener("load", paketiEffect);

// ACCORIAN
let faq_contents = document.querySelectorAll(".acc_article .content");
let faq_articles = document.querySelectorAll(".acc_article");

if (faq_articles.length) {
	faq_articles.forEach((article) => {
		let title = article.children[0];
		let indicator = title.children[0];
		if (article.classList.contains("active")) {
			let cont = article.children[1];
			cont.style.maxHeight = `${cont.scrollHeight}px`;
			indicator.innerText = "-";
		}
		article.children[0].addEventListener("click", showFaq);
	});
}

function showFaq() {
	let article = this.parentElement;
	let cont = article.children[1];
	let title = this;

	let indicator = title.children[0];

	if (article.classList.contains("active")) {
		article.classList.remove("active");
		cont.style.maxHeight = `0px`;
		indicator.innerText = "+";
	} else {
		article.classList.add("active");
		cont.style.maxHeight = `${cont.scrollHeight + 30}px`;
		indicator.innerText = "-";
	}
}

// IMAGE LOADER

const images = document.querySelectorAll("img[data-src]");
const imgOptions = {
	threshold: 0,
	rootMargin: "0px 200px 300px 200px",
};
const imageObserver = new IntersectionObserver((entries, imageObserver) => {
	entries.forEach((entry) => {
		if (!entry.isIntersecting) {
			return;
		} else {
			preloadImage(entry.target);
			imageObserver.unobserve(entry.target);
		}
	});
}, imgOptions);

function preloadImage(img) {
	const src = img.getAttribute("data-src");
	if (!src) {
		return;
	}
	img.src = src;
}

images.forEach((img) => {
	imageObserver.observe(img);
});

// REZERVACIJA MODAL

let reserve_btns = document.querySelectorAll("a.reserve");
let modal_reserve = document.querySelector("section#reservation");
let reserve_form = document.querySelector("form#reserve_form");
let paket_selector = document.querySelector(
	"form#reserve_form select#paket_select"
);
let closeModalBtn = document.querySelector(".close_form");
let reserveFrom;
if (reserve_form) {
	console.log(reserve_form);
	reserveFrom = new FormValidation("#reserve_form");
	// reserveFrom.events();
	reserveFrom.setDate();
}

if (closeModalBtn) {
	closeModalBtn.addEventListener("click", close_reserve_modal);
}

if (reserve_btns.length) {
	reserve_btns.forEach((btn) => {
		btn.addEventListener("click", showPopup);
	});
}

function showPopup(e) {
	console.log(this);
	e.preventDefault();
	if (modal_reserve.classList.contains("active")) {
		close_reserve_modal();
		return;
	}
	modal_reserve.style.display = "flex";
	setTimeout(() => {
		modal_reserve.classList.add("active");
		body.classList.add("noScroll");
	}, 50);

	if (this.getAttribute("data-paket")) {
		selectPack(this.getAttribute("data-paket"));
	}
}
function close_reserve_modal() {
	modal_reserve.classList.remove("active");
	body.classList.remove("noScroll");
	setTimeout(() => {
		modal_reserve.style.display = "none";
	}, 400);
	reserve_form.reset();
	let inputs = reserveFrom.inputs;
	inputs.forEach((input) => {
		input.classList.remove("alert");
	});
}

function selectPack(paket) {
	console.log(paket);
	paket_selector.value = paket;
}


    const elements = document.querySelectorAll(".in_view"); // Target elements

    const observerOptions = {
        root: null, // Observe relative to the viewport
        rootMargin: "0px", // No margin offset
        threshold: 0.25, // Trigger when 10% of element is visible
    };

    const observerCallback = (entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("scroll"); // Add class when visible
            } else {
                entry.target.classList.remove("scroll"); // Remove class when out of view
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    elements.forEach((element) => observer.observe(element));


	