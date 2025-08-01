<?php

namespace Core;

function view(string $viewPath, array $data = [], ?string $layoutPath = 'layouts/main')
{
    // Mengekstrak data menjadi variabel-variabel
    extract($data);

    // Path lengkap ke file view konten
    $content_view = __DIR__ . "/../app/Views/{$viewPath}.php";

    if ($layoutPath) {
        // Jika layoutPath diberikan, muat layout utama
        $layout_file = __DIR__ . "/../app/Views/{$layoutPath}.php";
        if (file_exists($layout_file)) {
            // Layout akan memanggil variabel $content_view
            require_once $layout_file;
        } else {
            // Jika file layout tidak ditemukan, tampilkan error
            echo "Error: Layout file not found at " . $layout_file;
        }
    } else {
        // Jika tidak ada layout, langsung muat view konten saja
        if (file_exists($content_view)) {
            require_once $content_view;
        } else {
            echo "Error: View file not found at " . $content_view;
        }
    }
}
