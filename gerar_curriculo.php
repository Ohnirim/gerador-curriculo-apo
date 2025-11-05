<?php
    // --- 1. RECEBENDO OS DADOS DO FORMULÁRIO ---
    $nome = htmlspecialchars($_POST['nome'] ?? 'Nome não informado');
    $dataNascimento = $_POST['dataNascimento'] ?? '';
    $objetivo = htmlspecialchars($_POST['objetivo'] ?? '');
    
    // CAMPOS DE CONTATO
    $email = htmlspecialchars($_POST['email'] ?? '');
    $ddd = htmlspecialchars($_POST['ddd'] ?? '');
    $telefone_numero = htmlspecialchars($_POST['telefone_numero'] ?? '');
    $rua_numero = htmlspecialchars($_POST['rua_numero'] ?? '');
    $cidade = htmlspecialchars($_POST['cidade'] ?? '');
    $estado = htmlspecialchars($_POST['estado'] ?? '');

    $telefone_formatado = '';
    if (!empty($ddd) && !empty($telefone_numero)) { $telefone_formatado = "($ddd) $telefone_numero"; }
    $endereco_formatado = '';
    if (!empty($rua_numero)) { $endereco_formatado = $rua_numero; }
    if (!empty($cidade) && !empty($estado)) { $endereco_formatado .= " - " . $cidade . ", " . $estado; }
    elseif (!empty($cidade)) { $endereco_formatado .= " - " . $cidade; }
    elseif (!empty($estado)) { $endereco_formatado .= ", " . $estado; }
    
    // MUDANÇA AQUI: Arrays de Formação atualizados
    $cursos = $_POST['curso'] ?? [];
    $instituicoes = $_POST['instituicao'] ?? [];
    $formacao_conclusao = $_POST['formacao_conclusao'] ?? []; // NOVO
    
    // Arrays de Cursos
    $cursos_nome = $_POST['curso_nome'] ?? [];
    $cursos_descricao = $_POST['curso_descricao'] ?? [];
    $cursos_instituicao = $_POST['curso_instituicao'] ?? [];
    $cursos_carga_horaria = $_POST['curso_carga_horaria'] ?? [];
    
    // Arrays de Experiência
    $empresas = $_POST['empresa'] ?? [];
    $cargos = $_POST['cargo'] ?? [];
    
    // Texto de Habilidades
    $habilidades = htmlspecialchars($_POST['habilidades'] ?? '');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo de <?php echo $nome; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center mt-4 no-print">
        <p>Pronto! Este é o seu currículo gerado.</p>
        <button class="btn btn-primary" onclick="window.print();">
            Imprimir / Salvar em PDF
        </button>
    </div>

    <div class="container resume-container-topdown mt-4 mb-5">
        <div class="card shadow-sm">
            <div class="card-body p-5">

                <header class="resume-header text-center border-bottom pb-4 mb-4">
                    <h1 class="display-5 fw-bold text-uppercase"><?php echo $nome; ?></h1>
                    <?php if (!empty($dataNascimento)): ?>
                        <p class="lead fs-6 mb-3">Data de Nasc.: <?php echo date('d/m/Y', strtotime($dataNascimento)); ?></p>
                    <?php endif; ?>
                    
                    <ul class="list-unstyled d-flex flex-wrap justify-content-center contact-list-topdown m-0">
                        <?php if (!empty($telefone_formatado)): ?>
                            <li class="mx-3"><i class="bi bi-telephone-fill me-2"></i><?php echo $telefone_formatado; ?></li>
                        <?php endif; ?>
                        <?php if (!empty($email)): ?>
                            <li class="mx-3"><i class="bi bi-envelope-fill me-2"></i><?php echo $email; ?></li>
                        <?php endif; ?>
                        <?php if (!empty($endereco_formatado)): ?>
                            <li class="mx-3"><i class="bi bi-geo-alt-fill me-2"></i><?php echo $endereco_formatado; ?></li>
                        <?php endif; ?>
                    </ul>
                </header>

                <section class="resume-section mb-4">
                    <h2 class="section-title-topdown">Objetivo</h2>
                    <p class="text-secondary"><?php echo $objetivo; ?></p>
                </section>
                
                <section class="resume-section mb-4">
                    <h2 class="section-title-topdown">Formação</h2>
                    <?php
                        if (!empty($cursos)) {
                            foreach ($cursos as $indice => $curso) {
                                $instituicao = htmlspecialchars($instituicoes[$indice] ?? '');
                                $conclusao = htmlspecialchars($formacao_conclusao[$indice] ?? ''); // NOVO
                                
                                if (!empty($curso)) {
                                    echo '<div class="mb-3">';
                                    echo '  <h5 class="fw-bold mb-0">' . htmlspecialchars($curso) . '</h5>';
                                    
                                    // Linha de Instituição e Conclusão
                                    $detalhes = [];
                                    if (!empty($instituicao)) { $detalhes[] = $instituicao; }
                                    if (!empty($conclusao)) { $detalhes[] = $conclusao; }
                                    
                                    if (!empty($detalhes)) {
                                        echo '  <p class="text-secondary mb-0">' . implode(' | ', $detalhes) . '</p>';
                                    }
                                    echo '</div>';
                                }
                            }
                        } else { echo '<p>Nenhuma formação informada.</p>'; }
                    ?>
                </section>
                
                <section class="resume-section mb-4">
                    <h2 class="section-title-topdown">Cursos</h2>
                    <?php
                        if (!empty($cursos_nome)) {
                            foreach ($cursos_nome as $indice => $curso_nome) {
                                $curso_desc = htmlspecialchars($cursos_descricao[$indice] ?? '');
                                $curso_inst = htmlspecialchars($cursos_instituicao[$indice] ?? '');
                                $curso_carga = htmlspecialchars($cursos_carga_horaria[$indice] ?? '');
                                
                                if (!empty($curso_nome)) {
                                    echo '<div class="mb-3">';
                                    echo '  <h5 class="fw-bold mb-0">' . htmlspecialchars($curso_nome) . '</h5>';
                                    
                                    if (!empty($curso_desc)) {
                                        echo '  <p class="text-secondary mb-0" style="font-size: 0.95rem;">' . $curso_desc . '</p>';
                                    }
                                    
                                    $detalhes = [];
                                    if (!empty($curso_inst)) { $detalhes[] = $curso_inst; }
                                    if (!empty($curso_carga)) { $detalhes[] = $curso_carga; }
                                    if (!empty($detalhes)) {
                                        echo '  <p class="text-secondary mb-0" style="font-size: 0.9rem;">' . implode(' | ', $detalhes) . '</p>';
                                    }
                                    echo '</div>';
                                }
                            }
                        } else { echo '<p>Nenhum curso informado.</p>'; }
                    ?>
                </section>

                <section class="resume-section mb-4">
                    <h2 class="section-title-topdown">Habilidades</h2>
                    <?php if (!empty($habilidades)): ?>
                        <ul class="list-unstyled">
                            <?php
                                $listaHabilidades = explode(',', $habilidades);
                                foreach ($listaHabilidades as $habilidade) {
                                    echo '<li>' . htmlspecialchars(trim($habilidade)) . '</li>';
                                }
                            ?>
                        </ul>
                    <?php else: echo '<p>Nenhuma habilidade informada.</p>'; endif; ?>
                </section>
                <section class="resume-section">
                    <h2 class="section-title-topdown">Experiência Profissional</h2>
                    <?php
                        if (!empty($empresas)) {
                            foreach ($empresas as $indice => $empresa) {
                                $cargo = htmlspecialchars($cargos[$indice] ?? '');
                                if (!empty($empresa) || !empty($cargo)) {
                                    echo '<div class="mb-4">';
                                    echo '  <h5 class="fw-bold mb-0">' . htmlspecialchars($cargo) . '</h5>';
                                    echo '  <h6 class="text-secondary fw-normal mb-0">' . htmlspecialchars($empresa) . '</h6>';
                                    echo '</div>';
                                }
                            }
                        } else { echo '<p>Nenhuma experiência profissional informada.</p>'; }
                    ?>
                </section>

            </div>
        </div>
    </div>
</body>
</html>