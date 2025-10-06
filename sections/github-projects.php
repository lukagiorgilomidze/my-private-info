
<!-- პროექტები (დინამიურად GitHub-დან) -->
    <section class="section text-white">
        <div class="container">
            <h2 class="text-center mb-5">ჩემი პროექტები</h2>
            <div class="row">
                <?php if (!empty($repos)): ?>
                    <?php foreach ($repos as $repo): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card project-card text-center">
                            <img src="./assets/icon.svg" alt="<?= htmlspecialchars($repo['name']) ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($repo['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($repo['description'] ?? 'აღწერა არ არის ხელმისაწვდომი') ?></p>
                                <a href="<?= $repo['html_url'] ?>" target="_blank" class="btn btn-custom">ნახე GitHub-ზე</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>პროექტები ვერ იტვირთა. შეამოწმეთ კავშირი.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

