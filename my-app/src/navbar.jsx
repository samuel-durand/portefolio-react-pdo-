import React, {useState} from 'react';
import "../src/navbar.css"

function Navbar () {
        const [active, setActive] = useState("nav__menu")
            const navToggle =() => {
                active ==="nav__menu" ? setActive("nav__menu nav__active")
                                      : setActive("nav__menu");
            }
    return (
        <nav className='nav'>
            <a href='#' className="nav__brand">Sam</a>
            <ul className={active}>
                <li className="nav__item"><a href="#" className="nav__link">Accueil</a></li>
            </ul>
                <div onClick={navToggle} className='nav__toggler'>
                    <div className='line1'></div>
                    <div className='line1'></div>
                    <div className='line1'></div>
                </div>
        </nav>

    );
}

export default Navbar;