<div class="header">
                <h1>Portal Berita Mahasiswa</h1>
                <p>Berita terkini dan terupdate sekarang</p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php" title="Home">Beranda</a></li>
                    <li><a href="index.php" title="Home">Berita</a></li>
                    <li><a href="contactUs.php" title="Home">Contact Us</a></li>
                    <?php
                    $sesiadmin = $_SESSION['member']; //login session
                        if(isset($sesiadmin)){
                            $anggota = mysqli_fetch_array(mysqli_query($connect, "SELECT * from anggota WHERE id_anggota='$sesiadmin'"));
                            ?>
                            <li><a href="#">Login: <?= $anggota['nama'];?></a></li>
                            <?php
                        }else{
                            ?>
                            <li><a href="anggota/indexuser.php" title="Login Anggota">Login Anggota</a></li>
                            <?php
                        }
                        ?>
                    
                </ul>
            </div>