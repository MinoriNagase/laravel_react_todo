import { useState } from 'react';
import Button from '@mui/material/Button';

const Counter = () => {
    const [count, setCount] = useState(0);

    const onClickCountUp = () => {
        setCount(count + 1);
    };

    return (
        <>
            <h3>Count Up Component</h3>
            <p>Count:{count}</p>
            <Button onClick={onClickCountUp} variant="contained">Count Up!!!</Button>
        </>
    );
};

export default Counter;
