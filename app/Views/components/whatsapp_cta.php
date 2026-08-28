<?php 
// WhatsApp settings can be loaded from the database in the future.
// For now, these are the configurable variables.
$whatsapp_number = env('APP_WHATSAPP', ''); // Example: '1234567890'
$wa_msg = $whatsapp_message ?? "Hello Ziibay Soft, I would like to discuss a project.";
$encoded_message = urlencode($wa_msg);
?>

<?php if (!empty($whatsapp_number)): ?>
<div class="fixed bottom-6 right-6 z-50">
    <!-- Tooltip -->
    <div class="absolute bottom-full right-0 mb-3 bg-surface border border-border text-text text-xs px-3 py-2 rounded shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 whitespace-nowrap hidden md:block pointer-events-none">
        Chat with us on WhatsApp
        <div class="absolute top-full right-5 border-4 border-transparent border-t-surface"></div>
    </div>
    
    <!-- Button -->
    <a href="https://wa.me/<?= esc($whatsapp_number) ?>?text=<?= $encoded_message ?>" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="group flex items-center justify-center w-14 h-14 bg-[#25D366] hover:bg-[#128C7E] text-text-onprimary rounded-full shadow-glow-green transition-transform duration-300 hover:scale-110 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#25D366]/50"
       aria-label="Contact us on WhatsApp">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.898-4.45 9.899-9.898 0-2.646-1.032-5.13-2.905-7.002-1.872-1.872-4.356-2.903-7.001-2.903-5.448 0-9.898 4.45-9.899 9.898 0 2.067.545 3.992 1.579 5.679l-1.144 4.181 4.279-1.147zm10.741-7.234c-.068-.114-.251-.182-.524-.318-.273-.136-1.616-.799-1.866-.89-.25-.091-.433-.136-.615.136-.183.273-.715.89-.877 1.072-.161.182-.323.205-.596.069-.273-.136-1.154-.426-2.197-1.353-.811-.722-1.359-1.614-1.52-1.887-.161-.273-.017-.421.12-.557.123-.122.273-.318.409-.455.136-.136.182-.227.273-.381.091-.155.045-.291-.023-.427-.068-.136-.615-1.482-.843-2.028-.222-.53-.448-.458-.615-.466-.161-.008-.344-.009-.527-.009s-.478.068-.728.341c-.25.273-.956.932-.956 2.273s.978 2.636 1.115 2.818c.136.182 1.922 2.933 4.654 4.117 2.731 1.183 2.731.795 3.232.749.5-.045 1.616-.659 1.843-1.295.227-.636.227-1.182.161-1.295z"/>
        </svg>
    </a>
</div>
<style>
.shadow-glow-green { box-shadow: 0 0 20px rgba(37, 211, 102, 0.4); }
</style>
<?php endif; ?>
