import React from 'react';

const Navbar = ({authDetail}) => {
    console.log(authDetail)
    const {state, role, name} = authDetail;
    return (
        <div className="w-100 bg-white px-4 px-lg-5 py-2 d-flex align-items-center justify-content-between">
            <div className="navbar-brand">
                <a href="/">
                    <img id="logo-navbar" src="/public/assets/img/logo.png" alt="logo"/>
                </a>
            </div>
            <div className="d-flex align-items-center">
                {state === true && role === 'users' ?
                    <ul className="navbar-link list-unstyled m-0 d-flex align-items-center">
                        <li><a href="/account"><i
                            className='bx bx-user-circle mr-2'></i> {name}</a></li>
                        <li className="d-none d-lg-block"><a href="/logout" className="btn btn-info btn-sm rounded-pill py-2 px-3 text-white">Logout</a>
                        </li>
                        <li><i id="open-menu" className='bx bx-menu'></i></li>
                    </ul> :
                    <ul className="navbar-link list-unstyled m-0 d-flex align-items-center">
                        <li><a href="/login"><i className='bx bx-user-circle mr-2'></i> Log in</a></li>
                        <li className="d-none d-lg-block"><a href="/register" className="btn btn-info btn-sm rounded-pill py-2 px-3 text-white">Register</a>
                        </li>
                        <li><i id="open-menu" className='bx bx-menu'></i></li>
                    </ul>
                }
            </div>
        </div>
    );
};

export default Navbar;
