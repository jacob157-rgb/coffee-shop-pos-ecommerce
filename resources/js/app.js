import "./bootstrap";
import "preline";
import "./../css/app.css";
import Cropper from "cropperjs";
import { HSOverlay } from "preline";

// Format IDR
document.addEventListener("input", (e) => {
    if (e.target.classList.contains("price")) {
        const value = e.target.value.replace(/\D/g, "");
        e.target.nextElementSibling.value = value;
        e.target.value = new Intl.NumberFormat("id-ID").format(value);
    }
});

// Dropzone Click
document.addEventListener("click", (e) => {
    if (e.target.classList.contains("dropzone")) {
        e.target.querySelector(".image-input").click();
    }
});

// Dropzone Drag and Drop
document.addEventListener("drop", (e) => {
    e.preventDefault();
    if (e.target.classList.contains("dropzone")) {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFile(files[0], e.target);
        }
    }
});

document.addEventListener("dragover", (e) => {
    e.preventDefault();
    if (e.target.classList.contains("dropzone")) {
        e.target.classList.add("dragover");
    }
});

document.addEventListener("dragleave", (e) => {
    if (e.target.classList.contains("dropzone")) {
        e.target.classList.remove("dragover");
    }
});
// End Drag and Drop

// Preview & Crop Image
let cropper = null;
let isCropping = false;

document.addEventListener("change", (e) => {
    if (e.target.classList.contains("image-input")) {
        const file = e.target.files[0];
        handleFile(file, e.target.closest(".dropzone"));
    }
});

function handleFile(file, dropzone) {
    if (!file.type.startsWith("image/")) {
        alert("Please upload a valid image file.");
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        const previewUrl = e.target.result;
        const previewImage = dropzone.querySelector(".dropzone-preview");
        const dropzoneIcon = dropzone.querySelector(".dropzone-icon");
        const dropzoneBtn = dropzone.querySelector(".dropzone-buttons");
        const deleteBtn = dropzone.querySelector(".delete-button");
        const cropBtn = dropzone.querySelector(".crop-button");
        const cropImage = document.querySelector(".crop-img");

        if (previewImage) {
            previewImage.src = previewUrl;
            previewImage.classList.remove("hidden");
            dropzoneIcon.classList.add("hidden");
            dropzoneBtn.classList.remove("hidden");

            deleteBtn.onclick = () =>
                deleteImage(previewImage, dropzone, cropImage);
            cropBtn.onclick = () =>
                openCropModal(previewUrl, previewImage, cropImage, dropzone);

            openCropModal(previewUrl, previewImage, cropImage, dropzone);
        }
    };
    reader.readAsDataURL(file);
}

function deleteImage(previewImage, dropzone, cropImage) {
    previewImage.src = "";
    previewImage.classList.add("hidden");
    dropzone.querySelector(".dropzone-icon").classList.remove("hidden");
    dropzone.querySelector(".dropzone-buttons").classList.add("hidden");
    dropzone.querySelector(".image-input").value = "";
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    cropImage.src = "";
}

function openCropModal(previewUrl, previewImage, cropImage, dropzone) {
    if (isCropping) return;

    isCropping = true;
    cropImage.src = previewUrl;
    cropImage.classList.remove("hidden");

    const { element } = HSOverlay.getInstance("#crop-modal", true);
    element.open();

    element.on("open", () => {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        cropper = new Cropper(cropImage, {
            aspectRatio: 1,
            viewMode: 2,
            autoCropArea: 0.8,
        });

        document.querySelector("#crop").onclick = () => {
            const canvas = cropper.getCroppedCanvas();
            canvas.toBlob((blob) => {
                const url = URL.createObjectURL(blob);

                // Update preview image
                previewImage.src = url;

                // Update image-input with the cropped image
                const newFile = new File([blob], "cropped-image.png", {
                    type: "image/png",
                });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                dropzone.querySelector(".image-input").files =
                    dataTransfer.files;

                element.close();
                isCropping = false;
            });
        };
    });

    element.on("close", () => {
        cropImage.src = "";
        cropImage.classList.add("hidden");
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        isCropping = false;
    });
}
