function Slider(prop) {
	this.sliderContainer = document.querySelector(`#${prop.slider}`);
	this.slides = document.querySelectorAll(`.${prop.items}`);
	this.slideCont = this.slides.length - 1;
	this.next = document.querySelector(`.${prop.next}`);
	this.prev = document.querySelector(`.${prop.prev}`);
	this.indicatorsContainer = document.querySelector(`.${prop.indicators}`);
	this.indicators = null;
	this.activeSlide = 0;

	this.nextSlide = function (n) {
		this.activeSlide = this.activeSlide + n;
		if (this.activeSlide > this.slideCont) {
			this.activeSlide = 0;
		} else if (this.activeSlide < 0) {
			this.activeSlide = this.slideCont;
		}
		this.changeSlide(this.activeSlide);
		this.resetTimer();
	};

	this.changeSlide = function (activeSlide) {
		this.slides.forEach((slide) => {
			slide.classList.remove("active");
		});
		this.slides[this.activeSlide].classList.add("active");
		this.updateIndicator();
	};

	this.createIndicators = function () {
		for (let i = 0; i < this.slideCont + 1; i++) {
			let indicator = document.createElement("span");
			indicator.setAttribute("data-slide", i);
			this.indicatorsContainer.append(indicator);
		}
		this.indicators = document.querySelectorAll(".indicators span");
		this.indicators[this.activeSlide].classList.add("active");
		this.indicators.forEach((indicator) => {
			let that = indicator;
			indicator.addEventListener(
				"click",
				this.manageIndicators.bind(this, that)
			);
		});
	};

	this.manageIndicators = function (indicator) {
		this.activeSlide = parseInt(indicator.getAttribute("data-slide"));
		this.changeSlide();
		this.resetTimer();
	};

	this.updateIndicator = function () {
		this.indicators.forEach((indi) => {
			indi.classList.remove("active");
		});
		this.indicators[this.activeSlide].classList.add("active");
	};

	this.events = function () {
		this.slides[0].classList.add("active");
		this.createIndicators();

		this.next.addEventListener("click", this.nextSlide.bind(this, 1));
		this.prev.addEventListener("click", this.nextSlide.bind(this, -1));
	};

	this.init = function () {};

	// TIMER
	this.timer = setInterval(() => {
		this.autoPlay();
	}, prop.autoplay);

	this.autoPlay = function () {
		this.nextSlide(1);
	};
	this.resetTimer = function () {
		clearInterval(this.timer);
		this.timer = setInterval(() => {
			this.autoPlay();
		}, prop.autoplay);
	};
}

let sliderProp = {
	slider: "slider",
	items: "item",
	next: "next",
	prev: "prev",
	indicators: "indicators",
	autoplay: 5000,
};

let slider = document.querySelector("#slider");

if (slider) {
	let heroSlider = new Slider(sliderProp);
	heroSlider.events();
}
