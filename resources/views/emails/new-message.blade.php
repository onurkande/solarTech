<!DOCTYPE html>
<html>
<head>
    <title>Yeni İletişim Formu Mesajı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Yeni İletişim Formu Mesajı</h2>
        </div>
        
        <div class="content">
            <p><strong>Gönderen:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
            <p><strong>E-posta:</strong> {{ $data['email'] }}</p>
            <p><strong>Telefon:</strong> {{ $data['phone'] }}</p>
            @if($data['package_type'])
            <p><strong>Paket Türü:</strong> {{ $data['package_type_in_turkish'] }}</p>
            @endif
            <p><strong>Mesaj:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>

        <div class="footer">
            <p>Bu e-posta otomatik olarak gönderilmiştir. Lütfen yanıtlamayınız.</p>
        </div>
    </div>
</body>
</html> 