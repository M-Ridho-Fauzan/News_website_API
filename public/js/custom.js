const hamburger = document.querySelector("#hamburger");
const darkToggle = document.querySelector("#dark-toggle");
const html = document.querySelector("html");

// // Event listener untuk close menu saat klik di luar
// document.addEventListener("click", (event) => {
//     if (!hamburger.contains(event.target) && !navMenu.contains(event.target)) {
//         hamburger.classList.remove("hamburger-active");
//         navMenu.classList.add("hidden");
//     }
// });

darkToggle.addEventListener("click", () => {
    if (darkToggle.checked) {
        html.classList.add("dark");
        localStorage.theme = "dark";
    } else {
        html.classList.remove("dark");
        localStorage.theme = "light";
    }
});

if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}

if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    darkToggle.checked = true;
} else {
    darkToggle.checked = false;
}

// ===========

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const fileName = document.getElementById('file-name');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        // Tampilkan pratinjau gambar
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);

        // Tampilkan nama file
        fileName.textContent = `Selected file: ${input.files[0].name}`;
    } else {
        // Reset jika tidak ada file yang dipilih
        preview.src = "{{ asset('img/no-profile.png') }}";
        fileName.textContent = '';
    }
}
