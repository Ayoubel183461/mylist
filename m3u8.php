<?php

// الرابط الأساسي
$base_url = "http://bdd78.4rouwanda-shop.store/live/918454578001/index.m3u8";

// دالة لتحميل محتوى M3U8
function download_m3u8($url) {
    $content = file_get_contents($url);
    if ($content !== false) {
        return $content;
    } else {
        echo "فشل في تحميل الملف";
        return null;
    }
}

// دالة لتحليل محتوى M3U8
function parse_m3u8($content) {
    $lines = explode("\n", $content);
    $segments = [];
    foreach ($lines as $line) {
        if (strpos($line, "#EXTINF") === 0) {
            $segments[] = $line;
        }
    }
    return $segments;
}

// تحميل وتحليل المحتوى
$m3u8_content = download_m3u8($base_url);
if ($m3u8_content) {
    $segments = parse_m3u8($m3u8_content);
    foreach ($segments as $segment) {
        echo $segment . "\n";
    }
}

?>
