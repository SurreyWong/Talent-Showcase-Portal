let inputFile = document.getElementById("input-file");
let preview = document.getElementById("media-preview");
let postButton = document.querySelector(".post-button");
let description = document.getElementById("description");

let mediaData = "";

// Preview video or image uploaded
inputFile.onchange = function () {
    const file = inputFile.files[0];
    preview.innerHTML = "";

    if (file) {
        const fileURL = URL.createObjectURL(file);
        mediaData = fileURL; // Save for posting

        if (file.type.startsWith("image/")) {
            const img = document.createElement("img");
            img.src = fileURL;
            preview.appendChild(img);
        } else if (file.type.startsWith("video/")) {
            const video = document.createElement("video");
            video.src = fileURL;
            video.controls = true;
            preview.appendChild(video);
        } else {
            preview.innerHTML = "<p>Unsupported file type.</p>";
        }
    }
};

// Post content at media.html
postButton.addEventListener("click", function (e) {
    e.preventDefault();

    if (!mediaData || !description.value.trim()) {
        alert("Please upload media and add a caption.");
        return;
    }

    const posts = JSON.parse(localStorage.getItem("posts")) || [];

    posts.push({
        id: Date.now(),
        media: mediaData,
        caption: description.value.trim(),
        type: inputFile.files[0].type.startsWith("image/") ? "image" : "video"
    });

    localStorage.setItem("posts", JSON.stringify(posts));

    alert("Post uploaded successfully!");
    inputFile.value = "";
    description.value = "";
    preview.innerHTML = "";

    // Optionally redirect to media page
    window.location.href = "media.html";
});
