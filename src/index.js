import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import { red } from '@mui/material/colors';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import {BrowserRouter} from "react-router-dom";
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
     <ThemeProvider theme={theme}>
     <BrowserRouter>
     <App/>
     </BrowserRouter>
    </ThemeProvider>
    
  </React.StrictMode>
);

reportWebVitals();