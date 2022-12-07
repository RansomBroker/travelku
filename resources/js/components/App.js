import React from 'react'
import Navbar from "./Navbar";

function App() {
    let authDetail =  {state : true, role : "users", name: "john Doe"}
    return (
        <div className="layout-wrapper layout-content-navbar">
            <div className="layout-container">
                <div className="layout-page">
                    <Navbar authDetail={authDetail}/>
                </div>
                <div className="content-wrapper">
                    <div className="content-backdrop"></div>
                </div>
            </div>
        </div>
    )
}

export default App;
