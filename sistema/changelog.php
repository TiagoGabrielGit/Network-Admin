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