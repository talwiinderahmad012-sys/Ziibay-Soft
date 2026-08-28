<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login | Ziibay Soft</title>
    <!-- Shared Theme System -->
    <?= $this->include('components/theme_manager') ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-color); }
    </style>
</head>
<body class="antialiased flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md bg-surface border border-border rounded-2xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-text tracking-tight mb-2">Ziibay <span class="text-primary">Admin</span></h1>
            <p class="text-text-muted text-sm">Sign in to your account</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-danger/10 border border-danger/50 text-danger text-sm rounded-lg p-3 mb-6">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="bg-danger/10 border border-danger/50 text-danger text-sm rounded-lg p-3 mb-6">
                <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>
            <div>
                <label for="email" class="block text-sm font-medium text-text-muted mb-2">Email Address</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="w-full bg-surface border border-border rounded-lg px-4 py-2.5 text-text focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-text-muted mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full bg-surface border border-border rounded-lg px-4 py-2.5 text-text focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
            </div>
            <button type="submit" class="w-full bg-primary hover:bg-primary-hover text-text font-semibold rounded-lg px-4 py-3 transition-colors duration-200">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
