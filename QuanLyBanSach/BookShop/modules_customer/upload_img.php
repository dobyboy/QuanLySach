<img id="img_nv" src="../image/avatar.jpg " >
<br>
<label for="files" style="display: block;"><span id="filename">Chọn ảnh</span></label>
<input type="file" id="files" name="image"  value="Chọn ảnh" style="display: none" />

<script>
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        document.getElementById('filename').innerText = files[0].name;
        var img = document.getElementById("img_nv");
        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    img.src=e.target.result;
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
