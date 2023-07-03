function openImagePicker() {
    var imageUrl = prompt("Insira a URL da imagem:");
    if (imageUrl) {
        var hiddenInput = document.getElementById("imagem-input");
        hiddenInput.value = imageUrl;
    }
}

function openModal(imageUrl) {
var modal = document.getElementById("modal");
var modalClose = document.getElementById("modal-close");
var modalImage = document.getElementById("modal-image");

modalImage.src = imageUrl;
modal.style.display = "block";

modalClose.addEventListener("click", function () {
    modal.style.display = "none";
});

modal.addEventListener("click", function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
}
