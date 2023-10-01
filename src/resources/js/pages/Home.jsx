import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Table from '../components/Table';
import {Link} from "react-router-dom";

function Home() {

    const [tasks, setTasks] = useState([]);

    // アクセス時1回だけリクエストする
    useEffect(() => {
        getTasksData();
    }, [])

    // api通信
    const getTasksData = () => {
        axios
            .get('/api/tasks')
            .then(response => {
                setTasks(response.data);
                console.log(response.data);
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }

    const completeTask = (taskId) => {
        axios
            .patch(`/api/tasks/${taskId}/complete`)
            .then(response => {
                console.log('タスクが完了しました', response.data);
                getTasksData()
            })
            .catch(error => {
                console.error('タスク完了できませんでした', error);
            });
    }

    // tasksの要素ごとにrowsで扱える形式にする
    const rows = tasks.map((task) => ({
        id: task.id,
        content: task.content,
        completeButton: (
            <button color="primary" onClick={() => completeTask(task.id)}>完了</button>
        )
    }));

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <h1>未完了タスク一覧</h1>
                    <Table rows={rows} completeTask={completeTask}/>
                    <Link to={'/page'}>Pageへ遷移</Link>
                </div>
            </div>
        </div>);
}

export default Home;
