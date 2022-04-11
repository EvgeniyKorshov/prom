import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import { red } from '@mui/material/colors';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import {BrowserRouter} from "react-router-dom";
import {Provider} from "react-redux";
import store from './store';
const theme = createTheme({
  palette: {
    mode:'dark',
    primary: {
      main: red[500],
    },
  },
});
const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <Provider store={store}>
     <ThemeProvider theme={theme}>
     <BrowserRouter>
     <App/>
     </BrowserRouter>
    </ThemeProvider>
    </Provider>
  </React.StrictMode>
);

reportWebVitals();