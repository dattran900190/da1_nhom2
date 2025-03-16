<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán bằng QR VNPay</title>
    <style>
        body { text-align: center; margin-top: 50px; }
        img { max-width: 300px; }
    </style>
</head>
<body>
    <h1>Thanh toán bằng QR VNPay</h1>
    <p>Vui lòng quét mã QR bên dưới bằng ứng dụng ngân hàng của bạn để thanh toán:</p>
    <img src="<?php echo htmlspecialchars($qrCodeUrl); ?>" alt="QR Code">
    <p>Sau khi thanh toán, bạn sẽ được chuyển hướng tự động về trang lịch sử mua hàng.</p>
    <script>
        // Polling to check payment status
        const orderId = <?php echo json_encode($orderId); ?>;
        const checkPaymentStatus = async () => {
            const response = await fetch('<?php echo BASE_URL; ?>?act=check-payment-status&order_id=' + orderId);
            const data = await response.json();
            if (data.status === 'paid') {
                window.location.href = '<?php echo BASE_URL; ?>?act=lich-su-mua-hang';
            }
        };
        setInterval(checkPaymentStatus, 5000); // Check every 5 seconds
    </script>
</body>
</html>