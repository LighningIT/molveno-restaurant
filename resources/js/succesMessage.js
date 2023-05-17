document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("succes-message") != undefined) {
        setTimeout(() => {
            document.getElementById("succes-message").textContent = "";
        }, 5000);

    }
})
