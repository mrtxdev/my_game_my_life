<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../controllers/user.controller.php';
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Game My Life | New Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container min-vh-100 d-flex align-items-center py-5">
    <div class="row w-100 justify-content-center">
      <div class="col-12 col-md-8 col-lg-5">
        <div class="d-flex align-items-center gap-3 mb-4">
          <div class="bg-black border border-secondary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
            <i class="bi bi-controller text-info fs-5"></i>
          </div>
          <div>
            <div class="fw-bold">MY GAME <span class="text-info">MY LIFE</span></div>
            <div class="text-secondary small text-uppercase" style="letter-spacing:1px">New Post</div>
          </div>
        </div>
        <?php if (auth()): ?>
          <div class="card bg-black border-secondary shadow">
            <div class="card-body p-4 p-md-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge text-bg-secondary">Novo Registro</span>
                <a href="../index.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1">
                  <i class="bi bi-arrow-left"></i>
                  Voltar
                </a>
              </div>
              <h1 class="h4 fw-bold mb-1">Adicionar jogo</h1>
              <p class="text-secondary small mb-4">Registre um novo título na sua biblioteca de jogos.</p>
              <form action="/index.php" method="POST" accept-charset="utf-8">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id'] ?? '') ?>">
                <div class="mb-3">
                  <label for="title" class="form-label small text-uppercase text-secondary">Título do Jogo</label>
                  <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary"><i class="bi bi-controller text-secondary"></i></span>
                    <input type="text" class="form-control bg-dark border-secondary text-white" id="title" name="title" placeholder="Ex: The Last of Us Part II" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label small text-uppercase text-secondary">Descrição / Comentários</label>
                  <textarea class="form-control bg-dark border-secondary text-white" id="description" name="description" rows="3" placeholder="O que você achou? Alguma observação?"></textarea>
                </div>
                <div class="mb-4">
                  <label for="status" class="form-label small text-uppercase text-secondary">Status do Jogo</label>
                  <select class="form-select bg-dark border-secondary text-white" id="status" name="status" required>
                    <option value="backlog">Backlog</option>
                    <option value="in_progress">Em Andamento</option>
                    <option value="completed">Zerado</option>
                    <option value="mastered">Platinado</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-info w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                  Salvar Jogo
                  <i class="bi bi-check-lg"></i>
                </button>
              </form>
            </div>
          </div>
        <?php else: ?>
          <div class="card bg-black border-secondary shadow">
            <div class="card-body p-4 p-md-5 text-center">
              <i class="bi bi-lock text-secondary display-4 d-block mb-3"></i>
              <h1 class="h4 fw-bold mb-2">Acesso restrito</h1>
              <p class="text-secondary mb-4">Você precisa estar logado para registrar um novo jogo.</p>
              <a href="login.view.php" class="btn btn-info fw-semibold d-inline-flex align-items-center gap-2">
                <i class="bi bi-box-arrow-in-right"></i>
                Fazer login
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>