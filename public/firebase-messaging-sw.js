importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
  apiKey: "AIzaSyBGP3CaBi0iuhfptdT3Sct-qoRaxqdfz9Y",
  authDomain: "push-notification-b18d2.firebaseapp.com",
  projectId: "push-notification-b18d2",
  storageBucket: "push-notification-b18d2.appspot.com",
  messagingSenderId: "959738834438",
  appId: "1:959738834438:web:2671554cd95552ea28dd87",
  measurementId: "G-8F0172YKBF"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
  console.log("Message received.", payload);
  const title = "Hello world is awesome";
  const options = {
    body: "Your notificaiton message .",
    icon: "/firebase-logo.png",
  };
  return self.registration.showNotification(
    title,
    options,
  );
});