const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector(".nav-links");

toggle.addEventListener("click",()=>{
nav.classList.toggle("active");
});
/* ===============================
   TYPING EFFECT
=============================== */

c/* ===============================
   TYPING EFFECT FIXED
=============================== */

const texts = [
"Full Stack Developer",
"Data Science Enthusiast",
"AI Explorer",
"Machine Learning Engineer"
];

let textIndex = 0;
let charIndex = 0;
const speed = 100;
const delay = 1500;

function typeEffect(){
const typing = document.getElementById("typing");

if(charIndex < texts[textIndex].length){
typing.textContent += texts[textIndex].charAt(charIndex);
charIndex++;
setTimeout(typeEffect, speed);
}
else{
setTimeout(eraseEffect, delay);
}
}

function eraseEffect(){
const typing = document.getElementById("typing");

if(charIndex > 0){
typing.textContent = texts[textIndex].substring(0, charIndex-1);
charIndex--;
setTimeout(eraseEffect, speed/2);
}
else{
textIndex++;
if(textIndex >= texts.length) textIndex = 0;
setTimeout(typeEffect, speed);
}
}

document.addEventListener("DOMContentLoaded", typeEffect);
