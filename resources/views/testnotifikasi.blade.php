<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send POST Request</title>
    <script>
        async function sendPostRequest() {
            const url = 'http://sndshop.my.id/midtrans/notification';
            const data = {
                order_id: 'snd-4623802230924',
                transaction_id: 'f0d2831b-5143-4e87-a867-056f55bfc18b',
                transaction_status: 'settlement'
            };

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams(data)
                });

                if (response.ok) {
                    const result = await response.json();
                    console.log('Success:', result);
                } else {
                    console.error('Error:', response.statusText);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>
</head>
<body>
    <h1>Send Midtrans Notification</h1>
    <button onclick="sendPostRequest()">Send Notification</button>
</body>
</html>
