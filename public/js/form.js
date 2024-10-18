const btnSubmit = document.querySelector(".btn-submit");

btnSubmit.addEventListener("click", () => {
    setTimeout(function () {
        btnSubmit.disabled = true;
    }, 0);
    location.reload();
});
