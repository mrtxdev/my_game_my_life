<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Game My Life | Player Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container min-vh-100 d-flex align-items-center py-5">
    <div class="row w-100 justify-content-center g-4 g-lg-5">
      <div class="col-12 col-lg-5">
        <div class="d-flex flex-column justify-content-center h-100">
          <div class="d-flex align-items-center gap-3 mb-4">
            <div class="bg-black border border-secondary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
              <i class="bi bi-controller text-info fs-5"></i>
            </div>
            <div>
              <div class="fw-bold">MY GAME <span class="text-info">MY LIFE</span></div>
              <div class="text-secondary small text-uppercase" style="letter-spacing:1px">Your World. Your Rules.</div>
            </div>
          </div>
          <div class="text-info small text-uppercase mb-2 fw-semibold">Acesso Exclusivo</div>
          <h1 class="display-5 fw-bold mb-3">EVERY GAME.<br><span class="text-info">ONE LIFE.</span></h1>
          <p class="text-secondary mb-4">Sua jornada, suas conquistas e seu universo de jogos reunidos em um só lugar. Entre e continue de onde parou.</p>
          <div class="bg-black border border-secondary rounded-4 p-4 text-center">
            <i class="bi bi-controller display-1 text-info opacity-75"></i>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <span class="text-secondary small text-uppercase">Player Hub // Secure Portal</span>
              <span class="badge text-bg-success d-flex align-items-center gap-1">
                <span class="bg-success rounded-circle d-inline-block" style="width:8px;height:8px"></span>
                ONLINE
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5 col-xl-4">
        <div class="card bg-black border-secondary shadow">
          <div class="card-body p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge text-bg-secondary">Identificação</span>
              <span class="text-secondary small font-monospace">v2.1</span>
            </div>
            <h2 class="h4 fw-bold mb-1">Bem-vindo de volta</h2>
            <p class="text-secondary small mb-4">Entre com suas credenciais para acessar sua conta.</p>
            <form action="../controllers/user.controller.php" method="POST">
              <input type="hidden" name="action" value="login">
              <div class="mb-3">
                <label for="email" class="form-label small text-uppercase text-secondary">E-mail</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary"><i class="bi bi-envelope text-secondary"></i></span>
                  <input type="email" class="form-control bg-dark border-secondary text-white" id="email" name="email" placeholder="player@example.com" autocomplete="email" required>
                </div>
              </div>
              <div class="mb-4">
                <label for="pass" class="form-label small text-uppercase text-secondary">Senha</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary"><i class="bi bi-lock text-secondary"></i></span>
                  <input type="password" class="form-control bg-dark border-secondary text-white" id="pass" name="pass" placeholder="••••••••" autocomplete="current-password" required>
                </div>
              </div>
              <button type="submit" class="btn btn-info w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                ENTRAR NO JOGO
                <i class="bi bi-arrow-right"></i>
              </button>
            </form>
            <div class="text-center my-4">
              <span class="text-secondary small text-uppercase">Novo por aqui?</span>
            </div>
            <p class="text-center mb-0 small">
              Não tem uma conta?
              <a href="register.view.php" class="link-info text-decoration-none fw-medium">Criar conta agora</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>