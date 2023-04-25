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
          <a class="nav-link active" aria-current="page" href="home.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="customereditdate.php">จัดการวันนัด</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="customercheckdate.php">เช็คสถานะการจองนัด</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            เลือกยี่ห้อรถยนต์
          </a>
          <ul class="dropdown-menu">
          <li><form action="homehonda.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="Honda">
          </form></li>
          <li><form action="homeisuzu.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="Isuzu">
          </form></li>
          <li><form action="homemazda.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="Mazda">
          </form></li>
          <li><form action="homemitsu.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="Mitsu">
          </form></li>
          <li><form action="hometoyota.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="Toyota">
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