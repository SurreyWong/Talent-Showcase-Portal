<!-- This modal is always loaded but hidden -->
<div class="modal" id="mediaModal" style="display: none;">
    <form class="modal-content" id="uploadForm">
        <span class="close" id="closeMediaBtn">&times;</span>
        <h2>Post Media</h2>

        <div class="upload-section">
            <label for="input-file">Upload Image or Video</label>
            <input type="file" accept="image/*,video/*" id="input-file" required>
            <div class="media-preview" id="media-preview"></div>
        </div>

        <textarea id="description" placeholder="Write a caption..." required></textarea>
        <button class="post-button" type="submit">Post Content</button>
    </form>
</div>
