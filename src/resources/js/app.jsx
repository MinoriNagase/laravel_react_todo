import './bootstrap';

import ReactDOM from 'react-dom/client';
import Counter from './pages/Counter';

function App() {
    return (
        <>
            <h1>はろーわーるど</h1>
            <Counter />
        </>
    );
}

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);
