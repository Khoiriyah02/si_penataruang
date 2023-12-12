<?php

namespace Master;

use Config\Query_builder;

class krk
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('krk')->get()->resultArray();
        $res = ' <a href="?target=krk&act=tambah_krk" class="btn btn-info btn-sm">Tambah krk</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kegiatan</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="300">' . $r['Nama'] . '</td>
                    <td>' . $r['Alamat'] . '</td>
                    <td width="300">' . $r['Kegiatan'] . '</td>
                    <td width="150">
                        <a href="?target=krk&act=edit_krk&id=' . $r['Nama'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=krk&act=delete_krk&id=' . $r['Nama'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=krk" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=krk&act=simpan_krk" method="post">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="Kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" id="Kegiatan" name="Kegiatan">
                    </div>
                  
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Kegiatan = $_POST['Kegiatan'];

        $data = array(
            'Nama' => $Nama,
            'Alamat' => $Alamat,
            'Kegiatan' => $Kegiatan
        );
        return $this->db->table('krk')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('krk')->where("Nama='$id'")->get()->rowArray();

        $res = '<a href="?target=krk" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=krk&act=update_krk" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['Nama'] . '">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" value="' . $r['Nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat" value="' . $r['Alamat'] . '">
                    </div>
                    <div class="mb-3">
                    <label for="Kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" id="Kegiatan" name="Kegiatan" value="' . $r['Kegiatan'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Kegiatan = $_POST['Kegiatan'];

        $data = array(
            'Nama' => $Nama,
            'Alamat' => $Alamat,
            'Kegiatan' => $Kegiatan
        );

        return $this->db->table('krk')->where("Nama='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('krk')->where("Nama='$id'")->delete();
    }
}
