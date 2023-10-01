import React from 'react';
import Table from '../components/Table';
import {Link} from "react-router-dom";

function Home() {

    // タスク内容の配列
    const tasks = [
        {content: '洗濯物を干す'},
        {content: '掃除機をかける'},
    ]

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <h1>タスク管理</h1>
                    <Table tasks={tasks} />
                    <Link to={'/page'}>Pageへ遷移</Link>
                </div>
            </div>
        </div>
    );
}

export default Home;
