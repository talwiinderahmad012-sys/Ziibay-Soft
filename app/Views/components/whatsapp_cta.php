<?php
// Load WhatsApp settings from database
$db = \Config\Database::connect();
$settingsRaw = $db->table('settings')->whereIn('setting_key', ['whatsapp_enabled', 'whatsapp_number', 'whatsapp_message'])->get()->getResultArray();
$waSettings = [];
foreach ($settingsRaw as $s) {
    $waSettings[$s['setting_key']] = $s['setting_value'];
}

$whatsapp_enabled  = $waSettings['whatsapp_enabled']  ?? '1';
$whatsapp_number   = trim($waSettings['whatsapp_number']   ?? env('APP_WHATSAPP', ''));
$wa_msg            = $waSettings['whatsapp_message']   ?? 'Hello Ziibay Soft, I would like to discuss a project.';
$encoded_message   = urlencode($wa_msg);

// Build the href: use wa.me when number exists, otherwise fall back to contact page
if (!empty($whatsapp_number)) {
    $wa_href  = 'https://wa.me/' . esc($whatsapp_number, 'url') . '?text=' . $encoded_message;
    $wa_label = 'Chat with us on WhatsApp';
    $wa_tip   = 'Chat with Ziibay Soft on WhatsApp';
} else {
    $wa_href  = base_url('contact');
    $wa_label = 'Get in touch with Ziibay Soft';
    $wa_tip   = 'Contact Ziibay Soft';
}
?>

<?php if ($whatsapp_enabled !== '0'): ?>
<div class="fixed bottom-6 right-6 z-50 group">
    <!-- Tooltip -->
    <div class="absolute bottom-full right-0 mb-3 bg-gray-900 text-white text-xs px-3 py-2 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none select-none">
        <?= esc($wa_tip) ?>
        <div class="absolute top-full right-4 border-4 border-transparent border-t-gray-900"></div>
    </div>

    <!-- Floating WhatsApp / Contact Button -->
    <a href="<?= $wa_href ?>"
       <?php if (!empty($whatsapp_number)): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
       class="flex items-center justify-center w-14 h-14 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-full wa-glow transition-all duration-300 hover:scale-110 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#25D366]/60"
       aria-label="<?= esc($wa_label) ?>">
        <!-- Official WhatsApp Icon SVG -->
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.898-4.45 9.899-9.898 0-2.646-1.032-5.13-2.905-7.002-1.872-1.872-4.356-2.903-7.001-2.903-5.448 0-9.898 4.45-9.899 9.898 0 2.067.545 3.992 1.579 5.679l-1.144 4.181 4.279-1.147zm10.741-7.234c-.068-.114-.251-.182-.524-.318-.273-.136-1.616-.799-1.866-.89-.25-.091-.433-.136-.615.136-.183.273-.715.89-.877 1.072-.161.182-.323.205-.596.069-.273-.136-1.154-.426-2.197-1.353-.811-.722-1.359-1.614-1.52-1.887-.161-.273-.017-.421.12-.557.123-.122.273-.318.409-.455.136-.136.182-.227.273-.381.091-.155.045-.291-.023-.427-.068-.136-.615-1.482-.843-2.028-.222-.53-.448-.458-.615-.466-.161-.008-.344-.009-.527-.009s-.478.068-.728.341c-.25.273-.956.932-.956 2.273s.978 2.636 1.115 2.818c.136.182 1.922 2.933 4.654 4.117 2.731 1.183 2.731.795 3.232.749.5-.045 1.616-.659 1.843-1.295.227-.636.227-1.182.161-1.295z"/>
        </svg>
    </a>
</div>
<style>
.wa-glow { box-shadow: 0 4px 24px rgba(37, 211, 102, 0.45), 0 2px 8px rgba(0,0,0,0.2); }
.wa-glow:hover { box-shadow: 0 6px 32px rgba(37, 211, 102, 0.6), 0 4px 16px rgba(0,0,0,0.3); }
@media (max-width: 640px) {
    .fixed.bottom-6.right-6 { bottom: 1rem; right: 1rem; }
}
</style>
<?php endif; ?>
