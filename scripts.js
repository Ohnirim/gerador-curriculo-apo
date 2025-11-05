document.addEventListener('DOMContentLoaded', function() {

    // --- CÁLCULO AUTOMÁTICO DE IDADE ---
    // (O código de Cálculo de Idade continua o mesmo)
    const campoDataNascimento = document.getElementById('dataNascimento');
    const campoIdade = document.getElementById('idade');
    campoDataNascimento.addEventListener('change', function() {
        if (this.value) {
            const dataNasc = new Date(this.value);
            const hoje = new Date();
            let idade = hoje.getFullYear() - dataNasc.getFullYear();
            const mes = hoje.getMonth() - dataNasc.getMonth();
            if (mes < 0 || (mes === 0 && hoje.getDate() < dataNasc.getDate())) {
                idade--;
            }
            campoIdade.value = idade + " anos";
        }
    });

    // --- ADICIONAR FORMAÇÃO (MODIFICADO) ---
    const btnAddFormacao = document.getElementById('addFormacao');
    const containerFormacao = document.getElementById('formacaoContainer');

    btnAddFormacao.addEventListener('click', function() {
        const novoCampo = document.createElement('div');
        novoCampo.className = 'border p-3 rounded mb-3';
        
        // MUDANÇA AQUI: Template do innerHTML atualizado
        novoCampo.innerHTML = `
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
        `;
        // Fim da Mudança

        containerFormacao.appendChild(novoCampo);
    });
    
    // --- ADICIONAR CURSO ---
    // (O código de Adicionar Curso continua o mesmo)
    const btnAddCurso = document.getElementById('addCurso');
    const containerCursos = document.getElementById('cursosContainer');
    btnAddCurso.addEventListener('click', function() {
        const novoCampo = document.createElement('div');
        novoCampo.className = 'border p-3 rounded mb-3';
        novoCampo.innerHTML = `
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
        `;
        containerCursos.appendChild(novoCampo);
    });

    // --- ADICIONAR EXPERIÊNCIA ---
    // (O código de Adicionar Experiência continua o mesmo)
    const btnAddExperiencia = document.getElementById('addExperiencia');
    const containerExperiencias = document.getElementById('experienciasContainer');
    btnAddExperiencia.addEventListener('click', function() {
        const novoCampo = document.createElement('div');
        novoCampo.className = 'border p-3 rounded mb-3';
        novoCampo.innerHTML = `
            <div class="mb-3">
                <label class="form-label">Empresa:</label>
                <input type="text" class="form-control" name="empresa[]">
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo:</label>
                <input type="text" class="form-control" name="cargo[]">
            </div>
        `;
        containerExperiencias.appendChild(novoCampo);
    });

    // --- MÁSCARA DE TELEFONE ---
    // (O código da Máscara de Telefone continua o mesmo)
    const campoTelefone = document.getElementById('telefone_numero');
    campoTelefone.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, '');
        valor = valor.substring(0, 9);
        let valorFormatado = '';
        if (valor.length > 5) {
            valorFormatado = `${valor.substring(0, 1)} ${valor.substring(1, 5)}-${valor.substring(5, 9)}`;
        } else if (valor.length > 1) {
            valorFormatado = `${valor.substring(0, 1)} ${valor.substring(1, 5)}`;
        } else if (valor.length > 0) {
            valorFormatado = valor;
        }
        e.target.value = valorFormatado;
    });

});