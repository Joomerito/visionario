# Visionário — Política de Segurança

A segurança dos usuários e colaboradores do Visionário é prioridade. Este documento orienta como relatar vulnerabilidades e contribuir para um ambiente seguro.

## 🛡️ Relatar vulnerabilidades

Se você encontrar uma falha de segurança, por favor:

1. **Não abra uma issue pública.**
2. Envie um e-mail para: djanael@gmail.com
3. Inclua detalhes técnicos e passos para reproduzir o problema.
4. Aguarde resposta em até 72 horas.

## 🔍 Escopo de segurança

Inclui:
- Injeção de código (XSS, SQLi)
- Quebra de autenticação
- Exposição de dados sensíveis
- Problemas de acessibilidade que afetam navegação segura

Não inclui:
- Bugs visuais ou de layout
- Sugestões de melhoria não relacionadas à segurança

## 🧪 Boas práticas recomendadas

- Use `HTMLHelper::_('form.token')` em todos os formulários
- Valide entradas do usuário no backend
- Evite dependências externas sem verificação de integridade
- Teste com navegadores e leitores de tela

## 🤝 Reconhecimento

Contribuições significativas de segurança serão reconhecidas publicamente (com consentimento) no `CHANGELOG.md`.

Obrigado por ajudar a manter o Visionário seguro e confiável.
