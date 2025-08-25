// Visionário Painel de Desempenho — insights em tempo real
document.addEventListener('DOMContentLoaded', () => {
  const lang = document.documentElement.lang || 'pt-BR';

  const i18n = {
    'pt-BR': {
      loadTime: 'Tempo de carregamento:',
      memory: 'Memória usada:',
      nodes: 'Elementos na página:',
    },
    'en-GB': {
      loadTime: 'Load time:',
      memory: 'Memory used:',
      nodes: 'DOM nodes:',
    }
  };

  const labels = i18n[lang] || i18n['en-GB'];

  const panel = document.createElement('div');
  panel.className = 'performance-panel';
  panel.setAttribute('aria-label', 'Desempenho');

  const loadTime = performance.now().toFixed(2);
  const memory = window.performance.memory?.usedJSHeapSize || 0;
  const nodes = document.querySelectorAll('*').length;

  panel.innerHTML = `
    <strong>${labels.loadTime}</strong> ${loadTime} ms<br>
    <strong>${labels.memory}</strong> ${Math.round(memory / 1024 / 1024)} MB<br>
    <strong>${labels.nodes}</strong> ${nodes}
  `;

  document.body.appendChild(panel);
});
