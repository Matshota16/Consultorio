<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Uploaded File</title>
</head>
<body>

<?php if (isset($uploaded_fileinfo)): ?>
    <h3>File Uploaded Successfully!</h3>
    <ul>
        <li>Name: <?= esc($uploaded_fileinfo->getBasename()) ?></li>
        <li>Size: <?= esc($uploaded_fileinfo->getSizeByUnit('kb')) ?> KB</li>
        <li>Extension: <?= esc($uploaded_fileinfo->guessExtension()) ?></li>
    </ul>

    <p><a href="<?= site_url('upload/viewFile/' . $uploaded_fileinfo->getBasename()) ?>" target="_blank">View Uploaded File</a></p>
<?php elseif (isset($file_url)): ?>
    <h3>Viewing File</h3>
    <img src="<?= esc($file_url) ?>" alt="Uploaded File">
<?php else: ?>
    <p>No file to display.</p>
<?php endif; ?>

<p><?= anchor('upload', 'Upload Another File!') ?></p>

</body>
</html>
