<div class="position-relative" style="z-index: 10;">
  <br><br>
<nav class="navbar navbar-expand-lg  bg-primary position-relative top-50 start-50 translate-middle" data-bs-theme="dark" style="width:80%;z-index: 10;" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sellerhome.php">หน้าหลัก</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            เลือกรุ่นรถ
          </a>
          <ul class="dropdown-menu">
          <li><form action="homehondasel.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="honda">
          </form></li>
          <li><form action="homeisuzusel.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="isuzu">
          </form></li>
          <li><form action="homemazdasel.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="mazda">
          </form></li>
          <li><form action="homemitsusel.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="mitsu">
          </form></li>
          <li><form action="hometoyotasel.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="toyota">
          </form></li>
          </ul>
        </li>
        <li class="nav-item position-absolute end-0 pe-2">
          <a class="nav-link active" href="login.php">Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
</div>