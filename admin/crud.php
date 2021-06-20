<?php
require_once '/xampp/htdocs/Corlate/koneksi_uts.php';

// uploud image
function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname =$_FILES['gambar']['tmp_name'];

    if( $error === 4 ) {
        echo "<script>
        alert('Pilih gambar!');
        </script>";
        return false;
    }

    $ekstesigamabarvalid = ['jpg', 'jpeg', 'png'];
    $ekstesigamabar = explode('.', $namafile);
    $ekstesigamabar = strtolower(end($ekstesigamabar));

    if( !in_array($ekstesigamabar, $ekstesigamabarvalid)){
        echo "<script>
        alert('Format tidak valid!');
        </script>";
        return false;
    }

    if ( $ukuranfile > 10000000) {
        echo "<script>
        alert('Size maksimal 5Mb!');
        </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .='.';
    $namafilebaru .= $ekstesigamabar;

    move_uploaded_file($tmpname, 'images/' . $namafilebaru);
    return $namafilebaru;
}

// read User
function readUser($sql) {
    $data = array();
    $koneksi = koneksiUts();
    $hasil = mysqli_query($koneksi, $sql);

    // jika tidak ada record, hasil berupa null
    if (mysqli_num_rows($hasil) == 0) {
        mysqli_close($koneksi);
        return null;
    }

    $i=0;
    while($baris = mysqli_fetch_assoc($hasil)) {
        $data[$i]['username'] = $baris['username'];
        $data[$i]['email'] = $baris['email'];
        $data[$i]['password'] = $baris['password'];
        $data[$i]['id']= $baris['id'];
        $i++;
    }

    mysqli_close($koneksi);
    return $data;
}

// search User With Name
function searchUserWithName($nama) {
    $sql ="select * from user where username='$nama'";
    $data = readUser($sql);

    return $data;
}

// create User
function createUser($data){
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $password_md5 = md5 ($password);

    $koneksi = koneksiUts();
    $sql = "INSERT INTO user VALUES ('','$username','$email','$password_md5')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update User
function updateUser($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $password_md5 = md5 ($password);

    $sql = "UPDATE user SET
            username='$username',
            email='$email',
            password='$password_md5'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete User
function deleteUser($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM user WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Item Home
function createItemHome($data){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $link = $data["link"];
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO item_home VALUES ('','$gambar','$link','$judul','$deskripsi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Item Home
function updateItemHome($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $link = $data["link"];
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];

    $sql = "UPDATE item_home SET
            gambar='$gambar',
            link='$link',
            judul='$judul',
            deskripsi='$deskripsi'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Item Home
function deleteItemHome($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM item_home WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Slider Home
function createSliderHome($data){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $deskripsi = $data["deskripsi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO slider_home VALUES ('','$gambar','$deskripsi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Slider Home
function updateSliderHome($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $deskripsi = $data["deskripsi"];

    $sql = "UPDATE slider_home SET
            gambar='$gambar',
            deskripsi='$deskripsi'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Slider Home
function deleteSliderHome($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM slider_home WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Slider Desc
function createSliderDesc($data){
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO slider_desc VALUES ('','$judul','$deskripsi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Slider Desc
function updateSliderDesc($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];

    $sql = "UPDATE slider_desc SET
            judul='$judul'
            deskripsi='$deskripsi'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Slider Desc
function deleteSliderDesc($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM slider_des WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}






// update Jumbotron
function updateJumbotron($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $deskripsi = $data["deskripsi"];
    $name_button = $data["name_button"];
    $link_button = $data["link_button"];

    $sql = "UPDATE jumbotron SET
            deskripsi='$deskripsi',
            name_button='$name_button',
            link_button='$link_button'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// update Jumbotron Home
function updateJumbotronHome($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $welcome = $data["welcome"];

    $sql = "UPDATE jumbotron_home SET
            welcome='$welcome'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}

// update About Me
function updateAboutMe($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $deskripsi = $data["deskripsi"];
    $name_button = $data["name_button"];
    $link_button = $data["link_button"];

    $sql = "UPDATE about_me SET
            gambar='$gambar',
            deskripsi='$deskripsi',
            name_button='$name_button',
            link_button='$link_button'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}

// create My Services
function createMyService($data){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO my_services VALUES ('','$gambar','$nama','$deskripsi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update My Services
function updateMyServices($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];

    $sql = "UPDATE my_services SET
            gambar='$gambar',
            nama='$nama',
            deskripsi='$deskripsi'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete My Services
function deleteMyServices($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM my_services WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Contact
function createContact($data){
    $gambar = $data["gambar"];
    $label = $data["label"];
    $isi = $data["isi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO contact VALUES ('','$gambar','$label','$isi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Contact
function updateContact($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = $data["gambar"];
    $label = $data["label"];
    $isi = $data["isi"];

    $sql = "UPDATE contact SET
            gambar='$gambar',
            label='$label',
            isi='$isi'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Contact
function deleteContact($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM contact WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create News
function createNews($data){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $judul = $data["judul"];
    $kategori = $data["kategori"];
    $tanggal = $data["tanggal"];
    $deskripsi = $data["deskripsi"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO news VALUES ('','$gambar','$judul','$kategori','$tanggal','$deskripsi')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update News
function updateNews($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];
    $tanggal = $data["tanggal"];
    $kategori = $data["kategori"];

    $sql = "UPDATE news SET
            gambar='$gambar',
            judul='$judul',
            deskripsi='$deskripsi',
            tanggal='$tanggal',
            kategori='$kategori'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete News
function deleteNews($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM news WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Category
function createCategory($data){
    $judul = $data["judul"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO news_category VALUES ('','$judul')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Category
function updateCategory($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $judul = $data["judul"];

    $sql = "UPDATE news_category  SET
            judul='$judul'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Category
function deleteCategory($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM news_category WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Information
function createInformation($data){
    $judul = $data["judul"];
    $link = $data["link"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO information VALUES ('','$judul','$link')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Information
function updateInformation($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $judul = $data["judul"];
    $link = $data["link"];

    $sql = "UPDATE information  SET
            judul='$judul',
            link='$link'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Information
function deleteInformation($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM information WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// update footer
function updateFooter($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $footer = $data["footer"];

    $sql = "UPDATE footer  SET
            footer='$footer'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}

// create Galery
function createGalery($data){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $judul = $data["judul"];
    $kategori = $data["kategori"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO galery VALUES ('','$gambar','$judul','$kategori')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Galery
function updateGalery($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $judul = $data["judul"];
    $kategori = $data["kategori"];

    $sql = "UPDATE galery SET
            gambar='$gambar',
            judul='$judul',
            kategori='$kategori'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Galery
function deleteGalery($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM galery WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// create Category Galery
function createCategoryGalery($data){
    $judul = $data["judul"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO galery_category VALUES ('','$judul')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// update Category Galery
function updateCategoryGalery($data) {
    $koneksi = koneksiUts();
    $id = $data["id"];
    $judul = $data["judul"];

    $sql = "UPDATE galery_category  SET
            judul='$judul'
            WHERE id=$id
            ";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);

}
// delete Category Galery
function deleteCategoryGalery($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM galery_category WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}

// create Faq
function createFaq($data){
    $full_name = $data["full_name"];
    $email = $data["email"];
    $message = $data["message"];

    $koneksi = koneksiUts();
    $sql = "INSERT INTO faq VALUES ('','$full_name','$email','$message')";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}
// delete Faq
function deleteFaq($id){
    $koneksi = koneksiUts();
    $sql = "DELETE FROM faq WHERE id=$id";

    mysqli_query($koneksi,$sql);
    return mysqli_affected_rows($koneksi);
}