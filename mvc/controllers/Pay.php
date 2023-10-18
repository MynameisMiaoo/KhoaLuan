<?php
class Pay extends controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function SayHi()
    {
        if (!isset($_SESSION['type'])) {
            $_SESSION["type"] = "None";
        }
        if (!isset($_SESSION['ten'])) {
            $_SESSION['ten'] = "";
        }
        if (!isset($_SESSION['sdt'])) {
            $_SESSION['sdt'] = "";
        }
        if (!isset($_SESSION['diachi'])) {
            $_SESSION['diachi'] = "";
        }
        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }
        if (!isset($_SESSION['ship'])) {
            $_SESSION['ship'] = "";
        }
        if (isset($_POST["name"])) {
            $_SESSION['ten'] = $_POST["name"];
            $_SESSION['sdt'] = $_POST["sdt"];
            $_SESSION['diachi'] = $_POST["diachi"];
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['ship'] = $_POST["ship"];
        }
        if (!isset($_SESSION['username'])) {
            $_SESSION['tt'] = "true";
            header('Location: ../KhoaLuan/login');
        }
        if (isset($_POST["selectedValue"])) {
            if ($_POST["selectedValue"] == "momo") {
                $_SESSION['type'] = "MOMO";
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                $orderInfo = "Thanh toán qua MoMo";
                $amount = $_SESSION['tong'];
                $orderId = time() . "";
                $redirectUrl = "http://localhost/Khoaluan/PayDone";
                $ipnUrl = "http://localhost/Khoaluan/Paydone";
                $extraData = "";


                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId;
                // Mã đơn hàng
                $orderInfo = $orderInfo;
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;

                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json
                header('Location: ' . $jsonResult['payUrl']);
            }
            if ($_POST['selectedValue'] == "cod") {
                $_SESSION['type'] = "COD";
                header("Location: ../KhoaLuan/Paydone");
            }
        }
        $this->view("main", [
            "page" => "ppay",
        ]);
    }
}
