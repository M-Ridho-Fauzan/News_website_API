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
let previousImageUrl;

const initialValues = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    profileImage: document.getElementById("preview")?.src,
};

// Fungsi untuk mengecek apakah ada perubahan
function checkForChanges() {
    const saveButton = document.getElementById("saveButton");
    const currentName = document.getElementById("name").value;
    const currentEmail = document.getElementById("email").value;
    const currentProfileImage = document.getElementById("preview")?.src;

    // Cek apakah ada perubahan pada nama atau gambar
    const hasNameChanged = currentName !== initialValues.name;
    const hasEmailChanged = currentEmail !== initialValues.name;
    const hasImageChanged = currentProfileImage !== initialValues.profileImage;

    // Enable/disable tombol berdasarkan ada tidaknya perubahan
    saveButton.disabled =
        !hasNameChanged && !hasImageChanged && !hasEmailChanged;
}

document.getElementById("name").addEventListener("input", checkForChanges);
document.getElementById("email").addEventListener("input", checkForChanges);

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById("preview");
    const fileName = document.getElementById("file-name");
    const messageElement = document.getElementById("message-img");
    const cancelButton = document.getElementById("cancel-button-img");

    // Simpan URL gambar sebelumnya saat pertama kali memilih file
    if (!previousImageUrl) {
        previousImageUrl = preview.src;
    }

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        const file = input.files[0];

        // Validasi ukuran file (5MB = 5 * 1024 * 1024 bytes)
        if (file.size > 5 * 1024 * 1024) {
            messageElement.textContent =
                "Ukuran file terlalu besar (maksimal 5MB)";
            messageElement.className = "text-red-500";
            input.value = "";
            preview.src = "{{ asset('img/no-profile.png') }}";
            fileName.textContent = "";
            cancelButton.classList.add("hidden");
            return;
        }

        // Validasi tipe file
        const validTypes = [
            "image/jpeg",
            "image/jpg",
            "image/png",
            "image/gif",
        ];
        if (!validTypes.includes(file.type)) {
            messageElement.textContent =
                "Format file tidak valid (gunakan jpg, jpeg, png, atau gif)";
            messageElement.className = "text-red-500";
            input.value = "";
            preview.src = "{{ asset('img/no-profile.png') }}";
            fileName.textContent = "";
            cancelButton.classList.add("hidden");
            return;
        }

        // Tampilkan pratinjau gambar
        reader.onload = function (e) {
            preview.src = e.target.result;
            checkForChanges();
        };
        reader.readAsDataURL(input.files[0]);

        // Tampilkan nama file
        fileName.textContent = `Selected file: ${input.files[0].name}`;
        cancelButton.classList.remove("hidden");
    } else {
        // Reset jika tidak ada file yang dipilih
        resetImageSelection();
    }
}

function resetImageSelection() {
    const input = document.getElementById("user_img");
    const preview = document.getElementById("preview");
    const fileName = document.getElementById("file-name");
    const messageElement = document.getElementById("message-img");
    const cancelButton = document.getElementById("cancel-button-img");

    // Kembalikan ke gambar sebelumnya
    if (previousImageUrl) {
        preview.src = previousImageUrl;
    }

    input.value = "";
    fileName.textContent = "";
    messageElement.textContent = "";
    cancelButton.classList.add("hidden");

    // Reset previousImageUrl setelah membatalkan
    previousImageUrl = null;
}
