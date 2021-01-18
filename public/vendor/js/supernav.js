// Greeting
let hour = new Date().getHours();
let greeting;
if (hour < 10) {
    greeting = "ðŸŒ… Selamat Pagi";
} else if (hour < 14) {
    greeting = "ðŸŒ¤ï¸ Selamat Siang";

} else if (hour < 18) {
    greeting = "ðŸŒ‡ Selamat Sore";
} else {
    greeting = "ðŸŒ™ Selamat Malam"
}

// App.js use for diCoding.com Submission
console.log(greeting)
console.log("ðŸ’¡ Tersedia: Dark Mode. Klik pada ujung top menu")
console.log("ðŸ‘‹ Hello World! Gunakan perintah app untuk melihat detail. Thank You for Dicoding.com")

let app = {
    name: "ðŸ‘¦ Hafid Maulana",
    version: "v.1",
    languange: "HTML, CSS, JavaScript",
    message: "Thank You DICODING.COM"
}

// Function Dark Mode
function darkMode() {

    // toggle class
    const element = document.getElementById("app");
    element.classList.toggle("dark");

    // toggle logo
    imgSrc = document.getElementById("logos").src;
    if (imgSrc.indexOf("assets/img/logo.png") != -1) {
        document.getElementById("logos").src = "assets/img/logo-white.png";
    } else {
        document.getElementById("logos").src = "assets/img/logo.png";
    }

    // button text toggle
    const btn = document.getElementById("toggle");
    if (btn.innerHTML === "â˜€ï¸") {
        btn.innerHTML = "ðŸŒ™";
    } else {
        btn.innerHTML = "â˜€ï¸"
    }
}

//  Toggle Biodata Function
function asideBio() {
    // toggle Aside Biodata
    let bio = document.getElementById("bio-container");
    if (bio.style.visibility === "visible") {
        bio.style.visibility = "hidden";
    } else {
        bio.style.visibility = "visible";
    }

    let btnBio = document.getElementById("biotxt");
    if (btnBio.innerHTML === "Lihat Biodata") {
        btnBio.innerHTML = "Tutup Biodata";
    } else {
        btnBio.innerHTML = "Lihat Biodata"
    }

    window.onclick = function (event) {
        if (event.target == bio) {
            bio.style.visibility = "hidden";
        }
    }

}

//  Close Biodata Button 
function closeBtn() {
    // toggle Aside Biodata
    const close = document.getElementById("bio-container");
    if (close.style.visibility === "visible") {
        close.style.visibility = "hidden";
    } else {
        close.style.visibility = "visible";
    }
}


//  Menu Toggle
function toggleMenu() {
    let nav = document.getElementById("navigasi");
    if (nav.className === "topmenu") {
        nav.className += " navmob";
    } else {
        nav.className = "topmenu";
    }
    const imgbtn = document.getElementById("imgbtn").src;
    if (imgbtn.indexOf("assets/img/bx-menu.svg") != -1) {
        document.getElementById("imgbtn").src = "assets/img/bx-message-alt-x.svg";
    } else {
        document.getElementById("imgbtn").src = "assets/img/bx-menu.svg";
    }
}


// get year copyright
let newDate = new Date();
let tahun = newDate.getFullYear();
document.getElementById("year").innerHTML = tahun;