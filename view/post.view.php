<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../controllers/post.user.controller.php';
require_once __DIR__ . '/../controllers/user.controller.php';
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Game My Life | Detalhes do Post</title>
	<!-- CDN Correta do Bootstrap 5.3 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- CDN Correta do Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
	<div class="container py-4">
		<header class="d-flex align-items-center gap-3 mb-4">
			<div class="bg-black border border-secondary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
				<i class="bi bi-controller text-info fs-5"></i>
			</div>
			<div>
				<div class="fw-bold">MY GAME <span class="text-info">MY LIFE</span></div>
				<div class="text-secondary small text-uppercase" style="letter-spacing:1px">Player Details</div>
			</div>
		</header>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card bg-black border-secondary mb-4">
					<div class="card-body p-4">
						<?php $post = listPost(); ?>
						<?php if ($post): ?>
							<div class="d-flex justify-content-between align-items-center mb-3">
								<span class="badge text-bg-secondary"><?= htmlspecialchars($post->status ?? '') ?></span>
								<a href="/index.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1">
									<i class="bi bi-arrow-left"></i>
									Voltar ao feed
								</a>
							</div>
							<h1 class="h3 fw-bold mb-3"><?= htmlspecialchars($post->title ?? '') ?></h1>
							<div class="text-secondary">
								<p class="mb-0"><?= nl2br(htmlspecialchars($post->description ?? '')) ?></p>
							</div>
						<?php else: ?>
							<div class="d-flex justify-content-between align-items-center mb-3">
								<span class="badge text-bg-danger">Erro 404</span>
								<a href="/index.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1">
									<i class="bi bi-arrow-left"></i>
									Voltar ao feed
								</a>
							</div>
							<h1 class="h3 fw-bold mb-2">Post não encontrado</h1>
							<p class="text-secondary mb-0">O post que você está procurando não existe ou foi removido.</p>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($post): ?>
					<div class="card bg-black border-secondary mb-4">
						<div class="card-body p-4">
							<h2 class="h5 fw-bold mb-3">Discussão // Comentários</h2>
							
							<?php if (auth()): ?>
								<form action="/view/post.view.php?id=<?= $post->id ?>" method="POST">
									<input type="hidden" name="action" value="comment">
									<input type="hidden" name="post_id" value="<?= $post->id ?>">
									<input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id'] ?? '') ?>">
									
									<div class="mb-3">
										<label for="comment" class="form-label small text-uppercase text-secondary">Novo Comentário</label>
										<textarea class="form-control bg-dark border-secondary text-white" id="comment" name="comment" rows="4" placeholder="Escreva o que achou desse post..." required></textarea>
									</div>
									<button type="submit" class="btn btn-info fw-semibold d-inline-flex align-items-center gap-2">
										Enviar comentário
										<i class="bi bi-send"></i>
									</button>
								</form>
							<?php else: ?>
								<div class="p-3 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded text-center">
									<i class="bi bi-lock text-warning fs-4 d-block mb-2"></i>
									<p class="text-secondary small mb-2">Você precisa estar logado para participar da discussão.</p>
									<a href="/view/login.view.php" class="btn btn-sm btn-outline-info fw-semibold">Fazer Login</a>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="card bg-black border-secondary">
						<div class="card-body p-4">
							<h3 class="h6 fw-bold text-uppercase text-secondary tracking-wider mb-3">Comentários da Comunidade</h3>
							<?php 
							$comments = listCommentsByPost($post->id); 
							if (!empty($comments)): 
							?>
								<div class="vstack gap-3">
									<?php foreach ($comments as $c): ?>
										<div class="p-3 bg-dark bg-opacity-50 border border-secondary border-opacity-25 rounded">
											<div class="d-flex justify-content-between align-items-center mb-1">
												<span class="fw-bold text-info small">@<?= htmlspecialchars($c->author_name ?? '') ?></span>
												<span class="text-muted font-monospace" style="font-size: 11px;"><?= htmlspecialchars($c->getFormattedDate() ?? '') ?></span>
											</div>
											<p class="text-light mb-0 small"><?= nl2br(htmlspecialchars($c->comment ?? '')) ?></p>
										</div>
									<?php endforeach; ?>
								</div>
							<?php else: ?>
								<div class="text-center py-4 text-muted">
									<i class="bi bi-chat-left-dots fs-3 d-block mb-2"></i>
									<p class="small mb-0">Nenhum comentário por aqui ainda. Seja o primeiro!</p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>