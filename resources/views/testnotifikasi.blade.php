<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send POST Request</title>
    <script>
        async function sendPostRequest() {
            const url = 'https://182d-202-138-247-143.ngrok-free.app/midtrans/notification';
            const data = {
                order_id: 'snd-4339358130924',
                transaction_id: 'd5e88725-c5db-4f06-999a-ad9bbe2389ea',
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
