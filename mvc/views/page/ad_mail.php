<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/KhoaLuan/public/css/ad_mail.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-12 content">
                <div class="head">
                    <h4>MINASHOP</h4>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Tiêu đề *</span>
                    <input class="form-control" aria-label="input_header" id="input_title"></input>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Nôị dung *</span>
                    <textarea class="form-control" aria-label="With textarea" id="input_content"></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="image">
                </div>
                <div class="send">
                    <span>Vui lòng điền đầy đủ các mục được đánh dấu (*)</span>
                    <button type="button" class="btn btn-success" id="btn_send">Gửi</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#btn_send").click(function() {

            var fileInput = $('#inputGroupFile02')[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            var btnSend = document.getElementById("btn_send");
            var title = document.getElementById('input_title').value;
            var content = document.getElementById('input_content').value;
            var file = document.getElementById('inputGroupFile02').files[0];

            if (title === '' || content === '') {
                alert('Vui lòng nhập đầy đủ thông tin tiêu đề và nội dung email');
                return;
            }
            document.body.classList.add("disable-interaction");
            btnSend.classList.add("loading");
            btnSend.innerHTML = "Không làm mới trang cho đến khi hoàn tất!";
            formData.append('image', file);
            formData.append('title', $("#input_title").val())
            formData.append('content', $("#input_content").val())
            $.ajax({
                url: "/KhoaLuan/ajax/SendMail",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    btnSend.classList.remove("loading");
                    $("#btn_send").text("Gửi");
                    $("#input_content").text("");
                    $("#input_title").text("");
                    document.body.classList.remove("disable-interaction");
                    alert("Gửi thành công");
                }
            });

        })
    </script>
</body>

</html>