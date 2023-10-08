import React from 'react';
import {Button, TextField} from '@mui/material';

function TaskForm(props) {
    const {taskContent, setTaskContent, addTask} = props;
    const formContainerStyle = {
        display: 'flex',
        alignItems: 'center',
        marginTop: '16px',
        marginBottom: '16px',
    };
    return (
        <div className="input-area" style={formContainerStyle}>
            <TextField
                variant="outlined"
                onChange={(e) => setTaskContent(e.target.value)}
                value={taskContent}
                label="新しいタスクを入力"
            />
            <Button variant="contained" color="primary" onClick={addTask}>
                追加
            </Button>
        </div>
    );
}

export default TaskForm;
