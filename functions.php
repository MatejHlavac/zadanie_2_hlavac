<?php
function nacitajPortfolio($subor) {
    if (!file_exists($subor)) {
        return [];
    }
    
    $obsah = file_get_contents($subor);
    $data = json_decode($obsah, true);
    
    return $data['portfolio'] ?? [];
}
?>