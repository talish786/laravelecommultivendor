<!DOCTYPE html>
<html>

<head>
    <title>Laravel 6 Uploads Example</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .preview-item img.selected {
            border: 2px solid red;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <div id="image-trigger" style="cursor: pointer;display:inline-block">
                    <img src="{{ asset('backend/assets/images/user.png') }}" alt="Select Images" style="max-width: 100px; max-height: 100px;">
                </div>

                <!-- Hidden file input -->
                <input type="file" class="form-control" name="images[]" id="images" accept="image/*" multiple style="display:none;">

                <div id="image-preview" class="mt-2 d-flex"></div>

                <!-- Error message for not selecting an image -->
                <div id="error-message" class="text-danger"></div>
            </div>

            <button type="submit" class="btn btn-primary" id="submit-btn">Create Menu</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var selectedImages = [];
            var isError = $("#error-message");
            function updatePreview() {
                const previewContainer = $('#image-preview');
                previewContainer.empty();
                
                const dataTransfer = new DataTransfer();

                selectedImages.forEach(function (file, index) {
                    console.log(index+1);
                    const imageUrl = URL.createObjectURL(file);
                    const radioId = `radio${index}`;
                    const labelId = `label${index}`;
                    const previewItem = `
                        <div class="preview-item" data-index="${index}">
                            <input type="radio" id="${radioId}" name="selectedImage" value="${file.name}" class="d-none">
                            <label for="${radioId}" id="${labelId}">
                                <img src="${imageUrl}" style="max-width: 100px; max-height: 100px;" class="">
                            </label>
                            <button class="btn btn-danger btn-sm ml-2" onclick="removeImage('${file.name}')">Delete</button>
                        </div>
                    `;

                    previewContainer.append(previewItem);
                    dataTransfer.items.add(file);
                });

                $("#images")[0].files = dataTransfer.files;
            }

            window.removeImage = function (fileName) {
                const index = selectedImages.findIndex(file => file.name === fileName);
                if (index !== -1) {
                    selectedImages.splice(index, 1);
                    updatePreview();
                }
            };

            $('#image-trigger').on('click', function () {
                $('#images').click();
            });

            $('#images').on('change', function (e) {
                const files = e.target.files;

                if (files) {
                    for (const file of files) {
                        if (selectedImages.length < 10) {
                            selectedImages.push(file);
                        } else {
                            isError.html("You can only select up to 10 images.");
                        }
                    }
                    updatePreview();
                }
            });

            $('#image-preview').on('click', '.preview-item', function () {
                const index = $(this).data('index');
                $('#image-preview img').removeClass('selected');
                $(`#label${index} img`).addClass('selected');
                $(`#radio${index}`).prop('checked', true);
            });

            $('form').submit(function (event) {
                event.preventDefault();
                const selectedRadio = $('input[name="selectedImage"]:checked').val();
                if (!selectedRadio) {
                    isError.html("Please select at least one image");
                    return;
                }
                isError.html("");
                this.submit();

            });
        });
    </script>

</body>

</html>
