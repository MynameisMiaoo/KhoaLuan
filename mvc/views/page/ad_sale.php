<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <?php for ($i = 0; $i < sizeof($data['ads']); $i++) : ?>
            <div class="row" style="padding: 10px 10px">
                <div class="col col-lg-7 col-sm-12" style="margin-bottom: 10px;">
                    <img id="adsImage" style="width: 100%;" src="/KhoaLuan/<?php echo $data['ads'][$i]['img_ads'] ?>" alt="ads">
                </div>
                <div class="col col-lg-5 col-sm-12" style="display: flex; justify-items: center; justify-content: center; align-items: center;">
                    <div class="input-group mb-3" style="width: auto; height: auto;">
                        <input data-dataid="<?php echo $data['ads'][$i]['id_ads'] ?>" type="file" class="form-control" id="input_img" onchange="changeImage(event)">
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <script>
        function changeImage(event) {
            var input = event.target;
            var formData = new FormData();
            var file = event.target.files[0];
            var inputElement = event.target;
            var dataid = inputElement.getAttribute('data-dataid');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('adsImage').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
            formData.append('id_ads', dataid);
            formData.append('image', file);
            $.ajax({
                url: "/KhoaLuan/ajax/EditAds",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    ReLoad();
                }
            });
        }

        function Change(element) {
            var $id = $(element);
            var formData = new FormData();
            var image = $('#input_img')[0].files[0];
            formData.append('id_ads', $id.data('dataid'));
            formData.append('image', image);
            $.ajax({
                url: "/KhoaLuan/ajax/EditAds",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    ReLoad();
                }
            });
        }

        function ReLoad() {
            window.location.reload();
        }
    </script>
</body>

</html>