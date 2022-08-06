importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js')
importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js')

var firebaseConfig = {
    apiKey: "AIzaSyBe99gU85yorlzWEMTh6ttpmFLhLHsmr9Q",
    authDomain: "daokhanh-201004.firebaseapp.com",
    databaseURL: "https://daokhanh-201004.firebaseio.com",
    projectId: "daokhanh-201004",
    storageBucket: "daokhanh-201004.appspot.com",
    messagingSenderId: "396333762261",
    appId: "1:396333762261:web:7401d6e1d01640bb62c45c"
};
firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});