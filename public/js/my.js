function previewImage()
{
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent)
    {
        imgPreview.src = oFREvent.target.result;
    }
}


function previewImagelsp()
{
    const image = document.querySelector('#image-lsp');
    const imgPreview = document.querySelector('.img-preview-lsp');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent)
    {
        imgPreview.src = oFREvent.target.result;
    }
}


function previewImagebnsp()
{
    const image = document.querySelector('#image-bnsp');
    const imgPreview = document.querySelector('.img-preview-bnsp');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent)
    {
        imgPreview.src = oFREvent.target.result;
    }
}
