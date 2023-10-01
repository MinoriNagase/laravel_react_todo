import React from 'react';
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
                    <table className="table">
                        {/* タスク表示部分 */}
                        <tbody>
                            {tasks.map((task, index) => (
                                <tr key={index}>
                                    <td className="text-center">{task.content}</td>
                                    <td className="text-center">
                                        <button className="btn btn-primary">完了</button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                    <Link to={'/page'}>Pageへ遷移</Link>
                </div>
            </div>
        </div>
    );
}

export default Home;
