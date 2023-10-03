import { useState } from 'react';

const Counter = () => {
    const [count, setCount] = useState(0);

    const onClickCountUp = () => {
        setCount(count + 1);
    };

    return (
        <>
            <h3>Count Up Component</h3>
            <p>Count:{count}</p>
            <button onClick={onClickCountUp}>Count Up!!!</button>
        </>
    );
};

export default Counter;
