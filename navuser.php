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
        <a class="nav-link active" aria-current="page" href="customereditdate.php">แก้ไขวันนัด</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="customercheckdate.php">เช็คสถานะการจองนัด</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            เลือกรุ่นรถ
          </a>
          <ul class="dropdown-menu">
          <li><form action="homebmw.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="bmw">
          </form></li>
          <li><form action="homehonda.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="honda">
          </form></li>
          <li><form action="homeisuzu.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="isuzu">
          </form></li>
          <li><form action="homemasda.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="masda">
          </form></li>
          <li><form action="homemg.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="mg">
          </form></li>
          <li><form action="homemitsu.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="mitsu">
          </form></li>
          <li><form action="homenissan.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="nissan">
          </form></li>
          <li><form action="hometoyota.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="toyota">
          </form></li>
          <li><form action="homevolvo.php?" method="post">
            <input class="dropdown-item" type="submit" class="btnadd" value="valvo">
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