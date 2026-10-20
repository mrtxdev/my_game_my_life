<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/controllers/post.controller.php';
require_once __DIR__ . '/controllers/user.controller.php';
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Game My Life | Player Feed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container py-4">
    <header class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
      <div class="d-flex align-items-center justify-content-between w-100 flex-wrap gap-3">
        <div class="d-flex align-items-center gap-3">
          <div class="bg-black border border-secondary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
            <i class="bi bi-controller text-info fs-5"></i>
          </div>
          <div>
            <div class="fw-bold">MY GAME <span class="text-info">MY LIFE</span></div>
            <div class="text-secondary small text-uppercase" style="letter-spacing:1px">Player Feed</div>
          </div>
        </div>
        <div class="d-flex align-items-center gap-3 flex-grow-1 flex-md-grow-0 justify-content-end">
          <form action="/index.php" method="GET" class="w-100" style="max-width:320px">
            <div class="input-group">
              <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search text-secondary"></i></span>
              <input type="text" class="form-control bg-dark border-secondary text-white" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" placeholder="Pesquisar posts..." autocomplete="off">
            </div>
          </form>
          <?php if (auth()): ?>
            <div class="d-flex align-items-center gap-2">
              <span class="text-secondary small d-none d-sm-inline font-monospace">@<?= htmlspecialchars($_SESSION['name'] ?? '') ?></span>
            
              <form action="/controllers/user.controller.php" method="POST" class="m-0">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1">
                  <i class="bi bi-box-arrow-right"></i> Sair
                </button>
              </form>
            </div>
          <?php else: ?>
            <a href="/view/login.view.php" class="btn btn-info btn-sm fw-semibold d-flex align-items-center gap-1">
              <i class="bi bi-box-arrow-in-right"></i> Entrar
            </a>
          <?php endif; ?>
        </div>
      </div>
    </header>
    <section class="mb-4 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
      <div>
        <h1 class="h3 fw-bold mb-1">Bem-vindo ao <span class="text-info">My Game My Life</span></h1>
        <p class="text-secondary mb-0">Acompanhe as publicações, status e discussões do universo gamer.</p>
      </div>
      <?php if (auth()): ?>
        <a href="/view/newpost.view.php" class="btn btn-outline-info d-inline-flex align-items-center gap-2">
          <i class="bi bi-plus-circle"></i>
          Adicionar jogo
        </a>
      <?php endif; ?>
    </section>
    <section>
      <?php if (!empty($posts)): ?>
        <div class="row g-3">
          <?php foreach ($posts as $post): ?>
            <div class="col-12 col-md-6 col-lg-4">
              <article class="card bg-black border-secondary h-100">
                <div class="card-body d-flex flex-column">
                  <div class="mb-2">
                    <span class="badge text-bg-secondary"><?= htmlspecialchars($post->status ?? '') ?></span>
                  </div>
                  <h2 class="h5 fw-bold mb-2"><?= htmlspecialchars($post->title ?? '') ?></h2>
                  <p class="text-secondary small flex-grow-1 mb-3"><?= htmlspecialchars($post->description ?? '') ?></p>
                  <a href="/view/post.view.php?id=<?= $post->id ?>" class="btn btn-outline-info btn-sm d-inline-flex align-items-center gap-1 align-self-start">
                    Comentar
                    <i class="bi bi-chevron-right"></i>
                  </a>
                </div>
              </article>
            </div>
          <?php endforeach ?>
        </div>
      <?php else: ?>
        <div class="text-center py-5">
          <i class="bi bi-inbox text-secondary display-4 d-block mb-3"></i>
          <p class="text-secondary mb-0">Nenhum post encontrado no momento.</p>
        </div>
      <?php endif; ?>
    </section>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>