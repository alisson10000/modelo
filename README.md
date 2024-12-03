README - Projeto de Gestão de Usuários
Este projeto é uma aplicação web desenvolvida para gerenciar usuários. Ele permite realizar operações de cadastro, listagem, edição e exclusão de usuários. O design é moderno e responsivo, utilizando PHP no backend e CSS modularizado para estilização.

🛠️ Funcionalidades
Cadastro de Usuários

Formulário para inserir dados do usuário.
Mensagem de confirmação após o cadastro.
Listagem de Usuários

Tabela estilizada com todos os usuários cadastrados.
Opção para buscar e visualizar detalhes.
Edição de Usuários

Formulário pré-preenchido com os dados do usuário.
Permite atualizar nome, login e senha.
Exclusão de Usuários

Lista para selecionar o usuário a ser excluído.
Mensagem de sucesso ou erro após a exclusão.
Mensagens de Feedback

Estilos específicos para erros, sucessos e alertas.
Layout responsivo e acessível.
Menu de Navegação

Links para acessar todas as funcionalidades.
Destaque dinâmico para a página ativa.
🧰 Tecnologias Utilizadas
Linguagem: PHP
Estilização: CSS (modularizado)
Frontend: HTML e Bootstrap
Banco de Dados: MySQL
Responsividade: Media Queries para telas menores
📂 Estrutura do Projeto
bash
Copy code
.
├── index.php               # Página inicial
├── servicos/               # Lógica de backend
│   ├── verifica.php        # Verificação de autenticação
│   ├── excluir.php         # Lógica de exclusão de usuários
│   └── editar.php          # Lógica de edição de usuários
├── conteudo/               # Páginas dinâmicas
│   ├── homeConteudo.php    # Formulário de cadastro
│   ├── listarConteudo.php  # Tabela de listagem
│   ├── editarConteudo.php  # Formulário de edição
│   └── excluirConteudo.php # Formulário de exclusão
├── css/                    # Estilização modularizada
│   ├── formulario.css      # Estilos para formulários
│   ├── login.css           # Estilo para tela de login
│   ├── formularios.css     # Estilo compartilhado entre formulários
│   ├── layout.css          # Layout principal
│   ├── lista.css           # Estilo para tabelas de listagem
│   ├── logo.css            # Estilo para a logo
│   ├── mensagens.css       # Estilo para mensagens de feedback
│   ├── menu.css            # Estilo do menu de navegação
│   └── raiz.css            # Estilo base para o projeto
├── js/
│   └── funcoes.js          # Funções JavaScript
├── img/                    # Imagens utilizadas no projeto
│   └── logo.png            # Logotipo
🚀 Como Executar o Projeto
Clonar o Repositório

bash
Copy code
git clone https://github.com/seu-usuario/seu-repositorio.git
Configurar o Banco de Dados

Crie uma base de dados no MySQL.
Configure as credenciais no arquivo verifica.php.
Configurar o Ambiente

Certifique-se de ter um servidor local, como XAMPP ou WAMP.
Executar o Projeto

Coloque o projeto no diretório htdocs do servidor local.
Acesse o sistema pelo navegador: http://localhost/seu-projeto.
🌟 Design e Estilo
CSS Modularizado
formulario.css e formularios.css: Estilizam formulários com foco em responsividade.
menu.css: Design moderno para o menu de navegação, com hover e destaque dinâmico.
mensagens.css: Estilização para mensagens de erro, sucesso e alertas.
layout.css: Estrutura base para o layout.
lista.css: Estilo para tabelas de listagem de usuários.
logo.css: Define tamanho e posicionamento da logomarca.
Bootstrap
Utilizado para responsividade e componentes como o menu de navegação.
🤝 Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests para melhorar o projeto.

📄 Licença
Este projeto está licenciado sob a Licença MIT. Consulte o arquivo LICENSE para obter mais informações.

Desenvolvido por Alisson com foco em modularidade, organização e design moderno. 🚀
