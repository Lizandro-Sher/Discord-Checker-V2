<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nitro Suite | barbosa.dev</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --secondary-dark: #7c3aed;
            --dark-1: #0f172a;
            --dark-2: #1e293b;
            --dark-3: #334155;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --valid: #10b981;
            --invalid: #ef4444;
            --error: #f59e0b;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--dark-1);
            color: var(--text-primary);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 300px;
            overflow-x: hidden;
            position: relative;
        }

        /* Efeito de bolhas animadas */
        .bubbles {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0.5;
            animation: rise 15s infinite ease-in;
        }

        .bubble:nth-child(1) {
            width: 40px;
            height: 40px;
            left: 10%;
            animation-duration: 8s;
            background: var(--primary);
        }

        .bubble:nth-child(2) {
            width: 20px;
            height: 20px;
            left: 20%;
            animation-duration: 5s;
            animation-delay: 1s;
            background: var(--secondary);
        }

        .bubble:nth-child(3) {
            width: 50px;
            height: 50px;
            left: 35%;
            animation-duration: 7s;
            animation-delay: 2s;
            background: var(--error);
        }

        .bubble:nth-child(4) {
            width: 80px;
            height: 80px;
            left: 50%;
            animation-duration: 11s;
            animation-delay: 0s;
            background: var(--invalid);
        }

        .bubble:nth-child(5) {
            width: 35px;
            height: 35px;
            left: 55%;
            animation-duration: 6s;
            animation-delay: 1s;
            background: var(--primary);
        }

        .bubble:nth-child(6) {
            width: 45px;
            height: 45px;
            left: 65%;
            animation-duration: 8s;
            animation-delay: 3s;
            background: var(--secondary);
        }

        .bubble:nth-child(7) {
            width: 25px;
            height: 25px;
            left: 75%;
            animation-duration: 7s;
            animation-delay: 2s;
            background: var(--error);
        }

        .bubble:nth-child(8) {
            width: 80px;
            height: 80px;
            left: 80%;
            animation-duration: 6s;
            animation-delay: 1s;
            background: var(--invalid);
        }

        @keyframes rise {
            0% {
                bottom: -100px;
                transform: translateX(0);
            }
            50% {
                transform: translateX(100px);
            }
            100% {
                bottom: 1080px;
                transform: translateX(-200px);
            }
        }

        .main-panel {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .control-card {
            background: rgba(30, 41, 59, 0.7);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .control-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: rgba(99, 102, 241, 0.4);
        }

        .control-card h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .input-group {
            margin: 1.5rem 0;
            position: relative;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            background: rgba(51, 65, 85, 0.5);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.2s ease;
            outline: none;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }

        button {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 1rem;
            box-shadow: var(--card-shadow);
        }

        button:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary-dark));
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        button:disabled {
            background: var(--dark-3);
            cursor: not-allowed;
            opacity: 0.7;
            transform: none !important;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .stat-card {
            background: rgba(30, 41, 59, 0.7);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .stat-card.active {
            background: rgba(51, 65, 85, 0.7);
            border-color: var(--primary);
        }

        .stat-card i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .stat-card p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .eye-toggle {
            position: absolute;
            top: 12px;
            right: 12px;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.3);
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .eye-toggle:hover {
            color: var(--primary);
            background: rgba(99, 102, 241, 0.1);
        }

        .stat-card.active .eye-toggle {
            color: var(--primary);
        }

        .result-item {
            background: rgba(30, 41, 59, 0.7);
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            animation: slideIn 0.3s ease;
            display: none;
            border-left: 3px solid var(--primary);
            box-shadow: var(--card-shadow);
            transition: all 0.2s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .result-item:hover {
            transform: translateX(3px);
        }

        .result-item.visible {
            display: block;
        }

        .result-item.valid {
            border-left-color: var(--valid);
        }

        .result-item.invalid {
            border-left-color: var(--invalid);
        }

        .result-item.error {
            border-left-color: var(--error);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .results-panel {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
            padding: 1.5rem;
            flex: 1;
            background: rgba(30, 41, 59, 0.7);
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .results-header h3 {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .credits {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            opacity: 0.7;
            font-size: 0.9rem;
            background: rgba(30, 41, 59, 0.7);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.2s ease;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .credits:hover {
            opacity: 1;
            background: rgba(51, 65, 85, 0.7);
        }

        .proxy-info {
            position: fixed;
            bottom: 1rem;
            left: 1rem;
            background: rgba(30, 41, 59, 0.7);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        /* Progress bar styles */
        .progress-container {
            width: 100%;
            background-color: rgba(51, 65, 85, 0.5);
            border-radius: 8px;
            margin: 1rem 0;
            overflow: hidden;
        }

        .progress-bar {
            height: 10px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            width: 0%;
            border-radius: 8px;
            transition: width 0.3s ease;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
        }

        /* Stop button styles */
        .stop-btn {
            background: linear-gradient(135deg, #ef4444, #f59e0b);
            margin-top: 10px;
        }

        .stop-btn:hover {
            background: linear-gradient(135deg, #dc2626, #d97706);
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        @media (max-width: 768px) {
            body {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .results-panel {
                margin-top: 2rem;
                border-left: none;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-card h3 {
                font-size: 1.5rem;
            }

            .proxy-info {
                position: static;
                margin-top: 1rem;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Efeito de bolhas animadas -->
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <main class="main-panel">
        <div class="control-card">
            <h2><i class="mdi mdi-rocket" style="color: var(--primary)"></i> Gerador Automático</h2>
            <div class="input-group">
                <input type="number" id="qtd" min="1" max="100" value="5" placeholder="Quantidade de códigos">
            </div>
            
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
                <div class="progress-info">
                    <span id="progressText">0%</span>
                    <span id="progressCount">0/0</span>
                </div>
            </div>
            
            <div class="button-group">
                <button id="generateBtn">
                    <i class="mdi mdi-play"></i>
                    Iniciar Processo
                </button>
                <button id="stopBtn" class="stop-btn" disabled>
                    <i class="mdi mdi-stop"></i>
                    Parar Processo
                </button>
            </div>
        </div>

        <div class="control-card">
            <h2><i class="mdi mdi-magnify" style="color: var(--secondary)"></i> Verificação Manual</h2>
            <div class="input-group">
                <input type="text" id="codigoManual" placeholder="Insira o código manualmente">
            </div>
            <button id="manualCheckBtn">
                <i class="mdi mdi-shield-check"></i>
                Verificar Código
            </button>
        </div>

        <div class="stats-grid">
            <div class="stat-card" id="validos-card" data-filter="valid">
                <i class="mdi mdi-check-circle" style="color: var(--valid)"></i>
                <h3 id="validos">0</h3>
                <p>Válidos</p>
                <i class="mdi mdi-eye eye-toggle" id="eye-valid"></i>
            </div>
            <div class="stat-card" id="invalidos-card" data-filter="invalid">
                <i class="mdi mdi-alert-circle" style="color: var(--invalid)"></i>
                <h3 id="invalidos">0</h3>
                <p>Inválidos</p>
                <i class="mdi mdi-eye eye-toggle" id="eye-invalid"></i>
            </div>
            <div class="stat-card" id="erros-card" data-filter="error">
                <i class="mdi mdi-close-circle" style="color: var(--error)"></i>
                <h3 id="erros">0</h3>
                <p>Erros</p>
                <i class="mdi mdi-eye eye-toggle" id="eye-error"></i>
            </div>
        </div>
    </main>

    <aside class="results-panel">
        <div class="results-header">
            <h3><i class="mdi mdi-text-box-multiple"></i> Resultados</h3>
        </div>
        <div id="saida"></div>
    </aside>

    <div class="proxy-info">
        <i class="mdi mdi-server-network"></i>
        <span id="proxyInfo">Carregando proxies...</span>
    </div>

    <div class="credits">
        Desenvolvido por <strong>barbosa.dev</strong>
    </div>

    <script>
        // Variáveis de estado
        let activeFilter = null;
        let resultados = [];
        let filterStates = {
            valid: true,
            invalid: true,
            error: true
        };
        
        // Variáveis de controle
        let isChecking = false;
        let stopRequested = false;
        let totalChecks = 0;
        let completedChecks = 0;
        
        // Elementos DOM
        const saida = document.getElementById("saida");
        const validos = document.getElementById("validos");
        const invalidos = document.getElementById("invalidos");
        const erros = document.getElementById("erros");
        const proxyInfo = document.getElementById("proxyInfo");
        const statCards = document.querySelectorAll('.stat-card');
        const eyeIcons = {
            valid: document.getElementById("eye-valid"),
            invalid: document.getElementById("eye-invalid"),
            error: document.getElementById("eye-error")
        };
        const progressBar = document.getElementById("progressBar");
        const progressText = document.getElementById("progressText");
        const progressCount = document.getElementById("progressCount");
        const generateBtn = document.getElementById("generateBtn");
        const stopBtn = document.getElementById("stopBtn");
        const manualCheckBtn = document.getElementById("manualCheckBtn");

        // Função para atualizar a barra de progresso
        function updateProgress() {
            const progress = totalChecks > 0 ? Math.round((completedChecks / totalChecks) * 100) : 0;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${progress}%`;
            progressCount.textContent = `${completedChecks}/${totalChecks}`;
        }

        // Função para alternar ícones do olho
        function toggleEyeIcon(filterType, state) {
            eyeIcons[filterType].className = state ? 
                "mdi mdi-eye eye-toggle" : 
                "mdi mdi-eye-off eye-toggle";
        }

        // Função para atualizar a exibição dos resultados
        function updateResultsDisplay() {
            const allResults = document.querySelectorAll('.result-item');
            allResults.forEach(item => {
                const type = item.dataset.type;
                item.style.display = filterStates[type] ? 'block' : 'none';
            });
        }

        // Função para alternar filtro
        function toggleFilter(filterType) {
            filterStates[filterType] = !filterStates[filterType];
            toggleEyeIcon(filterType, filterStates[filterType]);
            updateResultsDisplay();
            
            // Atualiza estado do card
            const card = document.getElementById(`${filterType}s-card`);
            if (Object.values(filterStates).every(v => v)) {
                card.classList.remove('active');
            } else if (!filterStates[filterType]) {
                card.classList.add('active');
            } else {
                card.classList.remove('active');
            }
        }

        // Adiciona eventos de clique aos ícones de olho
        Object.keys(eyeIcons).forEach(type => {
            eyeIcons[type].addEventListener('click', (e) => {
                e.stopPropagation(); // Impede que o evento chegue ao card
                toggleFilter(type);
            });
        });

        // Adiciona eventos de clique aos cards (para o caso de clicar fora do olho)
        statCards.forEach(card => {
            card.addEventListener('click', () => {
                const filterType = card.dataset.filter;
                toggleFilter(filterType);
            });
        });

        // Função para criar elementos de resultado estilizados
        function createResultEntry(code, response, proxy = "") {
            const item = document.createElement('div');
            item.className = 'result-item';
            
            // Determina o tipo de resultado
            let resultType = '';
            let statusIcon = 'mdi-alert';
            let statusColor = 'var(--error)';
            
            if (response.includes("✅")) {
                resultType = 'valid';
                statusIcon = 'mdi-check';
                statusColor = 'var(--valid)';
            } else if (response.includes("❌") && response.includes("inválido")) {
                resultType = 'invalid';
                statusIcon = 'mdi-close';
                statusColor = 'var(--invalid)';
            } else {
                resultType = 'error';
                statusIcon = 'mdi-alert';
                statusColor = 'var(--error)';
            }

            // Adiciona informação do proxy se disponível
            const proxyInfo = proxy ? `<div style="margin-top: 5px; font-size: 0.7em; color: var(--text-secondary);">Proxy: ${proxy}</div>` : '';

            item.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                    <i class="mdi ${statusIcon}" style="color: ${statusColor}; font-size: 1.2em;"></i>
                    <strong>${code}</strong>
                </div>
                <div style="color: ${statusColor}; font-size: 0.9em;">${response}</div>
                ${proxyInfo}
                <div style="margin-top: 8px; font-size: 0.8em; color: var(--text-secondary);">
                    ${new Date().toLocaleTimeString()}
                </div>
            `;

            // Adiciona classe de tipo e armazena data attribute
            item.classList.add(resultType);
            item.dataset.type = resultType;
            
            // Aplica o filtro atual
            item.style.display = filterStates[resultType] ? 'block' : 'none';
            
            return item;
        }

        let proxies = [];
        let currentProxyIndex = 0;

        async function carregarProxies() {
            try {
                const response = await fetch('proxy.txt');
                const text = await response.text();
                proxies = text.trim().split('\n').map(p => p.trim()).filter(p => p);
                currentProxyIndex = 0;
                
                // Atualiza o display do proxy
                if (proxies.length > 0) {
                    proxyInfo.textContent = `Proxy ativo: ${proxies[0]}`;
                } else {
                    proxyInfo.textContent = "Nenhum proxy disponível";
                }
            } catch (e) {
                console.error("Erro ao carregar proxies:", e);
                proxies = [];
                proxyInfo.textContent = "Erro ao carregar proxies";
            }
        }

        function obterProxyAtual() {
            if (proxies.length === 0) return '';
            return proxies[currentProxyIndex % proxies.length];
        }

        function proximoProxy() {
            if (proxies.length === 0) return;
            
            currentProxyIndex = (currentProxyIndex + 1) % proxies.length;
            proxyInfo.textContent = `Proxy ativo: ${proxies[currentProxyIndex]}`;
            
            // Efeito visual ao trocar de proxy
            proxyInfo.style.transform = "scale(1.05)";
            setTimeout(() => {
                proxyInfo.style.transform = "scale(1)";
            }, 300);
        }

        async function testarCodigo(code) {
            let tentativas = 0;
            let sucesso = false;
            let resultado = "";

            while (tentativas < proxies.length && !sucesso && !stopRequested) {
                const proxy = obterProxyAtual();
                try {
                    const response = await fetch('dcchecker.php?lista=' + encodeURIComponent(code) + '&proxy=' + encodeURIComponent(proxy));
                    const text = await response.text();

                    if (text.includes("❌ Código de gift inválido")) {
                        resultado = text;
                        const resultEntry = createResultEntry(code, text, proxy);
                        saida.prepend(resultEntry);
                        atualizarContadores("invalido");
                        sucesso = true;
                    } else if (text.includes("✅ Código válido")) {
                        resultado = text;
                        const resultEntry = createResultEntry(code, text, proxy);
                        saida.prepend(resultEntry);
                        atualizarContadores("valido");
                        sucesso = true;
                    } else if (text.includes("⚠️") || text.includes("❌ Proxy") || text.includes("🚫")) {
                        throw new Error("Erro com proxy");
                    } else {
                        resultado = text;
                        const resultEntry = createResultEntry(code, text, proxy);
                        saida.prepend(resultEntry);
                        atualizarContadores("erro");
                        sucesso = true;
                    }

                } catch (error) {
                    // Mostra o erro do proxy na interface
                    const errorEntry = createResultEntry(code, `⚠️ Falha no proxy: ${proxy}`, proxy);
                    saida.prepend(errorEntry);
                    atualizarContadores("erro");
                    
                    proximoProxy();
                    tentativas++;
                    await new Promise(r => setTimeout(r, 500)); // Pequeno delay entre tentativas
                }
            }

            if (!sucesso && !stopRequested) {
                const resultEntry = createResultEntry(code, "⚠️ Todos os proxies falharam.");
                saida.prepend(resultEntry);
                atualizarContadores("erro");
            }

            // Atualiza progresso
            completedChecks++;
            updateProgress();

            return resultado;
        }

        function atualizarContadores(tipo) {
            const counterMap = {
                valido: validos,
                invalido: invalidos,
                erro: erros
            };
            
            if (counterMap[tipo]) {
                const elemento = counterMap[tipo];
                const valorAtual = parseInt(elemento.textContent);
                elemento.textContent = valorAtual + 1;
                
                // Efeito visual ao atualizar
                elemento.style.transform = "scale(1.2)";
                setTimeout(() => {
                    elemento.style.transform = "scale(1)";
                }, 300);
            }
        }

        function gerarCodigoAleatorio() {
            return Array.from({length: 16}, () =>
                'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
                [Math.floor(Math.random() * 62)]).join('');
        }

        // Função para parar o processo
        function stopProcess() {
            stopRequested = true;
            isChecking = false;
            
            // Atualiza UI
            generateBtn.disabled = false;
            manualCheckBtn.disabled = false;
            stopBtn.disabled = true;
            
            generateBtn.innerHTML = `<i class="mdi mdi-play"></i> Iniciar Processo`;
            
            // Mostra mensagem
            const resultEntry = createResultEntry("SYSTEM", "⚠️ Processo interrompido pelo usuário");
            saida.prepend(resultEntry);
        }

        // Event listeners
        generateBtn.addEventListener("click", async (e) => {
            e.preventDefault();
            
            if (isChecking) return;
            
            await carregarProxies();
            stopRequested = false;

            const qtd = parseInt(document.getElementById("qtd").value);
            if (isNaN(qtd) || qtd < 1 || qtd > 600) {
                alert("Calma ai seu macaco isso é limitado >:(");
                return;
            }

            // Configura estado
            isChecking = true;
            totalChecks = qtd;
            completedChecks = 0;
            updateProgress();
            
            // Atualiza UI
            generateBtn.disabled = true;
            manualCheckBtn.disabled = true;
            stopBtn.disabled = false;
            
            generateBtn.innerHTML = `<i class="mdi mdi-loading mdi-spin"></i> Processando...`;

            for (let i = 0; i < qtd && !stopRequested; i++) {
                await testarCodigo(gerarCodigoAleatorio());
                await new Promise(r => setTimeout(r, 800));
            }

            // Finaliza processo
            isChecking = false;
            generateBtn.disabled = false;
            manualCheckBtn.disabled = false;
            stopBtn.disabled = true;
            
            generateBtn.innerHTML = `<i class="mdi mdi-play"></i> Iniciar Processo`;
            
            if (!stopRequested) {
                const resultEntry = createResultEntry("SYSTEM", "✅ Processo concluído com sucesso");
                saida.prepend(resultEntry);
            }
        });

        stopBtn.addEventListener("click", stopProcess);

        manualCheckBtn.addEventListener("click", async (e) => {
            e.preventDefault();
            const code = document.getElementById("codigoManual").value.trim();
            if (code) {
                const btn = e.target;
                const originalText = btn.innerHTML;
                btn.innerHTML = `<i class="mdi mdi-loading mdi-spin"></i> Verificando...`;
                btn.disabled = true;
                generateBtn.disabled = true;

                await carregarProxies();
                await testarCodigo(code);
                
                btn.innerHTML = originalText;
                btn.disabled = false;
                generateBtn.disabled = false;
                document.getElementById("codigoManual").value = "";
            }
        });

        // Inicializa os ícones dos olhos
        Object.keys(filterStates).forEach(type => {
            toggleEyeIcon(type, filterStates[type]);
        });
        
        // Carrega os proxies ao iniciar
        carregarProxies();
    </script>
</body>
</html>