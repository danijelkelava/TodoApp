    
    <nav class="navbar navbar-light bg-faded">
      <ul class="nav navbar-nav">
      
        <?php if (!isset($_SESSION['user'])) { ?>

        <li class="nav-item" >
          <a class="nav-link" href="login.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">REGISTER</a>
        </li>

        <?php } else { ?>

        <li class="nav-item">
          <a class="nav-link" href="index.php">DASHBOARD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
        </li>

        <?php } ?>

      </ul>
    </nav>