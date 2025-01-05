<?php

if (!function_exists('buildQueryUrl')) {
    /**
     * Membuat URL dengan query string yang diperbarui.
     *
     * @param string $baseUrl Base URL (misalnya: 'all-post').
     * @param array $additionalParams Parameter tambahan untuk query string.
     * @return string URL dengan query string yang diperbarui.
     */
    function buildQueryUrl(string $baseUrl, array $additionalParams = []): string
    {
        // Ambil semua query parameter yang ada saat ini
        $queryParams = request()->query();
        
        // Gabungkan query yang ada dengan parameter tambahan
        $queryParams = array_merge($queryParams, $additionalParams);
        
        // Pastikan hanya parameter yang dibutuhkan yang dipertahankan
        $queryParams = array_filter($queryParams, function ($value) {
            return $value !== null && $value !== ''; // Buang parameter yang kosong
        });

        return url($baseUrl) . '?' . http_build_query($queryParams);

        // return url($baseUrl) . '?' . http_build_query(array_merge(request()->query(), $additionalParams));
    }
}
