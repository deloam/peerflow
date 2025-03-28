# PeerFlow – Plugin de Gestão de Submissão e Avaliação de Trabalhos

## 📌 Sobre o Projeto
O **PeerFlow** é um plugin proprietário para WordPress desenvolvido para gerenciar **inscrições, submissões e avaliações de trabalhos acadêmicos e científicos** diretamente no site do evento. Ele permite a automação completa do processo, desde a inscrição até a emissão de certificados e cartas de aceite.

## 🚀 Funcionalidades Principais
✅ **Sistema de Inscrição** (gratuita e paga) com integração a gateways de pagamento como **Sympla e PayPal**  
✅ **Submissão de Trabalhos** com upload de arquivos e validação automática de coautores  
✅ **Fluxo de Avaliação** por pares com atribuição automática de revisores  
✅ **Geração de Certificados** e **Cartas de Aceite** automáticas, personalizadas a partir de modelos  
✅ **Painel de Controle para Organizadores** acompanharem submissões, avaliações e pagamentos  
✅ **Integração Completa com WordPress**, sem necessidade de serviços externos  
✅ **Compatível com Temas Populares**, adaptável via Custom Post Types e WordPress REST API  

## 🛠️ Tecnologias Utilizadas
- **WordPress Plugin API**
- **PHP** e **JavaScript (React/Vanilla)**
- **MariaDB (Banco de Dados WordPress)**
- **Tailwind CSS / Styled Components (Estilização)**
- **WP REST API** para integração

## 📂 Estrutura do Projeto
```
peerflow/
├── includes/          # Código principal do plugin
├── templates/         # Modelos para certificados e cartas de aceite
├── assets/            # Arquivos de CSS, JS e imagens
├── peerflow.php       # Arquivo principal do plugin
├── README.md          # Documentação do projeto
```

## 📦 Como Instalar e Usar
### 🔹 Instalação
1. Clone este repositório na pasta de plugins do WordPress:
   ```sh
   git clone https://github.com/deloam/peerflow.git wp-content/plugins/peerflow
   ```
2. Acesse o painel do WordPress e ative o plugin **PeerFlow**.
3. Configure as opções no menu **PeerFlow** dentro do painel administrativo.

### 🔹 Uso
- Acesse **PeerFlow > Configurações** para personalizar inscrições, submissões e avaliações.
- No menu **Participantes**, gerencie as inscrições e pagamentos.
- Em **Submissões**, visualize e gerencie trabalhos enviados.
- O sistema de **avaliação** pode ser acessado na aba **Avaliadores**.
- **Certificados e cartas de aceite** são gerados automaticamente e podem ser baixados pelos participantes.

## 📌 Roadmap
- [ ] Criar API para integração com outras plataformas
- [ ] Melhorar interface do painel administrativo
- [ ] Implementar suporte a múltiplos idiomas

## 📜 Licença
Este projeto é de uso proprietário. Para obter permissões, entre em contato com o desenvolvedor.

## 👨‍💻 Desenvolvedor
[Deloam](https://deloam.github.io/portfolio/) - Desenvolvedor Full Stack e Criador do PeerFlow 🚀
