<?php

$title = 'Добавить фото';
ob_start();
?>
    <style>
        .preview-item {
            position: relative;
            display: inline-block;
            margin: 10px;
        }
        .preview-item img {
            max-width: 150px;
            max-height: 150px;
        }
        .preview-item .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            line-height: 25px;
            text-align: center;
            cursor: pointer;
        }
    </style>
<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/posts/store" enctype="multipart/form-data" class="blue-background">
<input type="hidden" id="album_id" name="album_id" value="<?= $album_id ?>">
<input type="hidden" id="event_id" name="event_id" value="<?= $event_id ?>">
    <!-- <div class="mb-3">
        <label for="img_name" class="form-label">Название</label>
        <input type="text" class="form-control" id="img_name" name="img_name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <textarea type="text" class="form-control" id="description" name="description" required></textarea>
    </div> -->
    <!-- <div class="mb-3">
        <label for="tags-select" class="form-label">Выберите теги</label>
        <select class="form-select" id="tags-select" name="tags[]" multiple>
            <option value="">Выберите теги</option>
            <?php foreach ($tags as $tag): ?>
                <option value="<?php echo $tag['id']; ?>"><?php echo $tag['tag_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div> -->
    <div class="container mt-5">
        <h2 class="mb-4">Загрузка нескольких фотографий</h2>
       
            <div class="form-group">
                <label for="img" class="btn btn-primary">
                    <span id="upload-label">Выберите фотографии</span>
                    <input type="file" id="img" name="img[]" accept="image/*" multiple style="display: none;">
                </label>
            </div>
            <div id="preview-container" class="mt-3"></div>
        
    </div>

<div id="preview-container" class="mt-3"></div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<script>
        document.getElementById('img').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // Очищаем контейнер перед добавлением новых превью

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.classList.add('preview-item');

                        const img = document.createElement('img');
                        img.src = e.target.result;

                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.textContent = '×';
                        removeBtn.classList.add('remove-btn');
                        removeBtn.addEventListener('click', function() {
                            previewContainer.removeChild(previewDiv);
                            removeFileFromInput(file);
                        });

                        previewDiv.appendChild(img);
                        previewDiv.appendChild(removeBtn);
                        previewContainer.appendChild(previewDiv);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        function removeFileFromInput(file) {
            const input = document.getElementById('img');
            const dt = new DataTransfer();
            const { files } = input;

            for (let i = 0; i < files.length; i++) {
                const f = files[i];
                if (f !== file) {
                    dt.items.add(f);
                }
            }

            input.files = dt.files;
        }
    </script>
<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>