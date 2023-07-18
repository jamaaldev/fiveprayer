// import React from "react";
import * as React from 'react';
import { createRoot } from 'react-dom/client';

import ReactDOM from "react-dom";
import App from "./app/App";
import { store } from "./app/store";
import { Provider } from "react-redux";

const root = createRoot(document.getElementById('fiveprayer') as HTMLElement);
root.render(
  <React.StrictMode>
    <Provider store={store}>
      <App />
    </Provider>
  </React.StrictMode>
);

// ReactDOM.render(
//   <React.StrictMode>
//     <Provider store={store}>
//       <App />
//     </Provider>
//   </React.StrictMode>,

//   document.getElementById("fiveprayer"),
// );
