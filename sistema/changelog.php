<?php
require "../includes/menu.php";
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Changelog</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <!-- Default Accordion -->
            <div class="accordion" id="accordionExample">


              <!-- Versão 2.5 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-5" aria-expanded="false" aria-controls="collapse2-5">
                    Versão 2.5 - XX/09/2022
                  </button>
                </h2>
                <div id="collapse2-5" class="accordion-collapse collapse" aria-labelledby="heading2-5" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Criado cadastro de restrições em VMs, E-mail e Portal;<br>

                    <br><strong>Melhorias</strong><br>

                    <br><strong>Correções de BUG</strong><br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Renomeado tabela credenciais_privacidade_equipe;<br>
                    2. Adicionado coluna tipo na tabela credenciais_privacidade_equipe;<br>
                    3. Renomeado tabela credenciais_privacidade_usuario;<br>
                    4. Adicionado coluna tipo na tabela credenciais_privacidade_usuario;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Iniciar página de relatórios;<br>
                    2. Mostrar LOG de alteração e criação de registros por usuário;<br>
                    3. Correções nos formatos de data e hora;<br>
                    4. Possibilidade de cadastrar uma VM a uma hospedagem; <br>
                    5. Analisar espaçamento que esta ficando após a senha;<br>
                    6. Politica de restrição na visualização de credenciais; <br>
                  </div>
                </div>
              </div>


              <!-- Versão 2.4 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">
                    Versão 2.4 - 04/09/2022
                  </button>
                </h2>
                <div id="collapse2-4" class="accordion-collapse collapse" aria-labelledby="heading2-4" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Anexo de imagens em equipamentos (Necessário criar diretório);<br>
                    2. Cadastro de equipes;<br>
                    3. Confiruguração de permissão nas credenciais de equipamentos;<br>

                    <br><strong>Melhorias</strong><br>

                    <br><strong>Correções de BUG</strong><br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado tabela upload;<br>
                    2. Criado tabela equipes;<br>
                    3. Criado tabela equipes_integrantes;<br>
                    4. Criado tabela credenciais_equipamento_privacidade_equipe;<br>
                    5. Criado tabela credenciais_equipamento_privacidade_usuario;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Iniciar página de relatórios;<br>
                    2. Mostrar LOG de alteração e criação de registros por usuário;<br>
                    3. Correções nos formatos de data e hora;<br>
                    4. Possibilidade de cadastrar uma VM a uma hospedagem; <br>
                    5. Analisar espaçamento que esta ficando após a senha;<br>
                    6. Politica de restrição na visualização de credenciais; <br>
                  </div>
                </div>
              </div>


              <!-- Versão 2.3 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                    Versão 2.3 - 07/08/2022
                  </button>
                </h2>
                <div id="collapse2-3" class="accordion-collapse collapse" aria-labelledby="heading2-3" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Contador de tempo chamado e ralato;

                    <br><strong>Melhorias</strong><br>
                    1. Destacar na barra superior quando um chamado esta em execução;<br>
                    2. Botão para adicionar, inativar e editar senhas junto a equipamento e VM;<br>
                    3. Removido visualização de senhas de vms e equipamentos através de credenciais;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Corrigido cadastro de VM que estava quebrando quando não preenchido VLAN;<br>
                    2. Ajustar quebra de linha dos relatos dos chamados;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Alterado tipo de campo VLAN na tabela vms para varchar(4)<br>;
                    2. Alterado tipo de campo VLAN na tabela vms para null:<br>
                    3. Criado coluna active na tabela credenciais_vms;<br>
                    4. Criado coluna active na tabela credenciais_equipamentos;<br>
                    5. Criado coluna seconds_worked na tabela chamado_relato;<br>
                    6. Criado coluna seconds_worked na tabela chamados;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Cadastro de equipes;<br>
                    2. Iniciar página de relatórios;<br>
                    3. Mostrar LOG de alteração e criação de registros por usuário;<br>
                    5. Correções nos formatos de data e hora;<br>
                    6. Possibilidade de cadastrar uma VM a uma hospedagem; <br>
                    7. Analisar espaçamento que esta ficando após a senha;<br>
                  </div>
                </div>
              </div>




              <!-- Versão 2.2 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                    Versão 2.2 - 29/07/2022
                  </button>
                </h2>
                <div id="collapse2-2" class="accordion-collapse collapse" aria-labelledby="heading2-2" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Cadastro de usuários de portal;<br>
                    2. Criado cadastro de tipo de chamado;<br>
                    3. Criado pagina para ver chamados, relatar e abrir chamado;<br>
                    4. Botao apropriar na visualização do chamado;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Melhorias na visualização das senhas dos equipamentos;<br>
                    2. Preenchimento rack e serial no cadastro do equimento no pop;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. <br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado coluna atendende_id na tabela chamados;<br>
                    2. Criado coluna relator_id na tabela chamado_relato;<br>
                    3. Criado coluna in_execution na tabela chamados;<br>
                    4. Criado coluna in_execution_atd_id na tabela chamados;<br>
                    5. Criado coluna in_execution_start na tabela chamados;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Cadastro de equipes;<br>
                    2. Iniciar página de relatórios;<br>
                    3. Mostrar LOG de alteração e criação de registros por usuário;<br>
                  </div>
                </div>
              </div>


              <!-- Versão 2.1 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-1">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                    Versão 2.1 - 25/07/2022
                  </button>
                </h2>
                <div id="collapse2-1" class="accordion-collapse collapse" aria-labelledby="heading2-1" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. <br>

                    <br><strong>Melhorias</strong><br>
                    1. Atribuido opção de dizer se equipamento é ou não de rack;<br>
                    2. Atribuido opção de vincular equipamento ao rack quando equipamento for do tipo de rack;<br>
                    3. Atribuido opção de portas de acesso (SSH, WEB, Telnet) em equipamentos;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. <br>


                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado a coluna rack na tabela equipamentos;<br>
                    2. Criado a coluna rack_id na tabela equipamentospop;<br>
                    3. Criado a coluna serialEquipamento na tabela equipamentospop;<br>
                    4. Criado a coluna portaWeb na tabela equipamentospop;<br>
                    5. Criado a coluna portaTelnet na tabela equipamentospop;<br>
                    6. Criado a coluna portaSSH na tabela equipamentospop;<br>
                    7. Criado a coluna portaWinbox na tabela equipamentospop;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Cadastro de regiões;<br>
                    2. Cadastro de equipes;<br>
                    3. Iniciar página de relatórios;<br>
                    4. Mostrar LOG de alteração e criação de registros por usuário;<br>

                  </div>
                </div>
              </div>


              <!-- Versão 2.0 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading2-0">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-0" aria-expanded="false" aria-controls="collapse2-0">
                    Versão 2.0 - 23/07/2022
                  </button>
                </h2>
                <div id="collapse2-0" class="accordion-collapse collapse" aria-labelledby="heading2-0" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Botão de atualizar frontend;<br>
                    2. LOG de acesso;<br>

                    <br><strong>Melhorias</strong><br>
                    1. ;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Corrigido o cadastro de novo POP;<br>
                    1. Corrigido o salvamento de anotação em credenciais de email;<br>


                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado tabela atualizacao;<br>
                    2. Criado tabela log_Acesso;<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Colocar opção se equipamento é rack ou não e vincular equipamento com rack quando for de rack;<br>
                    2. Campo serial no cadastro de equipamento;<br>
                    3. Cadastro de regiões;<br>
                    4. Cadastro de equipes;<br>
                    5. Iniciar página de relatórios;<br>
                    6. Colocar opção de portas de acesso (SSH, WEB, Telnet) em equipamentos;<br>
                    7. Mostrar LOG de alteração e criação de registros por usuário;<br>

                  </div>
                </div>
              </div>


              <!-- Versão 1.9 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading10">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                    Versão 1.9 - 22-07/2022
                  </button>
                </h2>
                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. ;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Criado campo para anotação no cadastro de credenciais tipo email;<br>
                    2. Criado campo para anotação no cadastro de credenciais tipo portal;<br>
                    3. Aumentado tamanho dos campos email e senha no cadastro tipo email;<br>
                    4. Aumentado tamanho dos campos usuario e senha no cadastro tipo portal;<br>
                    5. Adicionado campo de pesquisa por equipamento na tela de credenciais;<br>
                    6. Diminuido campo de anotação na visualização de equipamentos;<br>
                    7. Diminuido campo de anotação na visualização de vms;<br>
                    8. Adicionado tamanho 11U no cadastro de produtos;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Corrigido o tipo de cadastro de credenciais que estava vindo preenchido automaticamente como E-mail;<br>
                    2. Corrigido alguns erros de filtros ao pesquisar credenciais

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado a coluna anotacao na tabela "credenciais_email";<br>
                    2. Criado a coluna anotacao na tabela "credenciais_portal";<br>

                    <br><strong>Previsto para próximas atualizações</strong><br>
                    1. Colocar opção se equipamento é rack ou não e vincular equipamento com rack quando for de rack;<br>
                    2. Campo serial no cadastro de equipamento;<br>
                    3. Cadastro de regiões;<br>
                    4. Cadastro de equipes;<br>
                    5. Iniciar página de relatórios;<br>
                    6. Colocar opção de portas de acesso (SSH, WEB, Telnet) em equipamentos;<br>
                    7. Mostrar LOG de alteração e criação de registros por usuário;<br>

                  </div>
                </div>
              </div>


              <!-- Versão 1.8 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading9">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                    Versão 1.8 - 20/07/2022
                  </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Adicionado botão key em VMs e Equipamentos onde direciona para tela de credenciais;<br>
                    2. Incluido cluna Equipamento/VM na tela de credenciais;<br>
                    3. Adicionado campo IP na visualização de credenciais;<br>
                    4. Adicionado campo "Visualizar credenciais" na visualização de equipamentos e VMs;<br>
                    5. Adicionado botão Excluir permanente em cadastro de POP;<br>
                    6. Adicionado cadastro de rack no POP;<br>

                    <br><strong>Melhorias</strong><br>
                    1. ;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Corrigido filtro de credenciais, substituido clausa de contém para exato na busca do id equipamento e vm;<br>
                    2. Corrigido obrigatoriedade em alguns preenchimentos no cadastro de POP;<br>
                    3. Corrigido obrigatoriedade em alguns preenchimentos no editar equipamentos;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Alterado a coluna deleted na tabela pop para tipo boolean, e alterado nome para active;<br>
                    2. Criado a tabela pop_rack;<br>

                    <br><strong>Previsto para próxima atualização</strong><br>
                    1. Vinculo de equipamento com rack;<br>
                    2. Campo serial no cadastro de equipamento;<br>
                    3. Cadastro de regiões;<br>
                    4. Cadastro de equipes;<br>
                    5. Iniciar página de relatórios;<br>
                  </div>
                </div>
              </div>




              <!-- Versão 1.7 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading8">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                    Versão 1.7 - 18/07/2022
                  </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Criado tela de credenciais, pendente implementação de politicas de privacidade;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Ordenado empresas por ordem alfabética no campo de pesquisa em VMs e Equipamentos;<br>
                    2. Removido os campos de comunidade SNMP e usuario integração no cadastro de equipamento por POP; <br>
                    3. Removido limite de caracteres do campo dominio em /telecom/vms/view.php; <br>
                    4. Corrigido o caminho para retornar a página de login quando o usuário tenta acessar alguma página sem estar logado; <br>
                    5. Configurado no modal de pesquisa em Equipamentos e VMs para ficar nos campos de pesquisa as opções selecionadas; <br>
                    6. Ajustado a obrigatóriedade de preenchimendo de alguns campos; <br>
                    7. Deixado apenas o campo Anotaçãoes em cadastro de equipamento no pop;<br>

                    <br><strong>Correções de BUG</strong><br>
                    Sem correções de BUGs nesta versão;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Removido as colunas de comunidade SNMP e usuario de integragração na tabela equipamentospop;<br>
                    2. Criado tabela credenciais_email;<br>
                    3. Criado tabela credenciais_portal;<br>
                    4. Adicionado coluna anotacaoEquipamento na tabela equipamentospop;<br>
                    5. Excluido a tabela anotacaopublicaequipamento, migrar o que tem dela para a coluna criada no item 4;<br>
                    6. Criado a coluna anotacaoVM na tabela vms;<br>
                    7. Excluido a tabela anotacaopublica_vm, migrar o que tem dela para a coluna criada no item 6;<br>
                    8. Criado tabela credenciais_equipamento;<br>
                    9. Criado tabela credenciais_vms;<br>

                  </div>
                </div>
              </div>

              <!-- Versão 1.6 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading7">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                    Versão 1.6 - 12-07/2022
                  </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    Sem novas funcionalidades nesta versão;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Adicionado campo de pesquisa Tipo de Equipamento no cadastro de equipamento pop POP;<br>
                    2. Alterado type para number no campo de VLAN no cadastro de VM;<br>
                    3. Adicionado href no botão voltar na página de view de VMs e Equipamentos;<br>
                    4. Ao cadastrar Equipamentos e VMs, vai direto para o view do cadastro;<br>
                    5. Ordenado a listagem de sistema operacional por ordem alfabética;<br>
                    6. Aumentado limite de busca para 100 na listagem de VMs;<br>
                    7. Alterado a busca por "contém" quando buscado digitando hostname na busca por VMs e Equipamentos;<br>
                    8. Ajustado para listar apenas os servidores com status Ativado no cadastro de novas VMs;<br>
                    9. Ajustado ordem de colunas na listagem de Equipamentos e VMs;<br>

                    <br><strong>Correções de BUG</strong><br>
                    Sem correções de BUGs nesta versão;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    Sem novas alterações;<br>
                  </div>
                </div>
              </div>



              <!-- Versão 1.5 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading6">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                    Versão 1.5 - 11/07/2022
                  </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Criado a função de anotação pública no cadastro de VMs;<br>
                    2. Criado a função de editar VMs;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Ajustado campo de fabricante no cadastro de equipamento para ordenar por nome;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. ;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado tabela anotacaopublica_vm;<br>
                  </div>
                </div>
              </div>


              <!-- Versão 1.4 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Versão 1.4 - 08/07/2022
                  </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Colocado checkbox dinâmico de tipo de equipametno no cadastro de equipamento;<br>
                    2. Adicionado campo de tamanho no cadastro de equipamento;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Ajuste design visualização de produtos;<br>
                    2. Adequado cadastro de produtos para o formato de diretórios;<br>
                    3. Ajustado filtro no cadastro de equipamentos por POP para aparecer somente os tipos corretos para o modelo de equipamento selecionado;<br>
                    4. Alterado limite de busca default para o valor 100 nA tela de equipamentos pop POP;<br>
                    5. Permitido copiar, colar, deletear, selecionar tudo nos campos IP onde tinha máscara permitindo apenas números;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. ;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado tabela equipamentos_atributos;<br>
                    2. Adicionado columa tamanho na tabela equipamentos;<br>
                  </div>
                </div>
              </div>


              <!-- Versão 1.3 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Versão 1.3 - 06/07/2022
                  </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Cadastro Sistema Operacional;<br>
                    2. Cadastro VMs;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Ajuste para não listar usuário super admin no cadastro de usuários;<br>
                    2. Retirado temporariamente de produção para ajustes os menus de relatar BUG e relatar problema;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Ajuste no cadastro de empresa;<br>
                    2. Ajuste na exclusão de empresa;<br>
                    3. Ajuste caminho botão dashboard;<br>
                    4. Ajuste href no editar empresa;<br>

                    <br><strong>Alterações banco de dados</strong><br>
                    1. Criado a tabela vms;<br>
                    2. Criado a tabela sistemaoperacional;<br>
                  </div>
                </div>
              </div>


              <!-- Versão 1.2 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Versão 1.2 - 04/07/2022
                  </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Opção de pesquina no cadastro de equipamento por pop;<br>

                    <br><strong>Melhorias</strong><br>
                    1. Ajustes de identidade visual da marca;<br>
                    2. Ajuste mascara de IP no cadastro de equipamento por pop;<br>
                    3. Novas funções e melhorias na tela de cadastro de equipamento por pop;<br>
                    4. Adicionado botão voltar em algumas páginas;<br>
                    5. Vinculado a criação de usuário com o cadastro de pessoa;<br>
                    5. Removido a possibilidade de exclusão de cadastros default;<br>

                    <br><strong>Correções de BUG</strong><br>
                    1. Ajuste abertura página changelog;<br>
                    2. Ajuste abertura de páginas con enderaçemento errado;<br>
                  </div>
                </div>
              </div>

              <!-- Versão 1.1 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading1.1">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Versão 1.1 - 30/06/2022
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="heading1.1" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Tela de relato de BUG;<br>
                    2. Cadastro de logradouros<br>
                    3. Cadastro de empresas<br>
                    4. Cadastro de pessoas<br>
                    5. Cadastro de usuários<br>
                    6. Cadastro de POPs<br>
                    7. Cadastro equipamento POPs<br>

                    <br><strong>Melhorias</strong><br>
                    1. Correção de máscaras<br>
                    2. Ajuste select dinâmico no cadastro de cidades<br>
                    3. Ajuste select dinâmico no cadastro de bairros<br>
                    4. Ajustado icones do menu<br>

                    <br><strong>Correções de BUG</strong><br>
                    Sem correções lançadas<br>
                  </div>
                </div>
              </div>

              <!-- Versão 1.0 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading1.0">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Versão 1.0 - 11/06/2022
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="heading1.0" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>Novas funcionalidades</strong><br>
                    1. Tela de login;<br>
                    2. Cadastro de País;<br>
                    3. Cadastro de Estado;<br>
                    4. Cadastro de Usuários;<br>
                    5. Cadastro de Cidades;<br>
                    6. Cadastro de Bairro;<br>
                    7. Cadastro Tipo de Equipamentos;<br>
                    8. Cadastro Fabricante;<br>
                    9. Cadastro Equipamento;<br>

                    <br><strong>Correções de BUG</strong><br>
                    Sem correções lançadas
                  </div>
                </div>
              </div>
            </div><!-- End Default Accordion Example -->

          </div>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

<?php
require "../includes/footer.php";
?>