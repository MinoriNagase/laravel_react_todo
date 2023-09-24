import React from 'react';
import {Link} from "react-router-dom";

function Home() {
    return (
        <div>
            <h1>Home Component</h1>
            <p>I'm an home component!</p>
            <Link to={'/page'}>Pageへ遷移</Link>
        </div>
    );
}

export default Home;
