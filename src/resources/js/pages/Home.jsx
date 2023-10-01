import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Table from '../components/Table';
import {Link} from "react-router-dom";

function Home() {

    // タスク内容の配列
    const rows = [
        {content: '洗濯物を干す'}, {content: '掃除機をかける'}
    ]

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

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <h1>未完了タスク一覧</h1>
                    <Table rows={rows}/>
                    <Link to={'/page'}>Pageへ遷移</Link>
                </div>
            </div>
        </div>);
}

export default Home;
