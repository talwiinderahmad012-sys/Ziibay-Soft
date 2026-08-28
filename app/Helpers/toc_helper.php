<?php
if (!function_exists('generate_toc_and_add_ids')) {
    function generate_toc_and_add_ids(&$html)
    {
        $toc = [];
        // Match H2 and H3 tags
        $pattern = '/<h([23])([^>]*)>(.*?)<\/h\1>/is';
        
        $html = preg_replace_callback($pattern, function ($matches) use (&$toc) {
            $level = $matches[1]; // 2 or 3
            $attributes = $matches[2];
            $content = $matches[3];
            
            // Check if id already exists
            if (preg_match('/id="([^"]+)"/i', $attributes, $idMatch)) {
                $id = $idMatch[1];
            } else {
                // Generate ID from content
                $id = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', strip_tags($content)), '-'));
                if (empty($id)) {
                    $id = 'section-' . uniqid();
                }
                
                // Add id to attributes
                $attributes .= ' id="' . $id . '"';
            }
            
            $toc[] = [
                'level' => $level,
                'id' => $id,
                'title' => strip_tags($content)
            ];
            
            return "<h{$level}{$attributes}>{$content}</h{$level}>";
        }, $html);
        
        return $toc;
    }
}

if (!function_exists('calculate_reading_time')) {
    function calculate_reading_time($text, $wpm = 200)
    {
        $wordCount = str_word_count(strip_tags($text));
        $minutes = ceil($wordCount / $wpm);
        return $minutes;
    }
}
