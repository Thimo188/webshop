import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
import Home from './components/Home';


export default class Index extends Component {
    render() {
        return (
            <div className="container">
                <Router>
                    <div>
                        <Route path="/" component={Home}/>
                    </div>
                </Router>
            </div>
        );
    }
}
if (document.getElementById('root')) {
    ReactDOM.render(<Index />, document.getElementById('root'));
}