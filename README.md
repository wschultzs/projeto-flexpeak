O presente sistema age como uma agenda de contatos. Irei explicar como funciona.

0) INSTALAÇÃO
    - Executar a clonagem do repositório;
    - Executar o composer install;
    - Executar o npm install;
    - Renomear .env.example na raíz do projeto para .env e executar php artisan key:generate
    - Executar o php artisan migrate

1) TECNOLOGIAS
    - Backend: Laravel 6 e MySQL;
    - Frontend: Bootstrap 4, jQuery e DataTable;
    
2) AUTENTICAÇÃO
    O sistema conta com o sistema de autenticação nativo do Laravel, com o layout levemente alterado por mim. Consiste em uma tela com formulário de login (que também é a tela inicial do sistema) e uma tela com formulário de registro, acessível através do seu atalho no menu superior de navegação.
   
3) DASHBOARD
    Após efetuar o login, o usuário será direcionado para um dashboard que consiste de uma tabela montada com o DataTable que lista os contatos através do nome, telefone e e-mail. Acima da tabela existe um botão azul que ao ser clicado irá exibir um formulário em uma janela modal, onde o usuário irá inserir informações sobre um contato e adicionar uma foto do mesmo. Após cadastrar o contato, será exibida uma mensagem flash de sucesso e o novo contato irá aparecer listado na tabela. 
    
    A última coluna da tabela é a coluna de ação: Nela, é possível editar (botão azul com ícone de caneta), remover (botão vermelho com ícone de lixeira) e visualizar mais informações (botão verde) sobre o contato. O botão de edição irá abrir outra janela modal com formulário, que estarão já preenchidos com os dados do contato em questão e irá atualizar os dados apenas dos campos que o usuário alterar; O botão vermelho irá imediatamente remover o contato escolhido e exibir uma mensagem flash vermelha de sucesso; O botão verde irá redirecionar o usuário para outra tela, a qual explicarei no próximo tópico.
   
4) DETALHES DO CONTATO
    Nesta tela é exibida a foto do usuário que foi cadastrada anteriormente, junto de seu nome e a sua descrição completa. Abaixo disso, existe a funcionalidade que chamo de Tasks: Como é um sistema de agenda de contatos, adicionei a funcionalidade pensando que o cliente poderia usar para adicionar situações pendentes com o contato em questão. Por exemplo: "Ligar para marcar a entrevista presencial". Essas tasks são facilmente adicionadas através de um único input de formulário, posicionado diretamente acima da tabela que as lista. Já a tabela, possui apenas duas colunas: A que lista as tasks cadastradas e a de remoção de task, através de um ícone vermelho de "x".
    
    
5) ALTERNATIVA DE ACESSO AO SISTEMA
    Realizei o deploy deste sistema no Heroku. Ele está disponível para visualização em projeto-flexpeak.herokuapp.com.br
    No entanto, é preciso informar que por ser o servidor gratuito do Heroku o mesmo pode ser um pouco lento. Outra questão é que no Heroku as fotos dos contatos estão vinculadas à sessão do navegador - quando ela expira, a foto do contato some.
    Por esses motivos recomendo a instalação local deste sistema, através das instruções no primeiro tópico desta apresentação.
    

Agradeço a atenção até aqui e a oportunidade, e espero que me considerem merecedor de dar continuidade ao processo seletivo.
    Atenciosamente, William Schultz.
    
    Contato: (92) 99278-8547
