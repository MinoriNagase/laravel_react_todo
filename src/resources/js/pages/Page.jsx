import React from 'react';
import {Link} from "react-router-dom";

function Page() {
    return (
        <div>
            <h1>Page Component</h1>
            <p>I'm an page component!</p>
            <Link to={'/'}>Homeへ遷移</Link>
        </div>
    );
}

export default Page;
