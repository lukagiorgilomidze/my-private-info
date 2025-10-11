

    <!-- ჩვენი შესახებ -->
    <section class="section bg-light text-dark">
        <div class="container">
            <h2 class="text-center mb-5">ჩემ შესახებ</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= $privateinfo['image'] ?>" alt="პროფილი" class="img-fluid rounded-circle mx-auto d-block" style="width: 300px; height: 300px; object-fit: cover;">
                </div>
                <div class="col-md-6">
                    <p><?= $privateinfo['bio'] ?></p>
                    <p>GitHub: <a href="<?= $github_link ?>" target="_blank"><?= $github_link ?></a></p>
                    <div class="mt-4">
                        <i class="fab fa-github fa-2x me-3"></i>
                        <i class="fab fa-linkedin fa-2x me-3"></i>
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>