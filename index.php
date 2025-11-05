<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5" style="max-width: 750px;">
        <div class="card shadow-sm">
            
            <div class="card-header-color text-center p-4">
                <img src="logo.png" alt="Logo" class="logo-img mb-2">
                <h1 class="card-title h3 text-white mb-0">Gerador de Currículo</h1>
            </div>

            <div class="card-body p-4 p-md-5">
                <form action="gerar_curriculo.php" method="POST">
                    
                    <h2 class="h4 border-bottom pb-2 mt-2">Dados Pessoais</h2>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="text" class="form-control" id="idade" name="idade" readonly placeholder="(cálculo automático)">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seu.email@exemplo.com">
                    </div>
                    <div class="row">
                        <label class="form-label">Telefone / Contato:</label>
                        <div class="col-md-3 mb-3">
                            <input type="tel" class="form-control" id="ddd" name="ddd" placeholder="DDD (Ex: 45)">
                        </div>
                        <div class="col-md-9 mb-3">
                            <input type="tel" class="form-control" id="telefone_numero" name="telefone_numero" placeholder="Número (Ex: 9XXXX-XXXX)">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rua_numero" class="form-label">Rua e Número:</label>
                        <input type="text" class="form-control" id="rua_numero" name="rua_numero" placeholder="Ex: Av. Brasil, 1234">
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: Toledo">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ex: PR">
                        </div>
                    </div>
                    <h2 class="h4 border-bottom pb-2 mt-4">Objetivo</h2>
                    <div class="mb-3">
                        <label for="objetivo" class="form-label">Descreva seu objetivo profissional:</label>
                        <textarea class="form-control" id="objetivo" name="objetivo" rows="4" placeholder="Ex: Busco minha primeira oportunidade de emprego..."></textarea>
                    </div>
                    <h2 class="h4 border-bottom pb-2 mt-4">Formação</h2>
                    <div id="formacaoContainer">
                        <div class="border p-3 rounded mb-3">
                            <div class="mb-3">
                                <label class="form-label">Curso:</label>
                                <input type="text" class="form-control" name="curso[]">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Instituição:</label>
                                    <input type="text" class="form-control" name="instituicao[]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Conclusão:</label>
                                    <input type="text" class="form-control" name="formacao_conclusao[]" placeholder="Ex: 2024, Em andamento...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-success" id="addFormacao">
                        + Adicionar Formação
                    </button>
                    

                    <h2 class="h4 border-bottom pb-2 mt-4">Cursos</h2>
                    <div id="cursosContainer">
                        <div class="border p-3 rounded mb-3">
                            <div class="mb-3">
                                <label class="form-label">Nome do Curso:</label>
                                <input type="text" class="form-control" name="curso_nome[]">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição:</label>
                                <input type="text" class="form-control" name="curso_descricao[]" placeholder="Ex: Curso focado em...">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Instituição:</label>
                                    <input type="text" class="form-control" name="curso_instituicao[]" placeholder="Ex: Senac, Udemy">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Carga Horária:</label>
                                    <input type="text" class="form-control" name="curso_carga_horaria[]" placeholder="Ex: 40 horas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-success" id="addCurso">
                        + Adicionar Curso
                    </button>
                    <h2 class="h4 border-bottom pb-2 mt-4">Experiências Profissionais</h2>
                    <div id="experienciasContainer">
                        <div class="border p-3 rounded mb-3">
                            <div class="mb-3">
                                <label class="form-label">Empresa:</label>
                                <input type="text" class="form-control" name="empresa[]">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo[]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-success" id="addExperiencia">
                        + Adicionar Experiência
                    </button>
                    <h2 class="h4 border-bottom pb-2 mt-4">Habilidades</h2>
                    <div class="mb-3">
                        <label for="habilidades" class="form-label">Liste suas habilidades (separadas por vírgula):</label>
                        <textarea class="form-control" id="habilidades" name="habilidades" rows="4" placeholder="Ex: PHP, JavaScript, Trabalho em Equipe, ..."></textarea>
                    </div>
                    <div class="d-grid mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Gerar Currículo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>