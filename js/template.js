// Visionário Template JS — Leve, sem jQuery, com IA assistiva
document.addEventListener('DOMContentLoaded', () => {
  const lang = document.documentElement.lang || 'pt-BR';

  const i18n = {
    'pt-BR': {
      focusTip: 'Use Tab para navegar com foco visível.',
      aiGreeting: 'Olá! Precisa de ajuda para encontrar algo?',
    },
    'en-GB': {
      focusTip: 'Use Tab to navigate with visible focus.',
      aiGreeting: 'Hello! Need help finding something?',
    }
  };

  const messages = i18n[lang] || i18n['en-GB'];

  // IA assistiva simples
  const aiHelper = document.createElement('div');
  aiHelper.setAttribute('aria-live', 'polite');
  aiHelper.className = 'ai-helper';
  aiHelper.textContent = messages.aiGreeting;
  document.body.appendChild(aiHelper);

  // Foco visível
  document.body.addEventListener('keydown', e => {
    if (e.key === 'Tab') {
      document.body.classList.add('focus-visible');
      console.log(messages.focusTip);
    }
  });
});
