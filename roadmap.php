<?php
require "includes/menu.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Roadmap</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1.0">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Em desenvolvimento
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="heading1.0" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Novas funcioanlidades</strong><br>
                                        1. Cadastro de Logradouros;<br>
                                        <br><strong>Correções</strong><br>
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