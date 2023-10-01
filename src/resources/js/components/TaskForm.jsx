import React from 'react';

function TaskForm(props) {
    const {taskContent, setTaskContent, addTask} = props;
    return (
        <div className="input-aria">
            <input type="text"
                   value={taskContent}
                   onChange={(e) => {
                       setTaskContent(e.target.value)
                   }}
                   placeholder="新しいタスクを入力"
            />
            <button className={"btn btn-secondary"} onClick={addTask}>追加</button>
        </div>);
}

export default TaskForm;
