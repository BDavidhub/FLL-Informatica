<nav class="navbar navbar-expand-lg navbar-light " >
      <a class="navbar-brand" href="../index.php">
        <h3 class="trainNavbar fw-bold">TRAIN</h3>
      </a>

      <div
        class="collapse navbar-collapse justify-content-end align-content-center m-2"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mr-auto p-1 mx-5">
          <li class="nav-item active mx-2">
            <a class="nav-link fw-bolder links-nav" href="#section1">HOME</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link fw-bolder links-nav" href="#section2">ABOUT</a>
          </li>

          <li class="nav-item dropdown mx-2">
            <a
              class="nav-link fw-bold"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
            <div class="account-menu">
            <i class="fas fa-bars"></i>
            <div class="outerUser">
            <i class="fas fa-user"></i>
          </div>
            </div>
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./pages/registration.php">Registrati</a>
              <a class="dropdown-item" href="./pages/registration.php">Accedi</a>
              <?php 
            
            if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
             echo '<div class="dropdown-divider"></div>';
             if(isset($_SESSION['macchinista']) &&   $_SESSION['macchinista'] == true){
               echo '<a class="dropdown-item" href="./pages/macchinista.php">Macchinista</a>';
                 
                }else if(isset($_SESSION['stazione']) && $_SESSION['stazione'] == true&&$_SESSION['macchinista'] == false){
               echo '<a class="dropdown-item" href="./pages/hubInterface.php">HUB</a>';
                }else{
                 echo '<p class="dropdown-item">Logged</p>';
                }
            
             }
           ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
