const carousel = document.querySelector("#carousel");
const images = carousel.querySelector(".carousel-images");

let currentIndex = 0;
const totalImages = images.children.length;
const imageWidth = images.children[0].offsetWidth;
const imageMargin = parseInt(getComputedStyle(images.children[0]).marginRight);
const containerWidth = carousel.offsetWidth;

function slideNext() {
    if (currentIndex === totalImages - 1) {
      currentIndex = 0;
    } else {
      currentIndex++;
    }
    
    let totalWidth = (imageWidth + imageMargin) * totalImages - imageMargin;
    images.style.width = totalWidth + 'px';
    images.style.transform = `translateX(-${currentIndex * (imageWidth + imageMargin)}px)`;
}

function slidePrev() {
    if (currentIndex > 0) {
        currentIndex--;
        images.style.transform = `translateX(-${currentIndex * (imageWidth + imageMargin)}px)`;
    }
}

function zoomIn(e) {
    e.target.style.transform = 'scale(1.1)';
}

function zoomOut(e) {
    e.target.style.transform = 'scale(1)';
}

const prevButton = document.createElement("button");
prevButton.classList.add("carousel-prev");
prevButton.innerHTML = "&#10094;";
prevButton.addEventListener("click", slidePrev);

const nextButton = document.createElement("button");
nextButton.classList.add("carousel-next");
nextButton.innerHTML = "&#10095;";
nextButton.addEventListener("click", slideNext);

carousel.appendChild(prevButton);
carousel.appendChild(nextButton);

for (let i = 0; i < totalImages; i++) {
    let img = images.children[i];
    img.addEventListener("mouseenter", zoomIn);
    img.addEventListener("mouseleave", zoomOut);
}
