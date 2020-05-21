<?PHP
$clientChk = true;
require('app-lib.php');
build_header($displayName);

?>

<?php 
    build_ClientnavBlock();
 ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<table border="0px ">

<tr>
    <td>
        <div id="mission">
            <h1> Mission:</h1>
            <h4>Logical Peripherals Australia’s mission is to supply high quality computer peripherals, reliable
                customer service and above all customer satisfaction. We strive to deliver the very best in the
                latest technologies and support our customers with the highest after sales support, allowing our
                customers to enjoy the best of technology that our ever-changing world demands.</h4>
        </div>
    </td>
    <td>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5006.3055454096175!2d153.0285630587093!3d-27.46948974737894!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa10d73f1dee93c97!2sCanterbury+Technical+Institute!5e0!3m2!1ses-419!2sau!4v1535943535226" width="500" height="400" frameborder="0" style="border:0" ></iframe>
        </div>
    </td>
</tr>


<tr>
    <td>
        <div id="video">
            <iframe width="800" height="380" controls src="https://www.youtube.com/embed/gdlG0HTaSEc">
            </iframe>
        </div>

    </td>
    <td>
        <div id="facebook" class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="500" data-height="380" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a> </blockquote>
        </div>
    </td>
</tr>

</table>








<?PHP
build_footer();
?>