<div class="row">
    <!-- VISI -->
    <div class="col-md-6 mb-4">
        <div class="card card-outline card-primary shadow-sm h-100">
            <div class="card-header text-center" style="background:#f8f9fa;">
                <i class="fas fa-eye fa-2x text-primary mb-2"></i>
                <h3 style="font-size:20px; font-weight:600;">Visi</h3>
            </div>

            <div class="card-body">
                <p class="text-center" style="font-size:15px; line-height:1.8;">
                    <?= nl2br($profile['visi']) ?>
                </p>
            </div>
        </div>
    </div>

    <!-- MISI -->
    <div class="col-md-6 mb-4">
        <div class="card card-outline card-success shadow-sm h-100">
            <div class="card-header text-center" style="background:#f8f9fa;">
                <i class="fas fa-bullseye fa-2x text-success mb-2"></i>
                <h3 style="font-size:20px; font-weight:600;">Misi</h3>
            </div>

            <div class="card-body">
                <ul style="font-size:15px; line-height:1.8; padding-left:18px;">
                    <?php
                    $misi = explode("\n", $profile['misi']);
                    foreach ($misi as $item):
                    ?>
                    <li><?= $item ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>