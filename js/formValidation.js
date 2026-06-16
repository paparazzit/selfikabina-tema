// DATE
const date = new Date();
const currentDate = date.toISOString().slice(0, 10);

function FormValidation(opt) {
	this.form = document.querySelector(`${opt}`);
	this.inputs = this.form.querySelectorAll('[data-verify="true"]');
	this.errors = {};
	this.dateInput = this.form.querySelector('input[type="date"]');
	// this.formInfo = this.form.querySelector("#formInfo");
	this.valueIsChanging = function (e) {
		if (e.target.value.length >= 2) {
			e.target.parentElement.classList.remove("alert");
		}
	};
	this.changeHandler = this.valueIsChanging.bind(this);
	this.submittingForm = function (e) {
		e.preventDefault();

		this.checkForEmpty(this.inputs);
		let err_state = Object.keys(this.errors).length;
		console.log(err_state);
		if (err_state == 0) {
			this.sendData();
		}
	};
	this.removeAlert = function () {
		this.inputs.forEach((input) => {
			input.classList.remove("alert");
		});
	};
	this.checkForEmpty = function (inputs) {
		// console.log(inputs);
		inputs.forEach((input) => {
			let value = input.children[1];
			if (value.value === "") {
				this.errors[value.id] = `polje ${value.name} je obavezno`;
				this.makeAlerts(input);
			} else {
				delete this.errors[value.id];
			}
		});
	};

	this.makeAlerts = function (input) {
		input.classList.add("alert");
		this[input.children[1]] = input.children[1];
		if (this[input.children[1]].tagName === "SELECT") {
			this[input.children[1]].addEventListener("change", this.changeHandler);
		} else {
			this[input.children[1]].addEventListener("keydown", this.changeHandler);
		}
	};
	this.sendData = function () {
		let formData = new FormData(this.form);
		// formData.append("action", "subForm_action");
		// console.log(this.form.action);
		let action = document.querySelector("input[name=action_f]");

		formData.append("action", action.value);
		loader("show");
		axios
			.post(this.form.action, formData)
			.then((res) => {
				console.log(res.data);
				if (!res.data.success) {
					throw res.data;
				} else {
					loader("hide");

					this.showInfo(res.data);
					this.form.reset();
				}
			})
			.catch((err) => {
				loader("hide");
				this.showInfo(err);
			});
	};

	this.form.addEventListener("submit", this.submittingForm.bind(this));
	this.showInfo = function (data) {
		console.log(data.success);
		this.formInfo = document.createElement("article");
		this.formInfo.className = "form-info";
		this.formInfo.innerHTML = "<p></p>";
		this.form.appendChild(this.formInfo);
		this.formInfo.children[0].innerText = data.data;
		this.formInfo.classList.add("show");
		if (data.success) {
			this.formInfo.classList.add("success");
		} else {
			this.formInfo.classList.add("error");
		}

		setTimeout(this.closeInfo.bind(this, this.formInfo), 4500);
	};

	this.closeInfo = function () {
		this.formInfo.classList.remove("show");
		this.formInfo.classList.remove("error");
		this.formInfo.classList.remove("success");
		this.formInfo.children[0].innerText = "";
		this.formInfo.remove();
	};

	let loader = function (option) {
		let body = document.querySelector("body");

		if (option === "show") {
			console.log("loader-show");
			let loader = document.createElement("div");
			loader.className = "loader-wrapper";
			loader.innerHTML = '<div class="loader"></div>';
			body.appendChild(loader);
			body.classList.add("disableMainScroll");
		} else {
			console.log("loader-hide");
			body.classList.remove("disableMainScroll");
			let loader = document.querySelector(".loader-wrapper");
			if (loader) {
				loader.remove();
			}
		}
	};

	this.events = function () {};
	this.setDate = function () {
		this.dateInput.min = `${currentDate}`;
	};
}

// FORM VALIDATOR
let mainForm = document.querySelector("form#form");
let myName = document.querySelector("#name");

if (mainForm) {
	let form1 = new FormValidation("#form");

	form1.setDate();
}
