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
                    Versão 1.6 - 12/07/2022
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