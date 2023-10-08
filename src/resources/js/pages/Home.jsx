import React, {useEffect, useState} from 'react';
import axios from 'axios';
import {Container, Typography} from '@mui/material';
import TaskForm from '../components/TaskForm';
import IncompleteTaskList from '../components/IncompleteTaskList';

function Home() {

    const [taskContent, setTaskContent] = useState('');
    const [tasks, setTasks] = useState([]);

    // getTasksはアクセス時に1回だけ走る
    useEffect(() => {
        getTasks();
    }, [])

    // タスク一覧取得
    const getTasks = () => {
        axios
            .get('/api/tasks')
            .then(response => {
                setTasks(response.data);
                console.log(response.data);
            })
            .catch(error => {
                console.error('通信に失敗しました', error);
            });
    }

    // タスクを追加する
    const addTask = () => {
        axios
            .post('/api/tasks', {content: taskContent})
            .then((response) => {
                const newTask = response.data
                setTasks([...tasks, newTask]);
                setTaskContent('');
            })
            .catch(error => {
                console.error('タスク追加できませんでした', error);
            });
    }

    // タスクを未完了から完了にする
    const completeTask = (taskId) => {
        axios
            .patch(`/api/tasks/${taskId}/complete`)
            .then(response => {
                console.log('タスクが完了しました', response.data);
                getTasks()
            })
            .catch(error => {
                console.error('タスク完了できませんでした', error);
            });
    }

    // taskの要素ごとにrowsで扱える形式にする
    const rows = tasks.map((task) => ({
        id: task.id,
        content: task.content,
        completeButton: (<button color="primary" onClick={() => completeTask(task.id)}>完了</button>)
    }));

    return (
        <Container>
            <Typography variant="h3">未完了タスク一覧</Typography>
            <TaskForm taskContent={taskContent} setTaskContent={setTaskContent} addTask={addTask}/>
            <IncompleteTaskList rows={rows} completeTask={completeTask}/>
        </Container>
    );
}

export default Home;
