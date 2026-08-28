<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden | Ziibay Soft</title>
    <!-- Shared Theme System -->
    <?= $this->include('components/theme_manager') ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-color); }
    </style>
</head>
<body class="antialiased flex items-center justify-center min-h-screen p-4">
    <div class="text-center">
        <h1 class="text-8xl font-bold text-primary mb-4">403</h1>
        <h2 class="text-3xl font-semibold text-text mb-6">Access Forbidden</h2>
        <p class="text-text-muted mb-8 max-w-md mx-auto">
            <?= esc($message ?? 'You do not have permission to access this resource.') ?>
        </p>
        <button onclick="history.back()" class="bg-surface hover:bg-surface-hover border border-border text-text px-8 py-3 rounded-lg text-base font-semibold transition-all duration-200">
            Go Back
        </button>
    </div>
</body>
</html>
