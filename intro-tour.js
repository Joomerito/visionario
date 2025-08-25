// Visionário Tour Guiado — Onboarding para iniciantes
document.addEventListener('DOMContentLoaded', () => {
  const lang = document.documentElement.lang || 'pt-BR';

  const i18n = {
    'pt-BR': {
      welcome: 'Bem-vindo ao Visionário!',
      step1: 'Aqui você pode configurar cores, fontes e acessibilidade.',
      step2: 'Explore os layouts disponíveis e personalize sua experiência.',
      done: 'Pronto! Seu site está elegante e acessível.',
    },
    'en-GB': {
      welcome: 'Welcome to Visionário!',
      step1: 'Here you can configure colors, fonts, and accessibility.',
      step2: 'Explore available layouts and personalize your experience.',
      done: 'All set! Your site is elegant and accessible.',
    }
  };

  const tour = i18n[lang] || i18n['en-GB'];

  const steps = [tour.welcome, tour.step1, tour.step2, tour.done];
  let current = 0;

  const tourBox = document.createElement('div');
  tourBox.className = 'tour-box';
  tourBox.setAttribute('role', 'dialog');
  tourBox.setAttribute('aria-label', 'Tour');

  const nextStep = () => {
    if (current < steps.length) {
      tourBox.textContent = steps[current++];
      setTimeout(nextStep, 3000);
    } else {
      tourBox.remove();
    }
  };

  document.body.appendChild(tourBox);
  nextStep();
});
