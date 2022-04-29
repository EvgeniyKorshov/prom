
import { initializeApp } from "firebase/app";

const firebaseConfig = {
  apiKey: "AIzaSyD5H2f9MeYz-xBUbYC3vFSw7b1RgdU9hiE",
  authDomain: "gb-react-bffb5.firebaseapp.com",
  databaseURL: "https://gb-react-bffb5-default-rtdb.firebaseio.com",
  projectId: "gb-react-bffb5",
  storageBucket: "gb-react-bffb5.appspot.com",
  messagingSenderId: "1054446252603",
  appId: "1:1054446252603:web:b0b5eef6f2fd4c1081621e"
};

const firebase = initializeApp(firebaseConfig);

export default firebase;