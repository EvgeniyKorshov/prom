import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import { red } from '@mui/material/colors';
import {CircularProgress, ThemeProvider, createTheme } from '@mui/material';
import {BrowserRouter} from "react-router-dom";
import {Provider} from "react-redux";
import  persistor,{store} from './store';
import {PersistGate} from 'redux-persist/integration/react';
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
    <PersistGate persistor={persistor} loading={<CircularProgress />}>
     <ThemeProvider theme={theme}>
     <BrowserRouter>
     <App/>
     </BrowserRouter>
    </ThemeProvider>
    </PersistGate>
    </Provider>
  </React.StrictMode>
);

reportWebVitals();