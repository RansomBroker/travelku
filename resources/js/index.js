import React, {useEffect} from 'react';
import ReactDOM from 'react-dom';
import App from './components/App'

if (document.getElementById('main')) {
    ReactDOM.render(<App />, document.getElementById('main'));
}
