self.addEventListener("push", (event) => {
     notification = event.data.json(); // Corrected variable name to notification
    //  {"tittle" : "Hi", "body": "check this out", "url":"google.com"}
    event.waitUntil(self.registration.showNotification(notification.title, {
        body: notification.body,
        icon: "logo-phone.png",
        data: {
            notifURL: notification.url
        }
    }));
});

self.addEventListener("notificationclick", (event) => {
    event.waitUntil(clients.openWindow(event.notification.data.notifURL));
});
