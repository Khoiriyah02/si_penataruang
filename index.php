<?php

use Master\krk;
use Master\petaru;
use Master\Menu;


include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$krk = new krk($dataKoneksi);
//$krk ->tambah()
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">SI TATA RUANG</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Sitaru";
                //====start content krk====
            } elseif ($target == "krk") {
                if ($act == "tambah_krk") {
                    echo $krk->tambah();
                } elseif ($act == "simpan_krk") {
                    if ($krk->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } elseif ($act == "edit_krk") {
                    $id = $_GET['id'];
                    echo $krk->edit($id);
                } elseif ($act == "update_krk") {
                    if ($krk->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } elseif ($act == "delete_krk") {
                    $id = $_GET['id'];
                    if ($krk->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } else {
                    echo $krk->index();
                }
                //====And Content krk====
             } elseif ($target == "krk") {
                if ($act == "tambah_krk") {
                    echo $krk->tambah();
                } elseif ($act == "simpan_krk") {
                    if ($krk->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } elseif ($act == "edit_krk") {
                    $id = $_GET['id'];
                    echo $krk->edit($id);
                } elseif ($act == "update_krk") {
                    if ($krk->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } elseif ($act == "delete_krk") {
                    $id = $_GET['id'];
                    if ($krk->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=krk'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=krk'
                        </script>";
                    }
                } else {
                    echo $krk->index();
                }
                 //====start content petaru====
            } elseif ($target == "petaru") {
                if ($act == "tambah_petaru") {
                    echo $petaru->tambah();
                } elseif ($act == "simpan_petaru") {
                    if ($petaru->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } elseif ($act == "edit_petaru") {
                    $id = $_GET['id'];
                    echo $petaru->edit($id);
                } elseif ($act == "update_petaru") {
                    if ($petaru->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } elseif ($act == "delete_petaru") {
                    $id = $_GET['id'];
                    if ($petaru->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } else {
                    echo $petaru->index();
                }
                //====And Content petaru====
             } elseif ($target == "petaru") {
                if ($act == "tambah_petaru") {
                    echo $petaru->tambah();
                } elseif ($act == "simpan_petaru") {
                    if ($petaru->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } elseif ($act == "edit_petaru") {
                    $id = $_GET['id'];
                    echo $petaru->edit($id);
                } elseif ($act == "update_petaru") {
                    if ($petaru->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } elseif ($act == "delete_petaru") {
                    $id = $_GET['id'];
                    if ($petaru->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=petaru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=petaru'
                        </script>";
                    }
                } else {
                    echo $petaru->index();
                }
                
            } elseif ($target == "krk") {
                echo "Ini adalah content krk";
            } elseif ($target == "petaru") {
                echo "Ini adalah content petaru";
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>
