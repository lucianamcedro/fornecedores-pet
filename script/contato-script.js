$(document).ready(function(){
  $('#telefone').inputmask('99 99999-9999');
});

const form = document.querySelector("#contact-form");
const successModal = document.querySelector("#success-modal");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  fetch("https://api.staticforms.xyz/submit", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(Object.fromEntries(formData)),
  })
    .then((response) => {
      if (response.ok) {
        successModal.style.display = "block";

        form.reset();
      } else {
        throw new Error("Não foi possível enviar o formulário.");
      }
    })
    .catch((error) => {
      console.error(error);
      alert(
        "Houve um erro ao enviar o formulário. Tente novamente mais tarde."
      );
    });
});

const closeBtn = successModal.querySelector(".close");
closeBtn.addEventListener("click", () => {
  successModal.style.display = "none";
});
