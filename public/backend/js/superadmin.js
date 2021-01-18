function previewImg() {
    const avatar = document.querySelector('#cover');
    const label = document.querySelector('#file-label');
    const imgPreview = document.querySelector('#img-preview');
    label.textContent = avatar.files[0].name;
    const fileAvatar = new FileReader();
    fileAvatar.readAsDataURL(avatar.files[0]);
    fileAvatar.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}

function previewVideo() {
    const input = document.getElementById('file-input');
    const video = document.getElementById('video');
    const videoSource = document.createElement('source');

    input.addEventListener('change', function() {
    const files = this.files || [];

    if (!files.length) return;
    
    const reader = new FileReader();

    reader.onload = function (e) {
        videoSource.setAttribute('src', e.target.result);
        video.appendChild(videoSource);
        video.load();
        video.play();
    };
    
    reader.onprogress = function (e) {
        console.log('progress: ', Math.round((e.loaded * 100) / e.total));
    };
    
    reader.readAsDataURL(files[0]);
    });
}
