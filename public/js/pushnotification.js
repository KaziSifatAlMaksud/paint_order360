
// This function converts a URL-safe base64-encoded string to a Uint8Array
function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/-/g, '+')
        .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

// Replace "BGbT7eo..." with your actual VAPID public key
const applicationServerKey = urlBase64ToUint8Array("BKtwmWu5vfBhmd-dqfMeJT8jkshLKQuV7V5fKTXGHtpjZdS5cM-b_r-hVb9xOlv6FFKUakF_SMt-X-2N-5cr564");

function requestPermission() {
    Notification.requestPermission().then(permission => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
            // Ensure the service worker is ready before subscribing to push
            navigator.serviceWorker.ready.then((sw) => {
                sw.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: applicationServerKey
                }).then((subscription) => {
                    // Subscription successful
                    return fetch("/api/push_subscriptions", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(subscription)
                    });
                }).then(response => {
                    if (response.ok) {
                        alert("Subscription successful");
                    } else {
                        return response.text().then(text => {
                            throw new Error('Subscription failed: ' + text);
                        });
                    }
                }).catch(error => {
                    console.log('Service failed:', error);
                });
            });
        } else {
            // Handle any other permission state
            console.warn('Notification permission was not granted:', permission);
        }
    });
}

