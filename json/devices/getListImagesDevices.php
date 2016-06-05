<div class="row">
    <?php

    include('../../config.php');
    $ID = (int)$_GET['ID'];

    $images = glob('../../imageDevices/*.{jpeg,gif,png,jpg}', GLOB_BRACE);

    foreach ($images as $value) {

        echo '  <div class = "col-sm-6 col-md-3">
        <a href = "#SelectListImages" class = "thumbnail">
            <img  imgTargeX="' . $ID . '" onclick=\'setImageTypedevices("' . $ID . '","' . $value . '")\' class="imglistTypeDevices img-thumbnail" src="' . IMAGEDEVICESURL . $value . '" alt = ".">
        </a>
    </div>';

    }


    ?>


</div>