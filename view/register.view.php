<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Game My Life | Create Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container min-vh-100 d-flex align-items-center py-5">
    <div class="row w-100 justify-content-center">
      <div class="col-12 col-md-8 col-lg-5 col-xl-4">
        <div class="d-flex align-items-center gap-3 mb-4">
          <div class="bg-black border border-secondary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
            <i class="bi bi-controller text-info fs-5"></i>
          </div>
          <div>
            <div class="fw-bold">MY GAME <span class="text-info">MY LIFE</span></div>
            <div class="text-secondary small text-uppercase" style="letter-spacing:1px">Your World. Your Rules.</div>
          </div>
        </div>
        <div class="card bg-black border-secondary shadow">
          <div class="card-body p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge text-bg-secondary">Player Registration</span>
              <span class="badge text-bg-success d-flex align-items-center gap-1">
                <span class="bg-success rounded-circle d-inline-block" style="width:8px;height:8px"></span>
                Online
              </span>
            </div>
            <h1 class="h4 fw-bold mb-1">Crie seu perfil</h1>
            <p class="text-secondary small mb-4">Monte sua conta e comece a registrar suas conquistas no universo de jogos.</p>
            <form action="../controllers/user.controller.php" method="POST">
              <input type="hidden" name="action" value="register">
              <div class="mb-3">
                <label for="name" class="form-label small text-uppercase text-secondary">Player Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary"><i class="bi bi-person text-secondary"></i></span>
                  <input type="text" class="form-control bg-dark border-secondary text-white" id="name" name="name" placeholder="Seu apelido de player" autocomplete="name" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label small text-uppercase text-secondary">Email Address</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary"><i class="bi bi-envelope text-secondary"></i></span>
                  <input type="email" class="form-control bg-dark border-secondary text-white" id="email" name="email" placeholder="player@example.com" autocomplete="email" required>
                </div>
              </div>
              <div class="mb-4">
                <label for="pass" class="form-label small text-uppercase text-secondary">Password</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary"><i class="bi bi-lock text-secondary"></i></span>
                  <input type="password" class="form-control bg-dark border-secondary text-white" id="pass" name="pass" placeholder="••••••••" autocomplete="new-password" required>
                </div>
              </div>
              <button type="submit" class="btn btn-info w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                CRIAR CONTA
                <i class="bi bi-arrow-right"></i>
              </button>
            </form>
            <div class="text-center my-4">
              <span class="text-secondary small text-uppercase">Já tem uma conta?</span>
            </div>
            <p class="text-center mb-4 small">
              Já é cadastrado?
              <a href="login.view.php" class="link-info text-decoration-none fw-medium">Faça login aqui</a>
            </p>
            <div class="d-flex align-items-center justify-content-center gap-2 text-secondary small">
              <i class="bi bi-shield-lock"></i>
              <span>Conexão segura e criptografada</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>