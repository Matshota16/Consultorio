<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Gallery</title>
    <style>
        /* Estilos básicos para la galería */
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery-item {
            width: 150px;
            height: 150px;
            overflow: hidden;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<h3>Image Gallery</h3>

<?php if (!empty($files) && is_array($files)): ?>
    <div class="gallery">
        <?php foreach ($files as $file): ?>
            <div class="gallery-item">
                <a href="<?= site_url('upload/getFile/' . $file['id']) ?>" target="_blank">
                    <img src="<?= site_url('upload/getFile/' . $file['id']) ?>" alt="<?= esc($file['filename']) ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No images found.</p>
<?php endif; ?>

<p><?= anchor('upload', 'Upload Another File!') ?></p>

</body>
</html>
