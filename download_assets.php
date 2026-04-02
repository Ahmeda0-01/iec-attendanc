<?php
$files = [
    ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', 'assets/bootstrap/css/bootstrap.min.css'],
    ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', 'assets/bootstrap/js/bootstrap.bundle.min.js'],
    ['https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', 'assets/flatpickr/flatpickr.min.css'],
    ['https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js', 'assets/flatpickr/flatpickr.min.js'],
];

foreach ($files as [$url, $path]) {
    $localPath = __DIR__ . '/public/' . $path;
    $folder = dirname($localPath);

    // إنشاء المجلدات الأب إذا لم تكن موجودة
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $content = file_get_contents($url);
    if ($content !== false) {
        file_put_contents($localPath, $content);
        echo "تم تحميل $url -> $path\n";
    } else {
        echo "فشل تحميل $url\n";
    }
}
