# Internacionalização no Template Visionário

O Visionário oferece suporte completo à internacionalização (i18n), permitindo que seu site seja acessado em múltiplos idiomas com consistência e elegância.

## 🗣️ Idiomas suportados

- Português do Brasil (`pt-BR`)
- Inglês Britânico (`en-GB`)
- Suporte a RTL (direção de texto da direita para a esquerda)

## 📁 Estrutura de arquivos

language/ ├── pt-BR/ │ ├── pt-BR.tpl_visionario.ini │ └── pt-BR.tpl_visionario.sys.ini ├── en-GB/ │ ├── en-GB.tpl_visionario.ini │ └── en-GB.tpl_visionario.sys.ini

## 🧠 Boas práticas

- Use `Text::_('CONSTANTE')` em todos os arquivos PHP
- Evite textos fixos em HTML — prefira constantes traduzíveis
- Mantenha os arquivos `.ini` organizados por contexto (ex: login, busca, erros)

## 🧪 Testes recomendados

- Altere o idioma do Joomla e verifique se os rótulos mudam
- Teste com idiomas RTL (ex: árabe, hebraico)
- Valide traduções com usuários nativos

## 📚 Referências

- [Joomla Language Overrides](https://docs.joomla.org/Language_Overrides_in_Joomla)
- [Guia de i18n do Joomla](https://docs.joomla.org/Internationalisation)
