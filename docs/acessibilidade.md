# Acessibilidade no Template Visionário

O Visionário foi projetado com foco em inclusão digital, garantindo que pessoas com diferentes habilidades possam navegar, interagir e compreender o conteúdo com autonomia.

## ✅ Recursos nativos

- **Foco visível**: contorno destacado ao navegar com teclado (`Tab`)
- **Funções ARIA**: `role="main"`, `role="banner"`, `aria-label` para leitores de tela
- **Contraste adequado**: cores testadas para legibilidade
- **Navegação sem mouse**: todos os elementos interativos são acessíveis via teclado
- **Mensagens assistivas**: suporte a `aria-live` para alertas e feedback

## ⚙️ Parâmetros no backend

No painel administrativo, você pode ativar:

- `Foco Visível`: melhora a navegação por teclado
- `Funções ARIA`: adiciona semântica para tecnologias assistivas

## 🧪 Testes recomendados

- Use o [Lighthouse](https://developer.chrome.com/docs/lighthouse/accessibility/) para verificar acessibilidade
- Teste com leitores de tela como NVDA ou VoiceOver
- Navegue sem mouse para validar foco e interação

## 📚 Referências

- [WCAG 2.1](https://www.w3.org/WAI/WCAG21/quickref/)
- [Acessibilidade no Joomla](https://docs.joomla.org/Accessibility)
