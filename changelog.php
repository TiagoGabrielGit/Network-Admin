<?php
require "includes/menu.php";
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
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading1.1">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Versão 1.1 - 12/06/2022
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="heading1.1" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
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
require "includes/footer.php";
?>