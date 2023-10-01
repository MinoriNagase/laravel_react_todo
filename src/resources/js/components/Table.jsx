import React from 'react';

function Table(props) {

    const {tasks} = props;
    return (
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
    );
}

export default Table;

