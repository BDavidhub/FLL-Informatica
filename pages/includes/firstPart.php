        <div class="bar1 container-fluid">
                <div class="location">
                    <p class="fw-bold">Dove</p>
                    <input type="text" value="<?php echo $_SESSION['dove'] ?>" readonly>
                </div>
                <div class="check-in">
                    <p class="fw-bold">Destinazione</p>
                    <input type="text" value="<?php echo $_SESSION['destinazione'] ?>" readonly>
                </div>
                <div class="check-out">
                    <nav class="check-out1">
                        <p class="fw-bold">Data</p>
                        <input type="date" value="<?php echo $_SESSION['data']->format('Y-m-d'); ?>" min="2022-01-01" max="2023-01-01" disabled>
                    </nav>
                    <a href="../index.php">
                        <h6> CAMBIO RICERCA</h6>
                    </a>
                </div>

        </div>
            <div class="biglietti-treni">

                <h1 class="fw-bolder text-center">BIGLIETTI TRENI</h1>
                <div class="container">
                     <div class="progress__container">
                       <div class="progress__bar js-bar"></div>
                       <div class="progress__circle js-circle active">1</div>
                       <div class="progress__circle js-circle">2</div>
                       <div class="progress__circle js-circle">3</div>
                       <div class="progress__circle js-circle">4</div>
                       <div class="progress__circle js-circle">5</div>
                    </div>
                </div>
           
            
