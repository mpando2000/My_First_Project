// const nameInput = document.querySelector("#fullname");
// const emailInput = document.querySelector("#email");
// const passwordOneInput = document.querySelector("#passwordOne");
// const passwordTwoInput = document.querySelector("#passwordTwo");
// const form = document.querySelector("#form");
// console.log("hiiii");

// nameInput.addEventListener('focusout', e => {
//     const name = nameInput.value.trim();
//     console.log(name === "");
//     if (name === "") {
//         setError(nameInput, "enter your name");
//     } else if (!isRealName(name)) {
//         setError(nameInput, "That can not be a real name");
//     } else if (!isValidName(name)) {
//         setError(nameInput, "Only leters are allowed");

//     } else if (name.length < 3) {
//         setError(nameInput, "Type a valid name");

//     } else if (name.split(" ").length < 2) {
//         setError(nameInput, "Please enter a full name");
//     } else {
//         setSuccess(nameInput, "");
//     }
// });
// // form.addEventListener("submit", event => {
// //     event.preventDefault();
// //     validateInput();
// //     if (validateInput() === true) {
// //         window.location.href = "./job.html";
// //     }
// // });
// const validateInput = () => {
//     const name = nameInput.value.trim();
//     const email = emailInput.value.trim();
//     const passwordOne = passwordOneInput.value.trim();
//     const passwordTwo = passwordTwoInput.value.trim();

//     let errorCounter = 0;

//     if (!isValidName(name)) {
//         setError(nameInput, "Only leters are allowed");
//         errorCounter++;
//     } else if (name.length < 3) {
//         setError(nameInput, "Type a valid name");
//         errorCounter++;
//     } else if (name.split(" ").length < 2) {
//         setError(nameInput, "Please enter a full name");
//     } else {
//         setSuccess(nameInput, "");
//     }

//     if (!isValidEmail(email)) {

//         setError(emailInput, "Please type a valid email");
//         errorCounter++;
//     } else {
//         setSuccess(emailInput, "");
//     }

//     if (passwordOne.length < 5) {
//         setError(passwordOneInput, "Password should be atleast 5 characters")
//         errorCounter++;
//     } else {
//         setSuccess(passwordOneInput, "");
//     }


//     if (passwordTwo !== passwordOne) {
//         setError(passwordTwoInput, "Passwords do not match")
//         errorCounter++;
//     } else {
//         setSuccess(passwordTwoInput, "");
//     }


//     if (errorCounter > 0) {
//         return false;
//     } else {
//         return true;

//     }

// }

// const setError = (element, message) => {
//     const errorContainer = element.parentElement.lastElementChild;
//     errorContainer.innerText = message;

//     errorContainer.classList.add("error");
//     errorContainer.classList.remove("success");
// };
// const setSuccess = (element, message) => {
//     const errorContainer = element.parentElement.lastElementChild;
//     errorContainer.innerText = message;

//     errorContainer.classList.add("success");
//     errorContainer.classList.remove("error");
// }

// function isValidName(name) {
//     const re = /^[A-Za-z\s]+$/;
//     return re.test(name);
// }

// function isValidEmail(email) {
//     const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     return emailFormat.test(email);
// }

// function isRealName(name) {
//     const pattern = /^(?!.*([A-Za-z])\1{2})[A-Za-z]+$/g;
//     return pattern.test(name);
// }